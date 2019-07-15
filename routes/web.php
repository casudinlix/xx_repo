<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect('login');
});
route::get('/chat','ChatsController@index');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');
Route::get('get_chat/{chat}', function ($id) {
$data=\App\User::findOrFail($id);
$thread = Thread::findOrFail($id);
$userId = Auth::id();
$users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
$thread->markAsRead($userId);
return view('layouts.chating',compact('data'));

})->middleware('can:live chat');
Route::get('angular',function(){
  $data=\App\User::all();

  return response()->json($data);
  ;
});

//Route::resource('/vue','VueController');
//Route::get('/{any}', 'VueController@index')->where('any', '.*');
Route::get('/vue/{vue_capture?}', function () {
 return view('vue');
})->where('vue_capture', '[\/\w\.-]*');

Auth::routes(['register' => false]);

Route::get('dashboard', function() {
    return view('dashboard');
})->middleware('auth');
Route::group(['middleware' => ['auth'],'prefix' => 'service'], function () {

  Route::get('notaris/index', function() {

      return view('layanan.index');
  })->name('service.index')->middleware('can:project notaris');

});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

route::get('sms','Sms\SmsController@index');
route::get('tes','Setup\UserController@tes');
route::get('testing','UnitController@index');

//route::get('file','UnitController@create');
Route::group(['middleware' => ['auth'], 'prefix' => 'profile'], function () {
  Route::resource('me','Profil\ProfilController');
});
//File filemanager
Route::group(['middleware' => ['auth'], 'prefix' => 'file'], function () {
  Route::get('saya','Filemanager\FileController@index')->name('file.saya');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'setup'], function () {
  Route::resource('role','Setup\RoleController');
  Route::resource('permission','Setup\PermissionController');
  Route::post('getpermission','Setup\PermissionController@permission_list');
  Route::PUT('update_permission','Setup\PermissionController@update_permission');
  Route::post('getrole','Setup\RoleController@role_list');
  Route::PUT('update_role','Setup\RoleController@update_role');
  Route::resource('users','Setup\UserController');
  Route::post('getusers','Setup\UserController@user_list');
  Route::get('user/sepecial-permission/{id}','Setup\UserController@permission')->name('user.permission');
  Route::get('user/sepecial-role/{id}','Setup\UserController@role')->name('user.role');
  Route::put('assignrole-permission/{role}', 'Setup\RoleController@setrolepermission')->name('setrole.permission');
});

//ajax Request
Route::group(['middleware' => ['auth'], 'prefix' => 'data'], function () {
route::get('json_prov','Ajax\AjaxController@get_provinsi');
route::get('json_kota/{id}','Ajax\AjaxController@get_kota');
route::get('json_kecamatan/{id}','Ajax\AjaxController@get_kecamatan');
route::get('json_kelurahan/{id}','Ajax\AjaxController@get_kelurahan');
Route::get('ajax_klien/{id}','Ajax\AjaxController@get_klien');
Route::get('ajax_penghadap/{id}','Ajax\AjaxController@penghadap');
Route::get('ajax_direksi/{id}','Ajax\AjaxController@direksi');
Route::get('ajax_investor/{id}','Ajax\AjaxController@investor');
Route::get('ajax_saham/{id}','Ajax\AjaxController@saham');
Route::get('ajax_perusahaan/{id}','Ajax\AjaxController@perusahaan');


});

Route::group(['middleware' => ['auth'], 'prefix' => 'layanan'], function () {
Route::resource('project-notaris','Layanan\ProjectNotarisController');
Route::post('json_project','Layanan\ProjectNotarisController@project_list')->name('project.list');
Route::PUT('project-edit','Layanan\ProjectNotarisController@edit_project')->name('project.edit');
Route::resource('klien-saya','Layanan\KlienController');
Route::post('json_klien','Layanan\KlienController@klien_list')->name('klien.list');
route::post('save_penghadap','Layanan\ProjectNotarisController@save_penghadap')->name('store.penghadap');
route::post('hapus_penghadap','Layanan\ProjectNotarisController@hapus_penghadap')->name('delete.penghadap');
route::post('save_direksi','Layanan\ProjectNotarisController@save_direksi')->name('store.direksi');
route::post('hapus_direksi','Layanan\ProjectNotarisController@hapus_direksi')->name('delete.direksi');
route::post('save_investor','Layanan\ProjectNotarisController@simpan_investor')->name('store.investor');
route::post('hapus_investor','Layanan\ProjectNotarisController@hapus_investor')->name('delete.investor');
route::PUT('update_pt','Layanan\ProjectNotarisController@update_perusahaan')->name('update.pt');
//Layanan Akta
route::resource('akta','Layanan\AktaNotarisController');
route::post('project_komentar','Layanan\ProjectNotarisController@save_komentar')->name('store.komentar');
route::post('ajax_akta','Layanan\AktaNotarisController@akta_list')->name('akta.list.klien');

});
Route::group(['middleware' => ['auth'], 'prefix' => 'pengajuan'], function () {
Route::resource('aktaku', 'Pengajuan\AktaController');
Route::post('json_akta', 'Pengajuan\AktaController@akta_list')->name('aktaku.list');

Route::get('get_pro/{id}', function(\Request $request) {
$data=\DB::table('project')
->join('jenis_akta','jenis_akta.id','=','project.jenis_akta_id')
->join('users','users.id','=','project.users_id')
->select(['project.id','jenis_akta.nama_jenis_akta','users.name','project.jenis_akta_id','users.id as users_id'])
->where('project.id',$request::input('id'))->first();
return response()->json($data);
})->name('akta.getall');

Route::get('data_akta/{id}', function(\Request $request) {
    $data=\DB::table('template_akta')->where('id',$request::input('id'))
    ->where('add_by',Auth::user()->id)->first();

    return response()->json($data);

})->name('get.akta');

Route::get('data/{id}', function ($id) {

  $penghadap=\DB::table('project_penghadap')->where('project_id',$id)->get();
//$alamat=\DB::table('project_penghadap')->join('indonesia_provinces','indonesia_provinces.id')->where('project_id',$id)->get();
return view('layanan.akta.ajax.data',compact('penghadap','id'));
})->name('akta.penghadap');

});
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//     Route::post('filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('unisharp.lfm.upload');
//     // list all lfm routes here...
// });
