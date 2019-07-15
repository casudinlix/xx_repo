@extends('layouts.master')
@section('title')
  Klien
@endsection
@section('costumcss')

@endsection
@section('atas')
   <section class="content-header">
    <h1>
    Permission
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Setup</a></li>
      <li class="breadcrumb-item active">Permisson</li>
    </ol>
  </section>
@endsection
@section('content')
 <div class="row">
<div class="col-12">

  <div id="app">
            <router-view></router-view>
  </div>

</div>
</div>
</div>

@endsection

@section('costumjs')
 <script src="{{asset('js/app.js')}}" ></script>
@endsection

@section('script')

@endsection
