

@extends('layouts.master')
@section('title')
  File tes
@endsection
@section('costumcss')
{{-- <link rel="stylesheet" href="{{asset('vendor/laravel-filemanager/css/cropper.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/laravel-filemanager/css/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/laravel-filemanager/css/lfm.css')}}">
<link rel="stylesheet" href="{{asset('vendor/laravel-filemanager/css/mfb.css')}}"> --}}
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

   {{response()->json(Auth::user())}};

@endsection

@section('costumjs')
{{-- <script src="{{asset('vendor/laravel-filemanager/js/cropper.min.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/laravel-filemanager/js/dropzone.min.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/laravel-filemanager/js/jquery.form.min.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/laravel-filemanager/js/mfb.js')}}" charset="utf-8"></script> --}}

@endsection

@section('script')
{{-- <script src="{{asset('vendor/laravel-filemanager/js/script.js')}}" charset="utf-8"></script> --}}
@endsection
