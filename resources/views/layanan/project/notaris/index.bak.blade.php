
@extends('layouts.master')
@section('title')
  Project Notaris
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
          <h4>Project List</h4>
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
              <li class="breadcrumb-item"><a href="#!">Project Notaris</a>
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
                    @can ('tambah project notaris')
                      <a class="btn btn-success btn-outline-success btn-rounded" data-target="#tambah" data-toggle="modal"><i class="ion-navigate"></i>Tambah project</a>
                    @endcan

                          <div class="card-header-right">
                          <i class="icofont icofont-rounded-down"></i>
                          <i class="icofont icofont-refresh"></i>
                          <i class="icofont icofont-close-circled"></i>
                      </div>
                  </div>
                  <div class="card-block">
                      <div class="table-responsive dt-responsive">
                          <table id="project" class="table table-striped table-bordered nowrap">
                            <thead>
                              <tr>
                                <th>No</th>
                              <th>Kode</th>
                              <th>Klien</th>
                              <th>Tipe Project</th>
                              <th>Pekerjaan</th>
                              <th>Status</th>
                              <th>Note</th>
                              <th>Dibuat</th>
                              <th>*</th>

                              </tr>
                            </thead>

                            <tfoot>
                              <tr>
                                <th>No</th>
                              <th>Kode</th>
                              <th>Klien</th>
                              <th>Tipe Project</th>
                              <th>Pekerjaan</th>
                              <th>Status</th>
                              <th>Note</th>
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

          <!-- Modal -->
         <div class="modal modal-right fade" id="tambah" tabindex="-1">
           <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title">Buat Project Baru</h5>
             <button type="button" class="close" data-dismiss="modal">
               <span aria-hidden="true">&times;</span>
             </button>
             </div>
             <div class="modal-body">
             <form class="" action="{{route('project-notaris.store')}}" method="post">
               <div class="form-group">
                 <label for="">Klien</label>
                <select class="form-control select2" name="klien" data-placeholder="Pilih" data-allow-clear="true" required>
                  <option value=""></option>
                 @foreach ($user as $key )
                   <option value="{{$key->id}}">{{$key->name}}</option>
                 @endforeach

                </select>

               </div>
               <div class="form-group">
                 <label for="">Tipe Project</label>
                 <select class="form-control" name="project_type" required>
                   <option value="">--</option>
                   <option value="Perseorangan">Perseorangan</option>
                   <option value="Badan Hukum / Usaha">Badan Hukum / Usaha</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="">Project</label>
                 <select class="form-control" name="jenis_akta_id" required>
                   <option value="">--</option>
                  @foreach ($jenis as $key )
                    <option value="{{$key->id}}">{{$key->nama_jenis_akta}}</option>
                  @endforeach
                 </select>
               </div>
               <div class="form-group">
                 <label for="">Total Lembar Saham Tersedia</label>
                 <input type="text" class="form-control" name="total_lembar_saham" onkeypress="return angka(event)" placeholder="">

               </div>
               <div class="form-group">
                 <label for="">Nilai Saham</label>
                 <input type="text" class="form-control" name="nilai_lembar_saham" placeholder="" onkeypress="return angka(event)">
                 <p class="help-block">Nilai Perlembar Saham.</p>
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

  $('#project').DataTable({
            responsive:false,
            processing: true,
                serverSide: true,
                lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                paging: true,
                pageLength:5,
                ajax:{
                    url:"{{route('project.list')}}",
                    type:"POST",

                },
                fnCreatedRow: function (row, data, index) {
            			$('td', row).eq(0).html(index + 1);

                },
                columns: [
                    {data: 'id', name: 'project.id'},
                    {data: 'kode', name: 'project.kode'},
                    {data: 'name', name: 'users.name'},
                    {data: 'project_type', name: 'project.project_type'},
                    {data: 'nama_jenis_akta', name: 'jenis_akta.nama_jenis_akta'},
                    {data: 'status', name: 'project.status'},
                    {data: 'reason', name: 'project.reason'},
                    {data: 'created_at', name: 'project.created_at'},
                    {data: 'action', name: 'action', orderable: false}


                ],
                search: {
                "regex": true
            },

        initComplete: function () {
                    this.api().columns([1,2,3,4,5,6,7]).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val()).draw();
                        });
                    });
                }

        });

  $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever') // Extract info from data-* attributes
        var klien=button.data('klien')
        var guard=button.data('guard')
        var project_type=button.data('project_type')
        var jenis_akta_id=button.data('jenis_akta_id')
        var status=button.data('status')
          var reason=button.data('reason')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Edit Project ' + id)
        modal.find('#id').val(id)
        modal.find('select[name="klien"]').append('<option value="'+ klien +'" selected>'+ klien +'</option>')
        modal.find('select[name="project_type"]').append('<option value="'+ project_type +'" selected>'+ project_type +'</option>')
        modal.find('select[name="jenis_akta_id"]').append('<option value="'+ jenis_akta_id +'" selected>'+ jenis_akta_id +'</option>')
        modal.find('select[name="status"]').append('<option value="'+ status +'" selected>'+ status +'</option>')
        modal.find('#reason').val(reason)

        })
  </script>
@endsection
