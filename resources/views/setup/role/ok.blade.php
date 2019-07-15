
@extends('layouts.master')
@section('title')
  Role
@endsection
@section('costumcss')
  <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css')}}">

  <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }

      .example-modal .modal {
        background: transparent !important;
      }
    </style>
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
              <li class="breadcrumb-item"><a href="#!">Role</a>
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
                        <a class="btn btn-success btn-outline-success btn-rounded" data-target="#tambah" data-toggle="modal">Tambah Role</a>
                          <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                  </div>
                  <div class="card-block">
                      <div class="table-responsive dt-responsive">
                          <table id="role" class="table table-striped table-bordered nowrap">
                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Guard</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diperbarui</th>
                                    <th>#</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Guard</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diperbarui</th>
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

  <!-- Modal -->
         <div class="modal modal-right fade" id="tambah" tabindex="-1">
           <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title">Tambah Role</h5>
             <button type="button" class="close" data-dismiss="modal">
               <span aria-hidden="true">&times;</span>
             </button>
             </div>
             <div class="modal-body">
             <form class="" action="{{route('role.store')}}" method="post">
               <div class="form-group">
                 <label for="">Nama</label>
                 <input type="text" class="form-control" id="" placeholder="" name="name" required>
                 <p class="help-block">Help text here.</p>
               </div>
               <div class="form-group">
                 <label for="">Guard</label>
                 <input type="text" class="form-control" id="" placeholder="" name="guard_name">
                 <p class="help-block">Help text here.</p>
               </div>
             </div>
             <div class="modal-footer modal-footer-uniform">
             <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
             <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button>
             </div>
             @csrf
              </form>
           </div>
           </div>
         </div>
         <!-- /.modal -->
         <!-- Modal -->
                <div class="modal modal-left fade" id="editpermission" tabindex="-1">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Tambah Permisson</h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form class="" action="{{url('setup/update_role')}}" method="post">
                      @method('PUT')
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="nama" placeholder="" name="name" required>
                        <p class="help-block">Help text here.</p>
                      </div>
                      <div class="form-group">
                        <label for="">Guard</label>
                        <input type="text" class="form-control" id="guard" placeholder="" name="guard_name">
                        <p class="help-block">Help text here.</p>
                      </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button>
                    </div>
                    @csrf
                     </form>
                  </div>
                  </div>
                </div>
                <!-- /.modal -->
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
  $('#role').DataTable({
            'responsive':false,
            'processing': true,
                'serverSide': true,
                'lengthMenu': [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                'paging': true,
                'pageLength':5,
                'ajax':{
                    url:"{{url('setup/getrole')}}",
                    type:"POST",

                },
                'columns': [
                    { 'data': 'DT_RowIndex', 'name': 'DT_RowIndex' },
                    {'data': 'name', 'name': 'name'},
                    {'data': 'guard_name', 'name': 'guard_name'},
                    {'data': 'created_at', 'name': 'created_at'},
                    {'data': 'updated_at', 'name': 'updated_at'},
                    {'data': 'action', 'name': 'action', 'orderable': false}


                ],
                'search': {
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
      //   $('#permission tfoot th').each( function () {
      //     var title = $(this).text();
      //     $(this).html( '<input type="text" placeholder="Cari '+title+'" />' );
      // } );
    $('#editpermission').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('whatever') // Extract info from data-* attributes
    var nama=button.data('name')
    var guard=button.data('guard')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Edit Role ' + id)
    modal.find('#id').val(id)
    modal.find('#nama').val(nama)
    modal.find('#guard').val(guard)

  })
});

  </script>
@endsection
