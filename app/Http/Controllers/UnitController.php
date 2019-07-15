<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\User;
use Gate;
use Terbilang;
use Spatie\Activitylog\Models\Activity;
use Response;

use Carbon\Carbon;
use Lexx\ChatMessenger\Models\Message;
use Lexx\ChatMessenger\Models\Participant;
use Lexx\ChatMessenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Pusher; // Pusher\Laravel\Facades\Pusher

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$thread = Thread::getAllLatest()->get();
      return view('tes',compact('thread'));

    //   $user=User::find(3);
    //   return Response()->json($user->getRoleNames());
    //   //untuk memberikan akses kepada user individu
    //   //$user->assignRole('super_admin');
    //   //$role->givePermissionTo('edit articles');
    //   //  $role=Role::find(1);
    //   // $role->givePermissionTo('assign role');
    //   //
    //   // if ($role==TRUE) {
    //   //   echo "OK";
    //   // }else {
    //   //   echo "BAD!!";
    //   // }
    //   if (! Gate::allows('tes permission')) {
    //         return abort(401);
    //     }
    //     //activity()->log('log something');
    //     //dd(Activity::all());
    //   // dd(Auth::user());
    //   //echo tgl_indo(\Carbon\Carbon::now());
    // }
      Carbon::now();
    function tes(){

      $data              = [
        'nama_pt'=>'PT. ABC',
        'nama_saya'=>"Admin Ganteng"
      ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   }
    public function create()
    {
        return view('tes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
      function get_prov(){
        $data=\Indonesia::allProvinces();

        return response()->json(
          [
            'messeges'=>'Ok bro',
            'data'=>$data
          ],200
        );

      }
      public function filterProvince(Request $request)
   {
       $filter = strtoupper($request->filter);
       $provinces = \Indonesia::search($filter)->allProvinces();



       return response()->json([
           'message' => 'success',
           'data' => $provinces
       ], 200);
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
    function app()
    {

    }
    function sd()
{
}

}
