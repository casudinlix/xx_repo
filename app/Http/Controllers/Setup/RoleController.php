<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validate;
use Gate;
use DataTables;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Auth;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (! Gate::allows('role master')) {
            return abort(401);
        }

      return view('setup.role.ok');
        //
    }
    function update_role(Request $request){
      DB::beginTransaction();
      try{
        $role = Role::findOrFail($request->id);
        $role->update($request->all());
        DB::commit();
        Activity()
        ->causedBy(Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.' Update Role Master');
        toastr()->success('Data Berhasil Disimpan!', 'Selamat');
        return redirect()->route('role.index');

        //query sukses
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }
    }
    function role_list(Request $request){
      $role=Role::all();
      return Datatables::of($role)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("name like ?", ["%{$keyword}%"]);
            })
            ->editColumn('created_at', function ($role) {
                return tgl_indo($role->updated_at);
            })
            ->editColumn('updated_at', function ($role) {
                return tgl_indo($role->updated_at);
            })
            ->addColumn('action', function ($role) {
                return '<button type="button" data-target="#editpermission" class="btn btn-sm btn-outline-primary btn-rounded" data-whatever="' . $role->id . '" data-name="' . $role->name . '" data-guard="' . $role->guard_name . '" data-toggle="modal"><i class="ti-pencil-alt"></i></i> Edit</button>
                <a href="' . route('role.show',[$role->id]) . '" class="btn btn-sm btn-warning btn-outline-warning btn-rounded"><i class="ti-unlock"></i>Assign Permission</a>';
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah role master
        if (! Gate::allows('tambah role master')) {
              return abort(401);
          }
          DB::beginTransaction();
          try{
            Role::create($request->all());
            //Role::firstOrCreate($request->all());
            DB::commit();
            Activity()
            ->causedBy(Auth::user()->id)
            ->withProperties($request->all())
            ->log(Auth::user()->name.' Tambah Role Master');
            toastr()->success('Data Berhasil Disimpan!', 'Selamat');
            return redirect()->route('role.index');
            //dd($request->all());
            //query sukses
            }catch(\Exception $e){
            DB::rollback();
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
      if (! Gate::allows('assign role')) {
            return abort(401);
        }
        $role =DB::table('roles')->where('id',$id)->first();
        $permissions = null;
        $hasPermission = null;

        $roles = Role::all()->pluck('name');
        if (!empty($role)) {
        //select role berdasarkan namenya, ini sejenis dengan method find()
        $getRole = Role::findByName($role->name);

        //Query untuk mengambil permission yang telah dimiliki oleh role terkait
        $hasPermission = DB::table('role_has_permissions')
            ->select('permissions.name')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_id', $getRole->id)->get()->pluck('name')->all();

        //Mengambil data permission
        $permissions = Permission::all()->pluck('name');
    }
    //$user=\App\User::find(1);
    //$data=$user->getPermissionsViaRoles();
        return view('setup.role.show',['role'=>$role,'roles'=>$roles,'permissions'=>$permissions,'hasPermission'=>$hasPermission]);
    }
    function setrolepermission(Request $request, $role){

    DB::beginTransaction();
    try{
        DB::commit();
      $role = Role::findByName($role);
      ///fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
      //kemudian di-assign kembali sehingga tidak terjadi duplicate data
      $role->syncPermissions($request->permission);
      //dd($request->permission);
      Activity()
      ->causedBy(Auth::user()->id)
      ->withProperties($request->all())
      ->log(Auth::user()->name.' Update Role Permission');
      toastr()->success('Data Berhasil Disimpan!', 'Selamat');
      return redirect()->route('role.index');
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
