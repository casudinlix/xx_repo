<?php

namespace App\Http\Controllers\Layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Gate;
use DataTables;
use Indonesia;
use Response;
use Input;
use Validator;
use App\User;
class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('klien saya');
        return view('layanan.klien.index');
    }
    function klien_list(Request $request)
    {
      $users = DB::table('users')
      ->leftJoin('profile','users.id','=','profile.users_id')
      ->leftJoin('jenis_user','jenis_user.id','=','profile.jenis_user_id')
      ->select(['users.id','users.avatar','users.name','jenis_user.nama_jenis_user','users.status','users.created_at','users.updated_at'])
      ->where('users.add_by',Auth::user()->id);
      return Datatables::of($users)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"]);
            })

            ->addColumn('avatar', function ($users) {
                  if ($users->avatar==null) {
                    return '<img src=" '.asset('user.png').' " class="img img-responsive img-circle avatar avatar-sm mr-5" width="50px"/><a href="' . route('klien-saya.show',[$users->id]) . '" " data-toggle="tooltip" data-original-title="Detil">' . $users->name . '</a>';
                    //return null;
                  }else {
                    //return null;
                  return '<img src=" '.asset('storage/avatars/').'/'.$users->avatar.' " class="img img-responsive img-circle avatar avatar-sm mr-5" width="50px"/><a href="' . route('klien-saya.show',[$users->id]) . '" " data-toggle="tooltip" data-original-title="Detil">' . $users->name . '</a>';
                  }
              })
              // ->editColumn('name', function ($users) {
              //     return '<a href="' . route('klien-saya.show',[$users->id]) . '" " data-toggle="tooltip" data-original-title="Detil">' . $users->name . '</a>';
              // })
            ->editColumn('created_at', function ($users) {
                return tgl_indo($users->updated_at);
            })->escapeColumns([])

            ->addColumn('action', function ($users) {
                return '
                <a href="' . route('klien-saya.edit',[$users->id]) . '" class="btn-outline-warning btn-rounded btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="icon-note"></i>Edit</a>
                ';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('tambah klien');
      $user=\App\user::find(Auth::user()->id);
      $roles=$user->getRoleNames();
      if ($roles=='super_admin') {
        $role = Role::orderBy('name', 'ASC')->get();
      } else {
        $role = DB::table('roles')->where('name','!=','super_admin')->get();
      }


        $jenis=DB::table('jenis_user')->where('nama_jenis_user','!=','Super Admin')->get();

        return view('layanan.klien.create',compact('role','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    DB::beginTransaction();
      try{
        DB::commit();

        $user=User::create([
          'name'=>Input::get('nama_lengkap'),
          'email'=>Input::get('email'),
          'username'=>Input::get('username'),
          'password'=>bcrypt( Input::get('password2')),

          'add_by'=>Auth::user()->id,
          'created_at'=>Carbon::now(),
          'status'=>Input::get('status')
        ]);
        $id=DB::getPdo()->lastInsertId();
        //$id=$user->id;
        $profile=DB::table('profile')->insert([
          'users_id'=>$id,
          'jenis_user_id'=>Input::get('jenis_user'),
          'jenis'=>Input::get('jenis_akun'),
          'nama_lengkap'=>Input::get('nama_lengkap'),
          'gelar'=>Input::get('gelar'),
          'tempat_lahir'=>Input::get('tempat_lahir'),
          'tgl_lahir'=>Input::get('tgl_lahir'),
          'jenis_kelamin'=>Input::get('kelamin'),
          'alamat_kantor'=>Input::get('alamat_kantor'),
          'alamat_rumah'=>Input::get('alamat_rumah'),
          'provinces_id'=>Input::get('prov'),
          'cities_id'=>Input::get('kab'),
          'districts_id'=>Input::get('kec'),
          'villages_id'=>Input::get('kel'),
          'jenis_identitas'=>Input::get('jenis_identitas'),
          'no_identitas'=>Input::get('no_identitas'),
          'no_npwp'=>Input::get('no_npwp'),
          'telpon'=>Input::get('telpon'),
          'no_sk'=>Input::get('no_sk'),
          'jabatan'=>Input::get('jabatan'),
          'jenis_ijazah'=>Input::get('jenis_ijazah'),
          'created_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id
        ]);
        $user->assignRole(Input::get('role'));
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('klien-saya.index ');
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $xx=DB::table('users')->where('id',$id)->where('add_by',Auth::user()->id);
      if ($xx->count()==0) {
        toastr()->error('Error!', 'Access Deniad');
        return redirect()->route('klien-saya.index');
      }else {

      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit klien');
        $xx=DB::table('users')->where('id',$id)->where('add_by',Auth::user()->id);
        if ($xx->count()==0) {
          toastr()->error('Error!', 'Access Deniad');
          return redirect()->route('klien-saya.index');
        }else {
          $user=DB::table('users')->where('id',$id)->where('add_by',Auth::user()->id)->first();
          $profile=DB::table('profile')
          ->join('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
          ->join('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
          ->join('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
          ->join('indonesia_villages','indonesia_villages.id','=','profile.villages_id')->where('users_id',$id)->first() ;
          $profile1=DB::table('profile')
          ->join('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
          ->join('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
          ->join('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
          ->join('indonesia_villages','indonesia_villages.id','=','profile.villages_id')->where('users_id',$id)
          ->select(['indonesia_cities.name as nama_kab','indonesia_districts.name as nama_kec','indonesia_villages.name as nama_kel'])->first() ;
          $user1=\App\user::find(Auth::user()->id);
          $roles=$user1->getRoleNames();
          $user2=\App\user::find($id);
          $roles2=$user2->getRoleNames();
          if ($roles=='super_admin') {
            $role = Role::orderBy('name', 'ASC')->get();
          } else {
            $role = DB::table('roles')->where('name','!=','super_admin')->get();
          }


            $jenis=DB::table('jenis_user')->where('nama_jenis_user','!=','Super Admin')->get();
        }
        return view('layanan.klien.edit',compact('user','jenis','role','profile','profile1','roles2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      DB::beginTransaction();
      try{
        DB::commit();
        $user=DB::table('users')->where('id',$id)->update([
          'name'=>Input::get('nama_lengkap'),
          'email'=>Input::get('email'),
          'username'=>Input::get('username'),
           'add_by'=>Auth::user()->id,
          'status'=>Input::get('status'),
          'updated_at'=>Carbon::now()
        ]);


        $profile=DB::table('profile')->where('users_id',$id)->update([

          'jenis_user_id'=>Input::get('jenis_user'),
          'jenis'=>Input::get('jenis_akun'),
          'nama_lengkap'=>Input::get('nama_lengkap'),
          'gelar'=>Input::get('gelar'),
          'tempat_lahir'=>Input::get('tempat_lahir'),
          'tgl_lahir'=>Input::get('tgl_lahir'),
          'jenis_kelamin'=>Input::get('kelamin'),
          'alamat_kantor'=>Input::get('alamat_kantor'),
          'alamat_rumah'=>Input::get('alamat_rumah'),
          'provinces_id'=>Input::get('prov'),
          'cities_id'=>Input::get('kab'),
          'districts_id'=>Input::get('kec'),
          'villages_id'=>Input::get('kel'),
          'jenis_identitas'=>Input::get('jenis_identitas'),
          'no_identitas'=>Input::get('no_identitas'),
          'no_npwp'=>Input::get('no_npwp'),
          'telpon'=>Input::get('telpon'),
          'no_sk'=>Input::get('no_sk'),
          'jabatan'=>Input::get('jabatan'),
          'jenis_ijazah'=>Input::get('jenis_ijazah'),
          'updated_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id
        ]);
        //$user->assignRole(Input::get('role'));
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('klien-saya.index ');
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
