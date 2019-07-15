<?php

namespace App\Http\Controllers\Layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Input;
use DB;
use DataTables;
use Carbon\Carbon;
use Auth;
use Validator;
use File;
class ProjectNotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('project notaris');
        $user=DB::table('users')->where('add_by',Auth::user()->id)->get();
        $jenis=DB::table('jenis_akta')->get();
        $finish=DB::table('project')->where('add_by',Auth::user()->id)->where('status','Finish')->count();
        $pending=DB::table('project')->where('add_by',Auth::user()->id)->where('status','Pending')->count();
        $canceled=DB::table('project')->where('add_by',Auth::user()->id)->where('status','Canceled')->count();
        $progress=DB::table('project')->where('add_by',Auth::user()->id)->where('status','On Progress')->count();
        return view('layanan.project.notaris.index',compact('user','jenis','finish','pending','canceled','progress'));
    }
    function project_list(Request $request){
      $project=DB::table('project')->join('jenis_akta','jenis_akta.id','=','project.jenis_akta_id')
      ->join('users','users.id','=','project.users_id')
      ->select(['project.id','project.kode','jenis_akta.nama_jenis_akta','project.project_type','project.status','project.reason','users.name','project.created_at'])
      ->where('project.add_by',Auth::user()->id);
      return Datatables::of($project)
            ->filterColumn('users.name', function ($query, $keyword) {
                $query->whereRaw("users.name like ?", ["%{$keyword}%"]);
            })

            ->addColumn('created_at', function ($project) {
                return tgl_indo($project->created_at);
            })->editColumn('status', function ($project) {
                  if ($project->status=='Finish') {
                    return "<span class='label label-success btn-rounded'><i class='ti ti-thumb-up'></i>Finish</span>";
                  }elseif ($project->status=='Canceled') {
                    return "<span class='label label-danger btn-rounded'><i class='ti ti-face-sad'></i>Canceled</span>";
                  }elseif ($project->status=='Pending') {
                    return "<span class='label label-warning btn-rounded'><i class='ti ti-alert'></i>Pending</span>";
                  }else {
                  return "<span class='label label-info btn-rounded '><i class='ti ti-paint-roller'></i>On progress</span>";
                  }
              })

            ->addColumn('action', function ($project) {
              if ($project->status=='Canceled' || $project->status=='Finish') {
                return null;
              } else {
                return '<a href="' . route('project-notaris.edit',[$project->id]) . '" class="btn-outline-primary btn-rounded btn btn-sm btn-primary " data-toggle="tooltip" data-original-title="Edit"><i class="ion-edit"></i>Edit</button>
                <a href="' . route('project-notaris.show',[$project->id]) . '" class="btn-outline-warning btn-rounded btn btn-sm btn-warning" data-toggle="tooltip" data-original-title="Lengkapi Data"><i class="ion-eye"></i>Lengkapi Data</a>

                ';
              }


            })->escapeColumns([])
            ->make(true);

    }
    protected function kode()
    {
        $kd="";
        $query = DB::table('project')
       ->select(DB::raw('MAX(RIGHT(kode,4)) as kd_max'))
        ->whereDate('created_at', Carbon::today());
        if ($query->count()>0) {
            foreach ($query->get() as $key) {
                $tmp = ((int)$key->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return  "PRN-".date('dmy').$kd;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    function save_penghadap(Request $request)
    {
      DB::beginTransaction();
      try{
        DB::commit();
        $validator = Validator::make($request->all(), [
              'gambar' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
          ]);
          if ($validator->passes()) {
            $input =Input::all();
            $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
            $folder=public_path('storage/dokumen/'.Input::get('kode'));
            //$request->gambar->move(public_path('gambar'), $input['gambar']);
            if(!File::isDirectory($folder)){
              File::makeDirectory($folder, 0777, true, true);
          }

          $request->gambar->move($folder, $input['gambar']);
          DB::table('project_penghadap')->insert([
            'project_id'=>$request->project_id,
            'jenis_penghadap'=>$request->jenis,
            'title'=>$request->title,
            'nama_lengkap'=>$request->nama,
            'tempat_lahir'=>$request->tempat_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'kewarganegaraan'=>$request->kewarganegaraan,
            'pekerjaan'=>$request->pekerjaan,
            'alamat_lengkap'=>$request->alamat,
            'provinces_id'=>$request->prov,
            'cities_id'=>$request->kab,
            'districts_id'=>$request->kec,
            'villages_id'=>$request->kel,
            'jenis_identitas'=>$request->jenis_identitas,
            'no_identitas'=>$request->no_identitas,
            'tgl_persetujuan'=>$request->tgl_persetujuan,
            'file'=>trim($input['gambar']),
            'nama_perusahaan'=>$request->nama_perusahaan,
            'created_at'=>Carbon::now(),
            'add_by'=>Auth::user()->id,
          ]);

          Activity()
          ->causedBy(Auth::user()->id)
          ->withProperties($request->all())
          ->log(Auth::user()->name.' '.$request->kode.' Tambah Penghadap '.$request->nama);
          toastr()->success('Data Berhasil Disimpan!','Selamat');
          return redirect()->back();
        }else {
          toastr()->error('Data Berhasil Disimpan!','Error!');
          return redirect()->back();
        }

        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
    }
    function hapus_penghadap(Request $request){
      DB::beginTransaction();
      try {
         $dt=DB::table('project_penghadap')->where('id',$request->id)->first();
         $folder=public_path('storage/dokumen/'.$request->kode.'/'.$dt->file);
         $data=File::delete($folder);

        DB::table('project_penghadap')->where('id', Input::get('id'))->delete();
          DB::commit();

          Activity()
          ->causedBy(Auth::user()->id)
          ->withProperties($request->all())
          ->log(Auth::user()->name.' '.$request->kode.' Hapus Penghadap ');
          toastr()->success('Data has been deleted successfully!','Selamat');
          return redirect()->back();
        dd($dt->file);
      } catch (\Exception $e) {
          DB::rollback();
          //gagal
          echo $e;

      }
    }
    function save_direksi(Request $request)
    {
      DB::beginTransaction();
      try{
        DB::commit();
        $validator = Validator::make(Input::all(), [

              'gambar' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
          ]);
          if ($validator->passes()) {
           $input =Input::all();
           $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
           $folder=public_path('storage/dokumen/'.Input::get('kode'));
           //$request->gambar->move(public_path('gambar'), $input['gambar']);
           if(!File::isDirectory($folder)){
             File::makeDirectory($folder, 0777, true, true);
         }
         $request->gambar->move($folder, $input['gambar']);
        //dd($folder);
          DB::table('project_direksi')->insert([
          'project_id'=>Input::get('project_id'),
          'jabatan'=>Input::get('jabatan'),
          'title'=>Input::get('title'),
          'nama_lengkap'=>Input::get('nama'),
          'tempat_lahir'=>Input::get('tempat_lahir'),
          'tgl_lahir'=>Input::get('tgl_lahir'),
          'kewarganegaraan'=>Input::get('kewarganegaraan'),

          'alamat_lengkap'=>Input::get('alamat'),
          'provinces_id'=>Input::get('prov'),
          'cities_id'=>Input::get('kab'),
          'districts_id'=>Input::get('kec'),
          'villages_id'=>Input::get('kel'),
          'jenis_identitas'=>Input::get('jenis_identitas'),
          'no_identitas'=>Input::get('no_identitas'),
          'created_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id,
          'file'=>$input['gambar']

         ]);
         DB::commit();
         Activity()
         ->causedBy(Auth::user()->id)
         ->withProperties($request->all())
         ->log(Auth::user()->name.' '.$request->kode.' Tambah Direksi '.$request->nama);
         toastr()->success('Data has been saved successfully!','Selamat!');
         return redirect()->back();
       }else{
         DB::commit();
         toastr()->error('Hanya File pdf,doc,docx,jpeg,png,jpg Max 2mb!');
         return redirect()->back();
       }
       //dd($request->all());
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
    }
    function hapus_direksi()
    {
      DB::beginTransaction();
      try {
          DB::commit();
          //query sukses
          $dt=DB::table('project_direksi')->where('id',Input::get('id'))->first();
          $folder=public_path('storage/dokumen/'.Input::get('kode').'/'.$dt->file);
          $data=File::delete($folder);
          DB::table('project_direksi')->where('id', Input::get('id'))->delete();
          toastr()->success('Data has been deleted successfully!');
          return redirect()->back();
      } catch (\Exception $e) {
          DB::rollback();
          //gagal
          echo $e;
      }
    }
    function simpan_investor(Request $request)
    {
      DB::beginTransaction();
      try{
        DB::commit();


         // $modal_ditempatkan=25/100*$request->total_modal;
         // if ($sisa_saham>$total_saham_investor) {
         //   toastr()->error('Stock Saham Kosong','Error!');
         //     return redirect()->back();
         // }
         //dd($request->all());
        //query sukses
        $validator = Validator::make(Input::all(), [

              'gambar' => 'required|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
          ]);
          if ($validator->passes()) {
           $input =Input::all();
           $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
           $folder=public_path('storage/dokumen/'.Input::get('kode'));
           //$request->gambar->move(public_path('gambar'), $input['gambar']);
           if(!File::isDirectory($folder)){
             File::makeDirectory($folder, 0777, true, true);
          }
          //dd($request->project_id);
        $xx=  $request->gambar->move($folder, $input['gambar']);
        $modal=DB::table('project_perusahaan')->where('project_id',$request->project_id)->first();
        $modal_dasar=DB::table('project_perusahaan')->where('project_id',$request->project_id)->first();
          $persentase=$request->total_lembar_saham/$modal->total_lembar_saham*100;
          $modal_setor=25/100*$request->total_modal;
            DB::table('project_investor')->insert([
              'project_id'=>$request->project_id,
              'jenis'=>$request->jenis,
              'title'=>$request->title,
              'nama_lengkap'=>$request->nama,
              'tempat_lahir'=>$request->tempat_lahir,
              'tgl_lahir'=>$request->tgl_lahir,
              'kewarganegaraan'=>$request->kewarganegaraan,
              'pekerjaan'=>$request->pekerjaan,
              'alamat_lengkap'=>$request->alamat,
              'provinces_id'=>$request->prov,
              'cities_id'=>$request->kab,
              'districts_id'=>$request->kec,
              'villages_id'=>$request->kel,
              'jenis_identitas'=>$request->jenis_identitas,
              'no_identitas'=>$request->no_identitas,
              'total_lembar_saham'=>$request->total_lembar_saham,
              'nilai_saham'=>$request->nilai_saham,
              'total_modal'=>$request->total_modal,
              'nilai_saham'=>$modal_dasar->nilai_lembar_saham,
              'total_modal_ditempatkan'=>$modal_setor,
              'persentase'=>$persentase,
              'nama_perusahaan'=>$request->nama_perusahaan,
              'created_at'=>Carbon::now(),
              'add_by'=>Auth::user()->id,
              'file'=> $input['gambar'],


            ]);
            $investor=DB::table('project_investor')
            ->select(DB::raw('SUM(total_lembar_saham) as total_lembar_saham'),DB::raw('SUM(nilai_saham) as nilai_saham'),
            DB::raw('SUM(total_modal) as total_modal'))
            ->Where('project_id',$request->project_id)->orWherenull('project_id')->get();
            $total_saham_investor=0;
            $total_modal_investor=0;
            foreach ($investor as $key) {
              $total_saham_investor+=$key->total_lembar_saham;
              $total_modal_investor+=$key->total_modal;
            }

            $sisa_saham=$modal->total_lembar_saham-$total_saham_investor;
            $total_modal=$total_modal_investor;
            //$modal_ditempatkan=25/100*$request->total_modal;

            $data=DB::statement("UPDATE project_perusahaan SET total_modal_dasar=$total_modal_investor WHERE project_id=$request->project_id ");

            $semua=round(25/100*$total_modal_investor);
            $data1=DB::statement("UPDATE project_perusahaan SET total_modal_setor=$semua WHERE project_id=$request->project_id ");


              toastr()->success('Data has been saved successfully!','Selamat!');
                  return redirect()->back();
                }else {
                    toastr()->error('Hanya File pdf,doc,docx,jpeg,png,jpg Max 2mb!');
                      return redirect()->back();
           }
        }catch(\Exception $e){
        DB::rollback();
          //gagal
                    //toastr()->success('Data has been saved successfully!');
                    //return redirect()->back();
          echo $e;
          }
    }
    function hapus_investor(Request $request){
      DB::beginTransaction();
      try{
        DB::commit();
        //dd($request->all());
        $dt=DB::table('project_investor')->where('id',$request->id)->first();
        $folder=public_path('storage/dokumen/'.$request->kode.'/'.$dt->file);
        $data=File::delete($folder);
        $investor=DB::table('project_investor')->where('id',$request->id)->first();
        $perusahaan=DB::statement("UPDATE project_perusahaan SET total_modal_dasar=total_modal_dasar-$investor->total_modal WHERE project_id=$request->project_id ");
        DB::table('project_investor')->where('id',$request->id)->delete();
        toastr()->success('Data has been deleted successfully!','Selamat!');
        return redirect()->back();
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }

    }
    protected function data_klien($user_id)
    {

      $data=DB::table('users')->join('profile','profile.users_id','=','users.id')->where('users.id',$user_id)->first();
      return $data;
    }
    protected function direksi($project_id)
    {
      $data=DB::table('project_direksi')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_direksi.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_direksi.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_direksi.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_direksi.villages_id')
      ->where('project_direksi.project_id',$project_id)->orWherenull('project_direksi.project_id')->get();
    return $data;
    }
    protected function modal($project_id)
    {
      // $data=DB::table('project_investor')
      // ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_investor.provinces_id')
      // ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_investor.cities_id')
      // ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_investor.districts_id')
      // ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_investor.villages_id')
      // ->where('project_investor.project_id',$project_id)->orWherenull('project_investor.project_id')->get();
      //
      $project=DB::table('project')->where('id',$project_id)

      ->first();
      $investor=DB::table('project_investor')
       ->Where('project_id',$project_id)
       ->select(DB::raw('SUM(total_lembar_saham) as total_lembar_saham'),DB::raw('SUM(nilai_saham) as nilai_saham'),
       DB::raw('SUM(total_modal) as total_modal'))
       ->orWherenull('project_id')->get();
       $total_saham_investor=0;
       $total_modal_investor=0;
       foreach ($investor as $key) {
         $total_saham_investor+=$key->total_lembar_saham;
         $total_modal_investor+=$key->total_modal;
       }
       $modal=DB::table('project_perusahaan')->where('project_id',$project_id)->first();
       $sisa_saham=$modal->total_lembar_saham-$total_saham_investor;
       // $total_lembar_saham=DB::table('project_investor')->select(DB::raw('SUM(total_lembar_saham) as total_lembar_saham'))->where('project_id',$project_id)
       // ->orWherenull('project_id')->first();
       // $nilai_saham=DB::table('project_investor')->select(DB::raw('SUM(nilai_saham) as nilai_saham'))->where('project_id',$project_id)->orWherenull('project_id')->first();
       // $total_modal=DB::table('project_investor')->select(DB::raw('SUM(total_modal) as total_modal'))->where('project_id',$project_id)->orWherenull('project_id')->first();
       // $total_modal_ditempatkan=DB::table('project_investor')->select(DB::raw('SUM(total_modal_ditempatkan) as total_modal_ditempatkan'))->where('project_id',$project_id)->orWherenull('project_id')->first();

      $data=DB::table('project_investor')
      ->where('project_investor.project_id',$project_id)->orWherenull('project_id')->get();
      $data1=DB::table('project_investor')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_investor.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_investor.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_investor.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_investor.villages_id')
      ->leftJoin('project','project.id','=','project_investor.project_id')
      ->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
      ->where('project_investor.project_id',$project_id)->first();
      $jabatan=DB::table('jabatan')->get();
      $array=[
        'total_lembar_saham'=>$total_saham_investor,
        'total_modal_investor'=>$total_modal_investor,
        'sisa_saham'=>$sisa_saham,
        'nilai_saham'=>$modal->nilai_lembar_saham,
        'modal_ditetapkan'=>$modal->total_modal_dasar,
        'total_saham'=>$modal->total_lembar_saham

      ];

    return $array;
    }
    function update_perusahaan(Request $request){
      DB::beginTransaction();
      try{
        DB::commit();
        DB::table('project_perusahaan')->where('project_id',$request->id)->update(['nama_perusahaan'=>$request->nama_perusahaan,'jenis_usaha_id'=>$request->jenis_usaha,'total_lembar_saham'=>$request->total_lembar_saham,'nilai_lembar_saham'=>$request->nilai_lembar_saham,'kota'=>$request->kota,'negara'=>$request->negara,'rups'=>$request->rups]);
        toastr()->success('Data has been saved successfully!','Selamat!');
        return redirect()->back();
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
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
        DB::table('project')->insert([
          'kode'=>$this->kode(),
          'users_id'=>$request->klien,
          'project_type'=>$request->project_type,
          'jenis_akta_id'=>$request->jenis_akta_id,
          'created_at'=>Carbon::now(),
          'updated_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id
        ]);
        $id = DB::getPdo()->lastInsertId();
        DB::table('project_perusahaan')->insert(['project_id'=>$id,'add_by'=>Auth::user()->id,'created_at'=>Carbon::now()]);
        DB::table('project_perusahaan')->insert(['project_id'=>$id,'total_lembar_saham'=>$request->total_lembar_saham,'nilai_lembar_saham'=>$request->nilai_lembar_saham,'add_by'=>Auth::user()->id,'created_at'=>Carbon::now()]);

        Activity()
        ->causedBy(Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.'Tambah Project Notaris');
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('project-notaris.index');
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
      $this->authorize('project notaris');
      $xx=DB::table('project')->where('id',$id)->where('add_by',Auth::user()->id)->count();
    if ($xx==0) {
      toastr()->error('Not Allowed!', 'Access Denied!');
      return redirect()->route('project-notaris.index');
    }
      $project=DB::table('project')->where('project.id',$id)->where('project.add_by',Auth::user()->id)

      ->first();
      $project1=DB::table('project')->where('project.id',$id)->where('project.add_by',Auth::user()->id)
      ->join('users','users.id','=','project.add_by')->select(['project.status','users.name'])
      ->first();
      $penghadap=DB::table('project_penghadap')
      ->leftJoin('project','project_penghadap.project_id','=','project.id')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_penghadap.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_penghadap.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_penghadap.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_penghadap.villages_id')
      ->where('project_penghadap.project_id',$id)->orWherenull('project_penghadap.project_id')
      //->select(['project_penghadap.nama_lengkap'])
        ->get();
        $klien=$this->data_klien($project->users_id);
        $direksi=$this->direksi($project->id);
        $investor=$this->modal($project->id);
        $comment=$this->comment($project->id);
        return view('layanan.project.notaris.show',compact('project','project1','penghadap','klien','direksi','investor','comment'));
    }
      public function save_komentar(Request $request)
      {
        DB::beginTransaction();
        try{
          DB::commit();
          DB::table('project_comment')->insert([
            'project_id'=>$request->project_id,
            'users_id'=>Auth::user()->id,
            'content'=>$request->content,
            'created_at'=>Carbon::now(),
          ]);
          Activity()
          ->causedBy(Auth::user()->id)
          ->withProperties($request->all())
          ->log(Auth::user()->name.'Tambah Komentar');
          toastr()->success('Data Berhasil Disimpan!', 'Ok');
          return redirect()->back();
          }catch(\Exception $e){
          DB::rollback();
          //gagal
          echo $e;

          }
      }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function comment($id){
      return DB::table('project_comment')->where('project_id',$id)
      ->join('users','users.id','=','project_comment.users_id')
      ->select(['project_comment.id','project_comment.users_id','project_comment.content','project_comment.created_at','users.name'])
      ->get();
     }
    public function edit($id)
    {
      $this->authorize('edit project notaris');

      $xx=  DB::table('project')->where('id',$id)->where('add_by',Auth::user()->id);
        if ($xx->count()==0) {
          toastr()->error('Access Denied!', 'Error');
          return redirect()->route('project-notaris.index');
        }else {
          $project=DB::table('project')->where('id',$id)->where('add_by',Auth::user()->id)->first();
          $klien=DB::table('users')->where('id',$project->users_id)->first();
          $jenis1=DB::table('jenis_akta')->where('id',$project->jenis_akta_id)->first();
          $user=DB::table('users')->where('add_by',Auth::user()->id)->get();
          $jenis=DB::table('jenis_akta')->get();
          $enum=DB::table('project')->select(['project_type'])->get();
        }
        return view('layanan.project.notaris.edit',compact('project','klien','jenis','user','jenis1'));
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
        DB::table('project')->where('id',$id)->update([
          'users_id'=>$request->klien,
          'project_type'=>$request->project_type,
          'jenis_akta_id'=>$request->jenis_akta_id,
          'status'=>$request->status,
          'reason'=>$request->reason,
          'updated_at'=>Carbon::now()
        ]);

        Activity()
        ->causedBy(Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.'Edit Project Notaris');
        toastr()->success('Data Berhasil Disimpan!', 'Data Update');
        return redirect()->route('project-notaris.index');
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
