<?php

namespace App\Http\Controllers\Layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use Input;
use DataTables;
use DB;
use Spatie\Activitylog\Models\Activity;
class AktaNotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('master akta');
        return view('layanan.project.notaris.akta.index');
    }

    function akta_list(Request $request){
      $data=DB::table('template_akta')->leftJoin('jenis_akta','jenis_akta.id','=','template_akta.jenis_akta_id')
      ->select(['template_akta.id','template_akta.nama_akta','jenis_akta.nama_jenis_akta','template_akta.created_at'])->where('template_akta.add_by',Auth::user()->id);
      return Datatables::of($data)
            ->filterColumn('template_akta.nama_akta', function ($query, $keyword) {
                $query->whereRaw("template_akta.nama_akta like ?", ["%{$keyword}%"]);
            })

            ->addColumn('created_at', function ($data) {
                return tgl_indo($data->created_at);
            })

            ->addColumn('action', function ($data) {

                return '<a href="' . route('akta.edit',[$data->id]) . '" class="btn-outline-primary btn-rounded btn btn-sm btn-primary " data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil"></i> Edit</button>


                ';



            })->escapeColumns([])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('buat akta');
        $jenis=DB::table('jenis_akta')->get();
        return view('layanan.project.notaris.akta.create',compact('jenis'));
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
        DB::table('template_akta')->insert([
          'jenis_akta_id'=>$request->jenis,
          'nama_akta'=>$request->nama,
          'content'=>$request->content,
          'created_at'=>Carbon::now(),
          'add_by'=>Auth::user()->id
        ]);
        Activity()
        ->causedBy(Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.' Menambahkan Tamplate Akta Baru');
        toastr()->success('Data Berhasil Disimpan!','Selamat');
        return redirect()->route('akta.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('buat akta');
      $jenis=DB::table('jenis_akta')->get();

      $data=DB::table('template_akta')->where('id',$id)->first();
      //
      // $template          = new \App\Models\AktaModel;
      // $template->id      = $id;
      // $template->content =$data->content;
      //
      // $array=[
      //   'nama_perusahaan'=>'PT ABC',
      //   'nomor_akta'=>"123564"
      // ];
      // $isi=$template->parse($array);

      return view('layanan.project.notaris.akta.edit',compact('jenis','data'));
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
        DB::table('template_akta')->where('id',$id)->update(['jenis_akta_id'=>$request->jenis,'content'=>$request->content,'updated_at'=>Carbon::now()]);
        Activity()
        ->causedBy(Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.' Edit Tamplate Akta');
        toastr()->success('Data Berhasil Disimpan!','Selamat');
        return redirect()->route('akta.index');
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
