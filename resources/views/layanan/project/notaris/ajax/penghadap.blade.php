
<div class="col-md-12">
    <!-- Simple card start -->
    <div class="card simple-cards">
        <div class="card-header">
            <button class="btn btn-info bt-sm" data-toggle="modal" data-target="#modal-center"><i class="ti-plus" ></i>Tambah</button>

        </div>
        <div class="card-block">
            <div class="row users-card">
                @foreach ($data as $key)


                <div class="col-lg-12 col-xl-4">
                    <div class="card user-card">
                        <div class="card-header-img">
                            <img class="img-fluid img-circle" src="{{asset('assets/images/avatar-3.png')}}" alt="card-img">
                        <h5>{{$key->title}} {{$key->nama_lengkap}}</h5>
                        <h5>{{$key->jenis_penghadap}}</h5>
                        </div>

                        <p>Lahir di {{$key->tempat_lahir}}, Pada {{tgl_akta($key->tgl_lahir)}} ,   <br/>
                        Alamat
                          {{$key->alamat_lengkap}} . Provinsi {{$data1->prov}}. {{$data1->kab}}. Kecamatan {{$data1->kec}}. Kelurahan {{$data1->kel}}, Warga Negara {{$key->kewarganegaraan}}.<br/>
                          Nomor {{$key->jenis_identitas}} : {{$key->no_identitas}}, <br/></p>
                        <div>
                          <a class="btn btn-primary btn-outline-primary btn-sm waves-effect waves-light m-r-15" href="{{asset('storage/dokumen/'.$project->kode.'/'.$key->file)}}" data-popup="lightbox" data-lightbox="1" data-title="My caption 1"><i class="ti-file"></i>Lampiran</a>
                          <a class="btn btn-danger btn-outline-danger btn-sm waves-effect waves-light"  onclick="hapus({{$key->id}})"><i class="ti-trash"></i></a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end of row -->
        </div>

