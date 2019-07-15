
@extends('layouts.master')
@section('title')
  File Manager
@endsection
@section('costumcss')
<style media="screen">
.iframe-container {
  position: relative;
  overflow: hidden;
  padding-top: 56.25%;
}
</style>
@endsection
@section('atas')
  <section class="content-header">
    <h1>
    File Manager
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Fiture</a></li>
      <li class="breadcrumb-item active">File Manager</li>
    </ol>
  </section>
@endsection
@section('content')
  <div class="">
    <iframe src="{{url('filemanager')}}" style="width: 100%; height: 500px; overflow: hidden; border: none; position: relative"></iframe>
  </div>
@endsection

@section('costumjs')

@endsection

@section('script')

@endsection
