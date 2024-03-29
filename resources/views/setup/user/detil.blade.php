@extends('layouts.master')
@section('title')
  Detil
@endsection
@section('costumcss')

@endsection
@section('atas')
  <section class="content-header">
    <h1>
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Examples</a></li>
      <li class="breadcrumb-item active">User profile</li>
    </ol>
  </section>
@endsection
@section('content')
  <div class="box">
    <div class="box-body box-profile">
      <div class="row">
        <div class="col-md-4 col-12">
          <div class="profile-user-info">
    <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
    <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
    <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
  </div>
      </div>
        <div class="col-md-3 col-12">
          <div class="profile-user-info">
    <p class="margin-bottom">Social Profile</p>
    <div class="user-social-acount">
      <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
      <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
      <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
    </div>
  </div>
      </div>
        <div class="col-md-5 col-12">
          <div class="profile-user-info">
    <div class="map-box">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
      </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  
@endsection

@section('costumjs')

@endsection

@section('script')

@endsection
