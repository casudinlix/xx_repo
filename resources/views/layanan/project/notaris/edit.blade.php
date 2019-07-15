@extends('layouts.master')
@section('title')
  Edit {{$project->kode}}
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
  <link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">

@endsection
@section('atas')
  <section class="content-header">
    <h1>
    Data Project
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Pekerjaan</a></li>
      <li class="breadcrumb-item">Project</li>
      <li class="breadcrumb-item active">{{$project->kode}}</li>
    </ol>
  </section>
@endsection
@section('content')

  <form class="" action="{{route('project-notaris.update',[$project->id])}}" method="post">
    @method('PUT')
    <div class="form-group">
      <label for="">Klien</label>
     <select class="form-control select2" name="klien" data-placeholder="Pilih" data-allow-clear="true" required id="klien">
       <option value=""></option>
      @foreach ($user as $key )
        <option value="{{$key->id}}" {{($key->id==$klien->id)?"selected":""}}>{{$key->name}}</option>
      @endforeach

     </select>


    </div>
    <div class="form-group">
      <label for="">Tipe Project</label>
      <select class="form-control" name="project_type" required  id="project_type">
        <option value="">--</option>
        <option value="Perseorangan" {{($project->project_type=='Perseorangan')?"selected":""}}>Perseorangan</option>
        <option value="Badan Hukum / Usaha" {{($project->project_type=='Badan Hukum / Usaha')?"selected":""}}>Badan Hukum / Usaha</option>
      </select>
    </div>
    <div class="form-group">
      <label for="">Project</label>
      <select class="form-control" name="jenis_akta_id" required id="jenis_akta_id">
        <option value="">--</option>
       @foreach ($jenis as $key )
         <option value="{{$key->id}}" {{($project->jenis_akta_id==$key->id)?"selected":""}}>{{$key->nama_jenis_akta}}</option>
       @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Status</label>
      <select class="form-control" name="status" required id="status">
        <option value="On Progress" {{($project->status=='On Progress')?"selected":""}}>On Progress</option>
        <option value="Cancelled" {{($project->status=='Cancelled')?"selected":""}}>Cancelled</option>
        <option value="Pending" {{($project->status=='Pending')?"selected":""}}>Pending</option>
        <option value="Finish" {{($project->status=='Finish')?"selected":""}}>Finish</option>

      </select>
    </div>
    <div class="form-group">
      <label for="">Reason</label>
      <textarea name="reason" class="form-control" id="reason">{{$project->reason}}</textarea>
    </div>
  </div>
  <div class="modal-footer modal-footer-uniform">
<a href="{{ URL::previous() }}">  <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
  <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button></a>
  </div>
  @csrf
   </form>
@endsection

@section('costumjs')
<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
  $('.select2').select2();
</script>
@endsection
