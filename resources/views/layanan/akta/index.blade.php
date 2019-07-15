@extends('layouts.master')
@section('title')
  Akta
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
          <h4> Akta</h4>
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
              <li class="breadcrumb-item"><a href="#!">Akta</a>
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
                    <a class="btn btn-success btn-outline-success btn-rounded" href="{{route('aktaku.create')}}"><i class="ti-files"></i> Generate Akta</a>
                    <a class="btn btn-success btn-outline-danger btn-rounded" href="{{ url()->previous() }}"><i class="ti-back-right"></i></i> Kembali</a>


                          <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                      <div class="modal fade" id="aktaa" tabindex="-1">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Akta</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body p-b-0">
                                      <form action="{{route('aktaku.store')}}" method="post">
                                        <div class="form-group">
                                          <label for="">Project</label>
                                          <select class="form-control" name="project" required id="project">
                                            <option value=""></option>
                                            @foreach ($project as $key)
                                              <option value="{{$key->id}}">{{$key->kode}}</option>
                                            @endforeach
                                          </select>
                                          <input type="text" id="users_id">
                                          <input type="text" id="project_id">
                                          <input type="text" id="jenis_akta_id">

                                        </div>
                                        <div class="form-group">
                                          <label for="">Klien</label>
                                          <input type="text" class="form-control" name="klien" required id="klien">

                                        </div>
                                        <div class="form-group">
                                          <label for="">Jenis Akta</label>
                                          <input type="text" class="form-control" name="jenis" required id="jenis">

                                        </div>
                                        <div class="form-group">
                                          <label for="">Pilih Tamplate Akta</label>
                                          <select class="form-control" name="akta" id='tamplate'>
                                            <option value=""></option>
                                            @foreach ($akta as $key)
                                              <option value="{{$key->id}}">{{$key->nama_akta}}</option>
                                            @endforeach
                                          </select>

                                        </div>

                                  </div>
                                  <div class="modal-footer">
                                    @csrf
                                      <button type="submit" class="btn btn-primary">Sign In</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-block">
                      <div class="table-responsive dt-responsive">
                        <table id="akta" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                          <tr>

                              <th>No</th>
                              <th>Nomor Akta</th>
                            <th>Jenis Akta</th>
                            <th>Klien</th>
                            <th>Dibuat</th>
                            <th>*</th>

                          </tr>
                        </thead>

                        <tfoot>
                          <tr>

                            <th>No</th>
                            <th>Nomor Akta</th>
                          <th>Jenis Akta</th>
                          <th>Klien</th>
                          <th>Dibuat</th>
                          <th>*</th>

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
  <script type="text/javascript" src="{{asset('assets/pages/sparkline/jquery.sparkline.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
$('#project').change(function(event) {
  $.ajax({
  url: '{{url('pengajuan/get_pro')}}/'+$(this).val(),
  type: 'get',
  dataType: 'JSON',
  data: {id: $(this).val()},
  success:function(data){
    $('#users_id').val(data.users_id);
    $('#project_id').val(data.id);
    $('#jenis_akta_id').val(data.jenis_akta_id);
    $('#jenis').val(data.nama_jenis_akta);
    $('#klien').val(data.name);


  }
});

});
$('#akta').DataTable({
          responsive:false,
          processing: true,
              serverSide: true,
              lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
              paging: true,
              pageLength:5,
              ajax:{
                  url:"{{route('aktaku.list')}}",
                  type:"POST",

              },
              fnCreatedRow: function (row, data, index) {
                $('td', row).eq(0).html(index + 1);

              },
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'no_akta', name: 'project_akta.no_akta'},
                  {data: 'nama_jenis_akta', name: 'jenis_akta.nama_jenis_akta'},
                  {data: 'name', name: 'users.name'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action', orderable: false}


              ],
              search: {
              "regex": true
          },

      initComplete: function () {
                  this.api().columns([1,2,3]).every(function () {
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
</script>
@endsection
