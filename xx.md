

@extends('layouts.master')
@section('title')
  Klien
@endsection
@section('costumcss')

@endsection
@section('menu')
  asasas
@endsection
@section('atas')
  asasas
@endsection
@section('content')
  asasas
@endsection

@section('costumjs')

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

data-placeholder="Pilih" data-allow-clear="true"


DB::beginTransaction();
try{
  DB::commit();
  //query sukses
  }catch(\Exception $e){
  DB::rollback();
  //gagal
  echo $e;

  }
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}:.@yield('title')</title>
php artisan migrate:rollback --step=10
php artisan make:migration create_project_table
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
Activity()
->causedBy(Auth::user()->id)
->withProperties($request->all())
->log(Auth::user()->name.'Edit Permission Master');
$this->authorize('read.access');
$id = DB::getPdo()->lastInsertId();
data-toggle="tooltip" data-original-title="Delete"
make:migration change_profile_table --table=profile


$usersArray = SimpleCurl::get('http://mysite.com/api/v1/user/all')->getResponseAsArray();

    // Or (Gives Response As Json)
    $usersJson = SimpleCurl::get('http://mysite.com/api/v1/user/all')->getResponseAsJson();

    // Or (Gives Response As Collection)
    $usersCollection = SimpleCurl::get('http://mysite.com/api/v1/user/all')->getResponseAsCollection();

    // Or (Gives Response As LengthAwarePaginator, if the response is paginated)
    $usersPaginated = SimpleCurl::get('http://mysite.com/api/v1/user/all')->getPaginatedResponse();
{{ url()->previous() }}
../../bower_components
