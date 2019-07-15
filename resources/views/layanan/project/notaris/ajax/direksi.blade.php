<div class="col-md-12">
  <div class="card simple-cards">
      <div class="card-header">


   <div class="col-12">
      <button class="btn btn-info" data-toggle="collapse" data-target="#tes"><i class="ti-plus" ></i>Tambah</button>

   </div>
   <div class="card-block">
       <div class="row users-card">
         <div class="collapse multi-collapse col-12" id="tes">
            <div class="card card-body">
              <form action="{{route('store.direksi')}}"  method="POST" enctype="multipart/form-data" class="form-control">
              <div class="modal-body">

                   @csrf
              <div class="form-group">
                <label for="">Jabatan</label>
                <select class="form-control select2" name="jabatan" id="jabatan" required>
                  <option value=""></option>
                  @foreach ($jabatan as $key)
                    <option value="{{$key->nama_jabatan}}">{{$key->nama_jabatan}}</option>

                  @endforeach
                </select>
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
                  <input type="text" class="form-control date"  name="tgl_lahir" autocomplete="off" required>
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
                <label for="recipient-name" class="col-form-label">Alamat Lengkap:</label>
                  <textarea class="form-control" name="alamat" placeholder="Jalan RT RW Kab Kec Kel"></textarea>
              </div>
              <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control select2" name="prov" required="true" id="prov1">
                      <option></option>
                      @foreach (\Indonesia::allProvinces() as $key )
                          <option value="{{$key->id}}">{{$key->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Kab / Kota</label>
                  <select class="form-control select2" name="kab" required="true" id="kab1">
                      <option></option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control select2" name="kec" required="true" id="kec1">
                    <option></option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Kelurahan</label>
                  <select class="form-control select2" name="kel" required="true" id='kel1'>
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
                <label for="">Upload Dokumen</label>
                <input type="file" name="gambar" class="form-control"  placeholder="" required>
                <p class="help-block">Hanya Format PDF, JPG, JPEG, PNG. Max 2MB</p>

                <input type="hidden" name="project_id" value="{{$project->id}}">
                <input type="hidden" name="kode" value="{{$project->kode}}">
              </div>
              {{-- <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tanggal Persetujuan:</label>
                  <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years" readonly name="tgl_persetujuan" autocomplete="off" required>
              </div> --}}
              </div>
              <div class="modal-footer modal-footer-uniform">
               <input type="submit" class="btn btn-bold btn-pure btn-primary float-right" value="Simpan">
              </div>

              </div>
              </div>
              </form>
                  </div>
          </div>
         @foreach ($data as $key)


         <div class="col-lg-12 col-xl-4">
             <div class="card user-card">
                 <div class="card-header-img">
                     <img class="img-fluid img-circle" src="{{asset('assets/images/avatar-3.png')}}" alt="card-img">
                 <h5>{{$key->title}} {{$key->nama_lengkap}}</h5>
                 <h5>{{$key->jabatan}}</h5>
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
     </div>
 </div>
 </div>
 </div>




<script type="text/javascript">
function hapus($id){
  var id=$id;
  var token=$('meta[name="csrf-token"]').attr('content');
  var kode='{{$project->kode}}';
  var konfirmasi=confirm("Data Di hapus?"+id)
  if (konfirmasi==true) {
    $.ajax({
      url: '{{ route('delete.direksi') }}',
      type: 'POST',
      data:{'_token':token,'id':id,'kode':kode},
      success:function(data){
        location.reload();
      },
      error:function (data){
        alert("ERROR!")
        location.reload();
      }
    });


  } else {
    alert("NO")
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
    $('.select2').select2({

    });
      $("#prov1").change(function(event) {
        var id_prov=$("#prov1").val();

        var id_kec=$('#kec1').val();

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
          $("#kab1").change(function(event) {
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
               $("#kec1").change(function(event) {
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
