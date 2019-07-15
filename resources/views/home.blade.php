@extends('layouts.master')
@section('title')
  Home
@endsection
@section('menu')

@endsection
@section('costumcss')
  <!-- Horizontal-Timeline css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/horizontal-timeline/css/style.css')}}">
  <!-- amchart css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/amchart/css/amchart.css')}}">
  <!-- flag icon framework css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}"/>

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Home</h4>
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
              <li class="breadcrumb-item"><a href="#!">home</a>
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
          <a href="{{url('dashboard')}}"><img class="icon animated-hover faa-shake faa-slow" src="{{asset('icon/dashboard.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Dashboard</p>
          </div>
          </li>
          <li class="item">
          <a href="{{route('service.index')}}"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/payroll.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Keuangan</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/pajak.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Pajak</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/payment.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Tagihan</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/toko.png')}}" width="90px"></a>
          <div class="info-app">
          <p>E-Commerce</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/chat.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Live Chat</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
          <li class="item">
          <a href="http://portal.ahu.go.id"><img class="icon icon animated-hover faa-shake" src="{{asset('icon/notaris.png')}}" width="90px"></a>
          <div class="info-app">
          <p>Layanan Notaris / PPAT</p>
          </div>
          </li>
        </div>
        </div>
      </div>
  </div>
@endsection
@section('costumjs')
  <!-- Rickshow Chart js -->
  <script src="{{asset('bower_components/d3/d3.js')}}"></script>
  <script src="{{asset('bower_components/rickshaw/rickshaw.js')}}"></script>
  <!-- Morris Chart js -->
  <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('bower_components/morris.js/morris.js')}}"></script>
  <!-- Horizontal-Timeline js -->
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/horizontal-timeline/js/main.js')}}"></script>
  <!-- amchart js -->
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/amcharts.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/serial.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/light.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/custom-amchart.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
