@extends('layouts.master')
@section('title')
  Klien
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
  <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Klien List</h4>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="icofont icofont-home"></i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Layanan</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Klien</a>
              </li>
          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="page-body">
      <div class="row">
          <div class="col-sm-12">
              <!-- Ajax data source (Arrays) table start -->
              <div class="card">
                  <div class="card-header">
                    @can ('tambah klien')
                      <a class="btn btn-success btn-outline-success btn-rounded" href="{{route('klien-saya.create')}}"> <i class="icon-user-follow"></i>Tambah Klien</a>
                    @endcan
                    <a class="btn btn-success btn-outline-danger btn-rounded" href="{{ url()->previous() }}"><i class="ti-back-right"></i></i> Kembali</a>

                          <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                  </div>
                  <div class="card-block">
                      <div class="table-responsive dt-responsive">
                        <table id="klien" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                          <tr class="bg-blue">



                              <th class="">Nama</th>
                              <th>Jenis User</th>
                              <th>Status</th>

                              <th>Dibuat Pada</th>

                              <th>#</th>

                          </tr>
                        </thead>

                        <tfoot>
                          <tr>



                            <th>Nama</th>
                            <th>Jenis User</th>
                            <th>Status</th>

                            <th>Dibuat Pada</th>

                            <th>#</th>

                          </tr>
                        </tfoot>
                      </table>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>

@endsection

@section('costumjs')
  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">
$('#klien').DataTable({
          responsive:false,
          processing: true,
              serverSide: true,
              lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
              paging: true,
              pageLength:5,
              ajax:{
                  url:"{{route('klien.list')}}",
                  type:"POST",

              },

              columns: [
                {data: 'avatar', name: 'users.avatar'},

                {data: 'nama_jenis_user', name: 'jenis_user.nama_jenis_user'},
                {data: 'status', name: 'users.status'},
                {data: 'created_at', name: 'users.created_at'},
                {data: 'action', name: 'action', orderable: false}


              ],
              search: {
              "regex": true
          },

      initComplete: function () {
                  this.api().columns([1,2]).every(function () {
                      var column = this;
                      var input = document.createElement("input");
                      $(input).appendTo($(column.footer()).empty())
                      .on('change', function () {
                          column.search($(this).val()).draw();
                      });
                  });
              }

      });
</script>
@endsection
