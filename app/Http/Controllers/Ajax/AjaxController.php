<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Indonesia;
use Response;
use DB;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Auth;
use Carbon\Carbon;
class AjaxController extends Controller
{
    function get_provinsi(){
      $data=Indonesia::allProvinces();
      return Response()->json($data);
    }
    function get_kota($id){
      $data=Kota::where('province_id',$id)->get();
      return Response()->json($data);
    }
    function get_kecamatan($id){
      $data=Kecamatan::where('city_id',$id)->get();
      return Response()->json($data);
    }
    function get_kelurahan($id){
      $data=Kelurahan::where('district_id',$id)->get();
      return Response()->json($data);
    }
    function get_klien($id){
      $project=DB::table('project')->where('id', $id)->where('add_by', Auth::user()->id)->first();

      $klien=DB::table('profile')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','profile.villages_id')
      ->join('users','users.id','=','profile.users_id')
      ->leftJoin('jenis_user','jenis_user.id','=','profile.jenis_user_id')
      ->where('profile.users_id',$project->users_id)
      ->first();
      $klien1=DB::table('profile')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','profile.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','profile.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','profile.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','profile.villages_id')
      ->join('users','users.id','=','profile.users_id')
      ->leftJoin('jenis_user','jenis_user.id','=','profile.jenis_user_id')
      ->where('profile.users_id',$project->users_id)
      ->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
      ->first();
      $date = Carbon::parse($klien->tgl_lahir);
      $now = Carbon::now();
      $diff = $date->diffInYears($now);
      $total_project=DB::table('project')->where('users_id',$project->users_id)->count();
      return view('layanan.project.notaris.ajax.klien',compact('klien','diff','total_project','klien1'));
    }
    function penghadap($project_id)
    {
      $project=DB::table('project')->where('id',$project_id)->first();
      $data=DB::table('project_penghadap')
      ->where('project_penghadap.project_id',$project_id)->orWherenull('project_id')->get();

      $data1=DB::table('project_penghadap')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_penghadap.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_penghadap.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_penghadap.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_penghadap.villages_id')
      ->leftJoin('project','project.id','=','project_penghadap.project_id')
      ->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
      ->where('project_penghadap.project_id',$project_id)->first();
      return view('layanan.project.notaris.ajax.penghadap',compact('data','data1','project'));
    }
    function direksi($project_id){
      $project=DB::table('project')->where('id',$project_id)->first();
      $data=DB::table('project_direksi')
      ->where('project_direksi.project_id',$project_id)->get();
      $data1=DB::table('project_direksi')
      ->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_direksi.provinces_id')
      ->leftJoin('indonesia_cities','indonesia_cities.id','=','project_direksi.cities_id')
      ->leftJoin('indonesia_districts','indonesia_districts.id','=','project_direksi.districts_id')
      ->leftJoin('indonesia_villages','indonesia_villages.id','=','project_direksi.villages_id')
      ->leftJoin('project','project.id','=','project_direksi.project_id')
      ->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
      ->where('project_direksi.project_id',$project_id)->first();
      $jabatan=DB::table('jabatan')->get();
      return view('layanan.project.notaris.ajax.direksi',compact('data','data1','project','jabatan'));

    }
    function saham($id){
      $project=DB::table('project')->where('id',$id)->first();
      $data=DB::table('project_saham')
      ->where('project_saham.project_id',$id)->orWherenull('project_saham.project_id')->first();

      return view('layanan.project.notaris.ajax.saham',compact('data','project'));
    }
    function perusahaan($id){
      $project=DB::table('project')->where('id',$id)->first();
      $data=DB::table('project_perusahaan')->leftJoin('jenis_usaha','jenis_usaha.id','=','project_perusahaan.jenis_usaha_id')
      ->where('project_perusahaan.project_id',$id)->first();
      $jenis=DB::table('jenis_usaha')->get();

      return view('layanan.project.notaris.ajax.perusahaan',compact('data','project','jenis'));
    }
    function investor($project_id)
    {
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
      return view('layanan.project.notaris.ajax.investor',compact('data','data1','project','jabatan','total_lembar_saham','nilai_saham','total_modal_investor','total_saham_investor','modal','sisa_saham'));
    }
}
