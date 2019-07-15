@extends('layouts.master')
@section('title')
  Kelengkapan Data
@endsection
@section('costumcss')
  <!-- gallery -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor_components/gallery/css/animated-masonry-gallery.css')}}" />

    <!-- fancybox -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor_components/lightbox-master/dist/ekko-lightbox.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">
    <style media="screen">
    .map-responsive{
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}
.map-responsive iframe{
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}
    </style>
@endsection
@section('atas')
  <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Project</a></li>
      <li class="breadcrumb-item"><a href="#">Lengkapi Data</a></li>
      <li class="breadcrumb-item active">{{$project->kode}}</li>
    </ol>
  </section>
@endsection
@section('content')
   <div class="row">
     <div class="col-12 col-lg-12">
       <div class="box box-default">
         <div class="box-header with-border">
           <h3 class="box-title"></h3>

         </div>
         <!-- /.box-header -->
         <div class="box-body">

           <!-- Nav tabs -->
     <ul class="nav nav-tabs nav-fill" role="tablist">
      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#klien-1" role="tab" id="klien"><span class="hidden-sm-up"><i class="mdi mdi-home"></i></span> <span class="hidden-xs-down">Data Klien</span></a>
      </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#perusahaan-1" id="perusahaan" role="tab"><span class="hidden-sm-up"><i class="fa fa-building"></i></span> <span class="hidden-xs-down">Informasi Perusahaan</span></a> </li>
       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pihak-1" role="tab" id="pihak"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">Para Pihak</span></a> </li>

       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#direksi-1"  role="tab" id="direksi"><span class="hidden-sm-up"><i class="fa fa-users"></i></span> <span class="hidden-xs-down">Direksi</span></a> </li>

       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#investor-1" id="investor" role="tab"><span class="hidden-sm-up"><i class="fa fa-users"></i></span> <span class="hidden-xs-down">Pemegang Saham</span></a> </li>
{{-- 
       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#progress-1" id="progress" role="tab"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">Progress</span></a> </li> --}}

     </ul>
     <!-- Tab panes -->
     <div class="tab-content tabcontent-border">
       <div class="tab-pane active" id="klien-1" role="tabpanel">

       </div>
       <div class="tab-pane pad" id="pihak-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="direksi-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="saham-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="perusahaan-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="investor-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="progress-1" role="tabpanel"></div>
       <div class="tab-pane pad" id="messages11" role="tabpanel"></div>

     </div>
         </div>
         <!-- /.box-body -->
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
   </div>
@endsection

@section('costumjs')
  <!-- gallery -->
	<script type="text/javascript" src="{{asset('assets/vendor_components/gallery/js/animated-masonry-gallery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor_components/gallery/js/jquery.isotope.min.js')}}"></script>

    <!-- fancybox -->
    <script type="text/javascript" src="{{asset('assets/vendor_components/lightbox-master/dist/ekko-lightbox.js')}}"></script>




@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){

  var project_id="{{$project->id}}"
    $('#klien-1').load("{{url('data/ajax_klien')}}"+"/"+project_id);
    $("#pihak").click(function(event) {
      $('#pihak-1').load("{{url('data/ajax_penghadap')}}"+"/"+project_id);
    });
    $("#direksi").click(function(event) {
      $('#direksi-1').load("{{url('data/ajax_direksi')}}"+"/"+project_id);
    });
  $("#saham").click(function(event) {
    $("#saham-1").load("{{url('data/ajax_saham')}}"+"/"+project_id);
  });
  $("#investor").click(function(event) {
    $("#investor-1").load("{{url('data/ajax_investor')}}"+"/"+project_id);
  });
  $("#perusahaan").click(function(event) {
    $("#perusahaan-1").load("{{url('data/ajax_perusahaan')}}"+"/"+project_id);
  });
  $("#tab6").click(function(event) {
  $("#tab-6").load("{{url('projectdetil/dokumen')}}"+"/"+project_id);
  });

});

</script>
@endsection
