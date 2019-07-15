@extends('layouts.master')
@section('title')
  Assign Permission
@endsection
@section('costumcss')
  <link rel="stylesheet" href="{{asset('assets/vendor_plugins/iCheck/all.css')}}">

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Permission</h4>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="icofont icofont-home"></i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Pages</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Role</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Assign Role</a>
              </li>
          </ul>
      </div>
  </div>

@endsection
@section('content')
  <div class="page-body">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
                      <h5>{{$role->name}}</h5>
                      <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                      <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                  </div>
                  <div class="card-block">
                    <div class="col-sm-12 col-xl-6 m-b-30">
                                      <h4 class="sub-title">Pilih Permission</h4>
                                      <form class="" action="{{route('setrole.permission',[$role->name])}}" method="post">
                                        @method('PUT')
                                      	@foreach ($permissions as $key=> $row )
                                      <div class="checkbox-fade fade-in-success">
                                          <label>
  <input type="checkbox" value="{{ $row }}" {{ in_array($row, $hasPermission) ? 'checked':'' }} name="permission[]">
                                              <span class="cr">
                                  <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                </span> <span>{{$row}}</span>
                                          </label>
                                      </div>
                                      @endforeach
                                      <button class="btn btn-primary btn-sm">
                                      <i class="ti-save"></i> Set Permission
                                    </button>
                                    @csrf
                                      </form>

                                  </div>
                              </div>

                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection

@section('costumjs')
<script src="{{asset('assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
//[advanced form element Javascript]

//Project:	Fab Admin - Responsive Admin Template
//Primary use:   Used only for the advanced-form-element


</script>
@endsection