<!-- Modal -->
<div class="modal fade" id="modal-center" tabindex="-1">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Tambah Penghadap</h5>
    <button type="button" class="close" data-dismiss="modal">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <form action="{{route('store.penghadap')}}"  method="POST" enctype="multipart/form-data">
    <div class="modal-body">

         @csrf
    <div class="form-group">
      <label for="">Jenis Penghadap</label>
      <select class="form-control select2" name="jenis" id="jenis" required onchange="if (this.value=='Badan Hukum'){this.form['nama_perusahaan'].style.visibility='visible'}else {this.form['nama_perusahaan'].style.visibility='hidden'};">
        <option value=""></option>
        <option value="Perorangan">Perorangan</option>
        <option value="Badan Hukum">Badan Hukum</option>
      </select>
    </div>
    <div class="form-group" style="visibility:hidden;" id="nama_perusahaan">
      <label for="">Nama Perusahaan</label>
      <input type="text" class="form-control"  name="nama_perusahaan" placeholder="nama perusahaan">

    </div>
    <div class="form-group">
      <label for="">Title</label>
      <select name="title" class="form-control select2" required>
          <option value=""></option>
          <option value="Tuan">Tuan</option>
          <option value="Nona">Nona</option>
          <option value="Nyonya">Nyonya</option>

      </select>

    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
        <input type="text" class="form-control" name="nama" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Tempat Lahir:</label>
        <select class="form-control select2" name="tempat_lahir" required>
          <option value=""></option>
          @foreach (\Indonesia::allcities() as $key)
            <option value="{{$key->name}}">{{$key->name}}</option>

          @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
        <input type="text" class="form-control date" name="tgl_lahir" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">kewarganegaraan:</label>
        <select class="form-control select2" name="kewarganegaraan">
          <option value=""></option>
          <option value="Indonesia">Indonesia</option>
          <option value="Asing">Asing</option>
        </select>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Pekerjaan:</label>
        <select class="form-control select2" name="pekerjaan">
          <option value=""></option>
          <option value="Pegawai Negeri">Pegawai Negeri</option>
          <option value="Pegawai Swasta">Pegawai Swasta</option>
        </select>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Alamat Lengkap:</label>
        <textarea class="form-control" name="alamat" placeholder="Jalan RT RW Kab Kec Kel"></textarea>
    </div>
    <div class="form-group">
        <label>Provinsi</label>
        <select class="form-control select2" name="prov" required="true" id="prov">
            <option></option>
            @foreach (\Indonesia::allProvinces() as $key )
                <option value="{{$key->id}}">{{$key->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Kab / Kota</label>
        <select class="form-control select2" name="kab" required="true" id="kab">
            <option></option>
        </select>
    </div>
    <div class="form-group">
        <label>Kecamatan</label>
        <select class="form-control select2" name="kec" required="true" id="kec">
          <option></option>
        </select>
    </div>
    <div class="form-group">
        <label>Kelurahan</label>
        <select class="form-control select2" name="kel" required="true" id='kel'>
          <option></option>
        </select>
    </div>
    <div class="form-group">
        <label>Jenis Identitas</label>
        <select class="form-control form-control-success select2" name="jenis_identitas" required="true">
          <option></option>
          <option value="KTP">KTP</option>
          <option value="Passport">Passport</option>
          <option value="NPWP">NPWP</option>
          <option value="KK">KK</option>
        </select>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Nomor Identitas:</label>
        <input type="text" class="form-control" name="no_identitas" autocomplete="off" required maxlength="16" minlength="16" onkeypress="return angka(event)">
    </div>
    <div class="form-group">
      <label for="">Upload Dokumen</label>
      <input type="file" name="gambar" class="form-control"  placeholder="" required>
      <p class="help-block">Hanya Format PDF, JPG, JPEG, PNG. Max 2MB</p>

      <input type="hidden" name="project_id" value="{{ Request::segment(3) }}">
      <input type="hidden" name="kode" value="{{$project->kode}}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Tanggal Persetujuan:</label>
        <input type="text" class="form-control date"  name="tgl_persetujuan" autocomplete="off" required>
    </div>
    </div>
    <div class="modal-footer modal-footer-uniform">
    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-bold btn-pure btn-primary float-right" value="Simpan">
    </div>

  </div>
  </div>
  </form>
</div>
<!-- /.modal -->

<script type="text/javascript">
function hapus($id){
  var id=$id;
  var token=$('meta[name="csrf-token"]').attr('content');
  var kode='{{$project->kode}}';
  var konfirmasi=confirm("Data Di hapus?"+id)
  if (konfirmasi==true) {
    $.ajax({
      url: '{{ route('delete.penghadap') }}',
      type: 'POST',
      data:{'_token':token,'id':id,'kode':kode},
      success:function(JSON){
        location.reload();
        //console.log(JSON)
      },
      error:function (data){
        alert("ERROR!")
        //location.reload();
      }
    });


  }
}
"use strict";
  $(document).ready(function() {
    // $('.date-picker').datepicker({
    //     autoclose: true,
    //     todayBtn: "linked",
    //
    //     format: 'd-m-Y',
    // });
    // $('.date').daterangepicker({
    //           singleDatePicker: true,
    //           showDropdowns: true,
    //           format: 'd-m-Y',
    //       });

    $(function() {
      $('.date').datepicker({
      dateFormat:'yy-mm-dd',
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      setDate: new Date(),
      yearRange: "1930:2069",
      showButtonPanel:true,

      })

    });
    //$('.select2').select2();
      $("#prov").change(function(event) {
        var id_prov=$("#prov").val();

        var id_kec=$('#kec').val();

        $.ajax({
        url: '{{url('data/json_kota')}}/'+id_prov,
        type: 'get',
        dataType: 'json',
        cache:false,
        async: true,
          success:function(data){
            $('select[name="kab"]').empty();



          $.each(data, function(key, value) {

          //  console.log(value.id_kab);
           $('select[name="kab"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');

          });
          $("#kab").change(function(event) {
            var id_kab=$(this).val();

           $.ajax({
             url: '{{url('data/json_kecamatan')}}/'+id_kab,
             type: 'GET',
             dataType: 'json',
             success:function(data){
               //console.log(data);
               $('select[name="kec"]').empty();

               $.each(data,function(key,value){
                 //console.log(value);
                 $('select[name="kec"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
               });
               $("#kec").change(function(event) {
                 /* Act on the event */
                 var id_kec=$(this).val();
                 $.ajax({
                   url: '{{url('data/json_kelurahan')}}/'+id_kec,
                   type: 'GET',
                   dataType: 'json',
                   success:function(data){
                     $('select[name="kel"]').empty();
                     $.each(data,function(key,value){
                       //console.log(value);
                       $('select[name="kel"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                     });
                   }
                 })



               });

             }

           })
            //console.log(id_kab);
          });
          //console.log(data);
        }

      });

      });
  });
  $(function () {
      "use strict";

    })
</script>
