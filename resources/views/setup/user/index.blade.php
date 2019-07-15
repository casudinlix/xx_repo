
@extends('layouts.master')
@section('title')
  User
@endsection
@section('costumcss')
  <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css')}}">

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Role</h4>
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
              <li class="breadcrumb-item"><a href="#!">User</a>
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
                    @can ('manage_users')
                      <a class="btn btn-success btn-outline-success btn-rounded" href="{{route('users.create')}}"><i class="ion-person-add"></i>Tambah User</a>
                    @endcan
                          <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                  </div>
                  <div class="card-block">
                      <div class="table-responsive dt-responsive">
                          <table id="user" class="table table-striped table-bordered nowrap">
                            <thead>
                              <tr>
                                <th>Avatar</th>
                                <th>Nama</th>
                                <th>Jenis User</th>
                                <th>Status</th>

                                <th>Dibuat Pada</th>

                                <th>#</th>

                              </tr>
                            </thead>

                            <tfoot>
                              <tr>
                                <th>Avatar</th>
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
$(document).ready(function() {
  $('#user').DataTable({
            'responsive':true,
            'processing': true,
                'serverSide': true,
                'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                'paging': true,
                'pageLength':5,
                'ajax':{
                    url:"{{url('setup/getusers')}}",
                    type:"POST",

                },
                'columns': [
                  {'data': 'avatar', 'name': 'users.avatar'},
                    {'data': 'name', 'name': 'users.name'},
                    {'data': 'nama_jenis_user', 'name': 'jenis_user.nama_jenis_user'},
                    {'data': 'status', 'name': 'users.status'},
                    {'data': 'created_at', 'name': 'users.created_at'},

                    {'data': 'action', 'name': 'action', 'orderable': false}


                ],
                'search': {
                "regex": true
            },

        initComplete: function () {
                    this.api().columns([0,1,2]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val()).draw();
                        });
                    });
                }

        });


});

</script>
@endsection
