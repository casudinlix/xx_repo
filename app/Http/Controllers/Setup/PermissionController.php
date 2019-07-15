<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Setup\PermissionModel;
use Spatie\Permission\Models\Permission;
use Gate;
use DataTables;
use DB;
use Input;
use Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //setup Permission master
        if (! Gate::allows('setup Permission master')) {
              return abort(401);
          }

          return view('setup.permission.index');
    }
    function permission_list(Request $request){
      $permission=Permission::all();
      return Datatables::of($permission)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"]);
            })
            ->editColumn('created_at', function ($permission) {
                return tgl_akta($permission->created_at)." / ".$permission->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function ($permission) {
                return tgl_akta($permission->updated_at);
            })
            ->addColumn('action', function ($permissions) {
                return '<button type="button" data-target="#editpermission" class="btn-outline-warning btn-xs btn-primary" data-whatever="' . $permissions->id . '" data-name="' . $permissions->name . '" data-guard="' . $permissions->guard_name . '" data-toggle="modal"><i class="ti-pencil-alt"></i></button>';
            })->addIndexColumn()
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    function update_permission(Request $request){
      if (! Gate::allows('edit permission master')) {
            return abort(401);
        }
      DB::beginTransaction();
      try{
        $permission = Permission::findOrFail($request->id);
        $permission->update($request->all());
        DB::commit();
        Activity()
       ->causedBy(Auth::user()->id)
       ->withProperties($request->all())
       ->log(Auth::user()->name.' Edit Permission Master');
          toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('permission.index');
        //query sukses
        }catch(\Exception $e){
        DB::rollback();
        echo $e;

        }
      //dd($permission);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (! Gate::allows('tambah permission master')) {
            return abort(401);
        }

      DB::beginTransaction();
      try{
        Permission::create($request->all());
        DB::commit();
        Activity()
       ->causedBy(Auth::user()->id)
       ->withProperties($request->all())
       ->log('Tambah Permission Master');
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('permission.index');
        //query sukses
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
