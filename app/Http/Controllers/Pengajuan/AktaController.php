<?php

namespace App\Http\Controllers\Pengajuan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Response;
use DataTables;
use DB;
use Auth;
class AktaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('data generate akta');
      $jenis=DB::table('jenis_akta')->get();
      $akta=DB::table('template_akta')->where('add_by',Auth::user()->id)->get();
      $project=DB::table('project')->where('status','!=','Canceled')->where('status','!=','Finish')->get();
        return view('layanan.akta.index',compact('jenis','akta','project'));
    }
    function akta_list(){
      $data=DB::table('project_akta')->leftJoin('jenis_akta','jenis_akta.id','=','project_akta.jenis_akta_id')
      ->join('users','users.id','=','project_akta.users_id')
      ->select(['project_akta.id','project_akta.no_akta','jenis_akta.nama_jenis_akta','project_akta.created_at','users.name'])->where('project_akta.add_by',Auth::user()->id);
      return Datatables::of($data)


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
      $this->authorize('data generate akta');
        $jenis=DB::table('jenis_akta')->get();
        $akta=DB::table('template_akta')->where('add_by',Auth::user()->id)->get();
        $project=DB::table('project')->where('status','!=','Canceled')->where('status','!=','Finish')->get();
        return view('layanan.akta.create',compact('jenis','project','akta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data=[
            'req'=>$request->xx,
        ];

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
        //
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
        //
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
