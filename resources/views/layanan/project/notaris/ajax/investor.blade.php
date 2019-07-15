<div class="row">

</div>
<div class="col-12">
  <div class="box">
    <div class="box-header">
      <h5 class="box-title btn-xs" data-target="#tambah" data-toggle="collapse"><span class="ti-plus">Tambah</span></h5>
      <div class="box-controls pull-right">
        <div class="collapse multi-collapse" id="tambah">
              <div class="card card-body">
                <form action="{{route('store.investor')}}"  method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                     @csrf
                <div class="form-group">
                  <label for="">Jenis Investor</label>
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
                    <input type="text" class="form-control date" readonly name="tgl_lahir" autocomplete="off" required>
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
                    <select class="form-control select2" name="prov" required="true" id="prov3">
                        <option></option>
                        @foreach (\Indonesia::allProvinces() as $key )
                            <option value="{{$key->id}}">{{$key->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kab / Kota</label>
                    <select class="form-control select2" name="kab" required="true" id="kab3">
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2" name="kec" required="true" id="kec3">
                      <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelurahan</label>
                    <select class="form-control select2" name="kel" required="true" id='kel3'>
                      <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Identitas</label>
                    <select class="form-control select2" name="jenis_identitas" required="true">
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
                  <label for="recipient-name" class="col-form-label">Total Lembar Saham:</label>
                    <input type="text" class="form-control" name="total_lembar_saham" autocomplete="off" required  onkeypress="return angka(event)">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Total Modal:</label>
                    <input type="text" class="form-control" name="total_modal" autocomplete="off" required  onkeypress="return angka(event)">
                </div>
                <div class="form-group">
                  <label for="">Upload Dokumen</label>
                  <input type="file" name="gambar" class="form-control"  placeholder="" required>
                  <p class="help-block">Hanya Format PDF, JPG, JPEG, PNG. Max 2MB</p>

                  <input type="hidden" name="project_id" value="{{$project->id}}">
                  <input type="hidden" name="kode" value="{{$project->kode}}">
                </div>

                </div>
                <div class="modal-footer modal-footer-uniform">
                <input type="submit" class="btn btn-bold btn-pure btn-primary float-right" value="Simpan">
                </div>

                </div>
                </div>
                </form>
              </div>
            </div>
</div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
<div class="table-responsive">
  <table class="table table-hover">
  <tr>
    <th>No</th>
    <th>Jenis</th>
    <th>Nama Lengkap</th>
    <th>Total Lembar Saham</th>
    <th>Nilai Saham</th>
    <th>Total Modal</th>
    <th>Total Modal Disetor</th>
    <th>Persentase</th>
    <th>#</th>
  </tr>
  @php $no=1;  @endphp
  @foreach ($data as $key)
<tr>
  <td>{{$no++}}</td>
<td>{{$key->jenis}}</td>
<td>{{$key->title.' '.$key->nama_lengkap}}</td>
<td>{{$key->total_lembar_saham}}</td>
<td>Rp. {{{number_format($key->nilai_saham)}}}</td>
<td>Rp. {{number_format($key->total_modal)}}</td>
<td>Rp. {{number_format($key->total_modal_ditempatkan)}}</td>
<td>{{$key->persentase}} %</td>
<td> <button type="button" name="button" class="btn-xs btn-danger"><span class="ti-trash" onclick="hapus({{$key->id}})"></span></button> </td>
  @endforeach
  </tr>
  </table>
</div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<script type="text/javascript">
function hapus($id){
  var id=$id;
  var token=$('meta[name="csrf-token"]').attr('content');
  var kode='{{$project->kode}}';
  var project_id='{{$project->id}}';
  var konfirmasi=confirm("Data Di hapus?"+id+kode)
  if (konfirmasi==true) {
    $.ajax({
      url: '{{ route('delete.investor') }}',
      type: 'POST',
      data:{'_token':token,'id':id,'kode':kode,'project_id':project_id},
      success:function(data){
        location.reload();
      },
      error:function (data){
        alert("ERROR!")
        location.reload();
      }
    });


  } else {

  }
}
  $(document).ready(function() {
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

    $('.select2').select2();

      $("#prov3").change(function(event) {
        var id_prov=$("#prov3").val();

        var id_kec=$('#kec3').val();

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
          $("#kab3").change(function(event) {
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
               $("#kec3").change(function(event) {
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
</script>
