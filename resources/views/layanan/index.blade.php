@extends('layouts.master')
@section('title')
  Layanan
@endsection
@section('menu')
  <div class="main-menu-content">
      <ul class="main-navigation">
        <li class="nav-item {{isActiveRoute('home')}}">
            <a href="{{route('home')}}">
                <i class="ti-home"></i>
                <span>Home</span>
            </a>

        </li>
        <li class="nav-item">
            <a href="javascript:!">
                <i class="ti-briefcase"></i>
                <span>Layanan</span>
            </a>
            <ul class="tree-1">
                <li class="nav-sub-item"><a href="javascript:">Project Pekerjaan</a>
                    <ul class="tree-2">
                        <li><a href="{{route('project-notaris.index')}}">Notaris</a></li>
                        <li><a href="../vertical-overlay/menu-header-fixed.html" target="_blank">PPAT</a></li>
                        <li><a href="../vertical-compact/menu-compact.html" target="_blank">Dashboard Project</a></li>
                        <li><a href="../vertical-sidebar-fixed/menu-sidebar.html" target="_blank">Sidebar Fixed</a></li>
                    </ul>
                </li>
                <li class="nav-sub-item"><a href="javascript:">Klien</a>
                    <ul class="tree-2">
                        <li><a href="../horizontal-static/menu-horizontal-static.html">Akta Klien</a></li>
                        <li><a href="{{route('klien-saya.index')}}">Data Klien</a></li>
                      </ul>
                </li>
      </ul>
    </div>
@endsection
@section('costumcss')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}"/>
@endsection
@section('menu')

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Service Notaris / PPAT</h4>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="icofont icofont-home"></i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Notaris</a>
              </li>

          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="page-body" style="background-color:#2c3e50">
      <div class="row">
        <div id="wrap-slide">
        <div id="ahu-slide">
           <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-5 list-item">

          <li class="item">
          <a href="{{route('project-notaris.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/project.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Project Notaris</p>
          </div>
          </li>
          <li class="item">
          <a href="{{route('project-notaris.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/ppat.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Project PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="{{route('klien-saya.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/users.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Klien</p>
          </div>
          </li>
          <li class="item">
          <a href="{{route('akta.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/akta.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Template Akta</p>
          </div>
          </li>
          <li class="item">
          <a href="{{route('aktaku.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/akta_klien.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Akta Klien</p>
          </div>
          </li>

        </div>
        </div>
      </div>
  </div>
@endsection

@section('costumjs')

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
