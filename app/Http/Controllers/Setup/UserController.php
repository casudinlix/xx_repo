<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Gate;
use DataTables;
use Indonesia;
use Response;
use Input;
use Validator;
use Carbon\Carbon;
class UserController extends Controller
{
    //
    function tes(){
        $user=DB::table('users')->where('id',2)->first();
        dd(Auth::user());
    }
  public function index()
    {
      if (! Gate::allows('manage_users')) {
            return abort(401);
        }

        return view('setup.user.index', compact('users'));
    }
    function user_list(Request $request){
      $users = DB::table('users')
      ->leftJoin('profile','users.id','=','profile.users_id')
      ->leftJoin('jenis_user','jenis_user.id','=','profile.jenis_user_id')
      ->select(['users.id','users.avatar','users.name','jenis_user.nama_jenis_user','users.status','users.created_at','users.updated_at'])
      ;
      return Datatables::of($users)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"]);
            })

            ->editColumn('created_at', function ($users) {
                return tgl_indo($users->updated_at);
            })
            ->editColumn('updated_at', function ($users) {
                return tgl_indo($users->updated_at);
            })
            ->addColumn('avatar', function ($users) {
                  if ($users->avatar==null) {
                    return '<img src=" '.asset('user.png').' " class="img img-responsive img-circle" height="50px"/>';
                    //return null;
                  }else {
                    //return null;
                  return '<img src=" '.asset('storage/avatars').'/'.$users->avatar.' " class="img img-responsive img-circle" height="50px"/>';
                  }
              })
            ->addColumn('action', function ($users) {
                return '<a href="' . route('users.edit',[$users->id]) . '" class="btn-outline-primary btn-rounded btn btn-sm btn-primary" title="Edit" data-toggle="popover" data-placement="top" title="Edit"><i class="ti-pencil-alt"></i></a>
                <a href="' . route('users.show',[$users->id]) . '" class="btn-outline-warning btn-rounded btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Detil"><i class="ti-search"></i></a>
                <a href="' . route('user.permission',[$users->id]) . '" class="btn-outline-success btn-rounded btn btn-sm btn-success" title="Assign Sepecial Permision"><i class="ti-share"></i></a>
                <a href="' . route('user.role',[$users->id]) . '" class="btn-outline-info btn-rounded btn btn-sm btn-info" title="Assign Role"><i class="ti-import"></i></a>';
            })->escapeColumns([])
            ->make(true);

    }
    function permission($id){
      $user=\App\User::find($id);
      $data=$user->getAllPermissions();
      return view('setup.user.special',['data'=>$data]);
    }
    function role($id){
      $user=\App\User::find($id);
      $data=$user->getRoleNames();
        return view('setup.user.role',['data'=>$data]);
    }
    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        $jenis=DB::table('jenis_user')->get();
        return view('setup.user.create', ['role'=>$role,'jenis'=>$jenis]);
    }
    function show($id){
      $users = DB::table('users')
      ->leftJoin('profile','users.id','=','profile.users_id')
      ->leftJoin('jenis_user','jenis_user.id','=','profile.jenis_user_id')->first();
       $provinsi=Indonesia::allProvinces();
       return view('setup.user.detil');
    }
    public function store(Request $request)
    {


      DB::beginTransaction();
      try{
        DB::commit();

        //dd($request->all());
        $user=User::create([
          'name'=>$request->nama_lengkap,
          'email'=>Input::get('email'),
          'username'=>Input::get('username'),
          'password'=>bcrypt( Input::get('password')),
          'created_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id,
          'status'=>Input::get('status')
        ]);
        //$id=DB::getPdo()->lastInsertId();
        $id=$user->id;

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
        return redirect()->route('users.index');
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }

    }

    public function edit($id)
    {
      $user=DB::table('users')->where('id',$id)->first();
      $profile=DB::table('profile')
      ->leftjoin('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
      ->leftjoin('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
      ->leftjoin('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
      ->leftjoin('indonesia_villages','indonesia_villages.id','=','profile.villages_id')->where('users_id',$id)->orwhereNull('users_id')->first() ;
      $profile1=DB::table('profile')
      ->join('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
      ->join('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
      ->join('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
      ->join('indonesia_villages','indonesia_villages.id','=','profile.villages_id')->where('users_id',$id)->orWherenull('users_id')
      ->select(['indonesia_cities.name as nama_kab','indonesia_districts.name as nama_kec','indonesia_villages.name as nama_kel'])->first() ;
      $user1=\App\user::find(Auth::user()->id);
      $roles=$user1->getRoleNames();
      $user2=\App\user::find($id);
      $roles2=$user2->getRoleNames();
      $role = Role::orderBy('name', 'ASC')->get();
      $jenis=DB::table('jenis_user')->get();
      return view('setup.user.edit',compact('user','jenis','role','profile','profile1','roles2'));


    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
        ]);
       $user = User::findOrFail($id);
        $password = !empty($request->password) ? bcrypt($request->password):$user->password;
        $user->update([
            'name' => $request->name,
            'password' => $password
        ]);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Diperbaharui']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }

}
