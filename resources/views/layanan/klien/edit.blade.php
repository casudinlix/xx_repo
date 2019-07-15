@extends('layouts.master')
@section('title')
  Edit Users
@endsection
@section('costumcss')
<link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

  <link href="{{asset('assets/vendor_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('atas')
  <section class="content-header">
    <h1>
    User Baru
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Setup</a></li>
      <li class="breadcrumb-item active">Edit User</li>
    </ol>
  </section>
@endsection
@section('content')
  <div class="box box-default">
    <div class="box-header with-border">
      <h4 class="box-title">Step wizard with validation</h4>
      <h6 class="box-subtitle">You can us the validation like what we did</h6>

  <ul class="box-controls pull-right">
    <li><a class="box-btn-close" href="#"></a></li>
    <li><a class="box-btn-slide" href="#"></a></li>
    <li><a class="box-btn-fullscreen" href="#"></a></li>
  </ul>
    </div>
    <!-- /.box-header -->
    <div class="box-body wizard-content">
  <form action="{{route('klien-saya.update',[$user->id])}}" class="validation-wizard wizard-circle" method="POST" id="form_user">
    @method('PUT')
    <!-- Step 1 -->
    <h6>Data Diri</h6>
    <section>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wfirstName2"> Nama Lengkap : <span class="danger">*</span> </label>
            <input type="text" class="form-control required" value="{{$user->name}}" name="nama_lengkap" placeholder="Nama Lengkap"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wlastName2"> Gelar Akademik : <span class="danger">*</span> </label>
            <input type="text" class="form-control required" value="{{$profile->gelar}}" name="gelar" placeholder="Ex : Sarjana Komputer, Master Komputer. pisahkan dengan koma jika lebih dari 1"> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wemailAddress2"> Tipe Akun : <span class="danger">*</span> </label>
            <select class="form-control required select2" name="jenis_akun">
              <option value="">--</option>
              <option value="Perseorangan" {{($profile->jenis=="Perseorangan")?"selected":""}}>Perseorangan</option>
              <option value="Badan Hukum / Badan usaha" {{($profile->jenis=="Badan Hukum / Badan usaha")?"selected":""}}>Badan Hukum / Badan usaha</option>
            </select>
             </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wphoneNumber2">Telpon :</label>
            <input type="tel" class="form-control required" value="{{$profile->telpon}}" name="telpon" onkeypress="return angka(event)"> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wlocation2"> Tempat Lahir : <span class="danger">*</span> </label>
          <select class="form-control select2 required" name="tempat_lahir" data-placeholder="Pilih" data-allow-clear="true">
            <option></option>
            @foreach (\Indonesia::allcities() as $key)
              <option value="{{$key->name}}" {{($profile->tempat_lahir==$key->name)?"selected":""}}>{{$key->name}}</option>
            @endforeach

          </select>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wdate2">Tanggal Lahir :</label>
            <input type="text" class="form-control date-picker" id="wdate2" name="tgl_lahir" data-date-format="yyyy-mm-dd" data-date-viewmode="years" readonly value="{{$profile->tgl_lahir}}"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wdate2">Jenis Identitas :</label>
            <select class="form-control required select2" name="jenis_identitas">
              <option value="">--</option>
              <option value="KTP" {{($profile->jenis_identitas=="KTP")?"selected":""}}>KTP</option>
              <option value="Passport" {{($profile->jenis_identitas=="Passport")?"selected":""}}>Passport</option>
            </select>
             </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wdate2">Nomor Identitas :</label>
            <input type="text" class="form-control required" name="no_identitas" onkeypress="return angka(event)" maxlength="16" value="{{$profile->no_identitas}}"> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wdate2">Jenis Kelamin :</label>
            <select class="form-control required select2" name="kelamin">
              <option value="">--</option>
              <option value="Laki-Laki" {{($profile->jenis_kelamin=="Laki-Laki")?"selected":""}}>Laki-Laki</option>
              <option value="Perempuan" {{($profile->jenis_kelamin=="Perempuan")?"selected":""}}>Perempuan</option>
            </select>
             </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="wdate2">Nomor NPWP :</label>
            <input type="text" class="form-control required" name="no_npwp" onkeypress="return angka(event)" value="{{$profile->no_npwp}}"> </div>
        </div>
      </div>
    </section>
    <!-- Step 2 -->
    <h6>Informasi & Tempat Tinggal</h6>
    <section>
      <div class="row">

        <div class="col-md-12">
          <div class="form-group">
            <label for="shortDescription3">Alamat Rumah :</label>
            <textarea name="alamat_rumah" id="shortDescription3" rows="6" class="form-control">{{$profile->alamat_rumah}}</textarea>
            <span>*</span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="shortDescription3">Alamat Kantor :</label>
            <textarea name="alamat_kantor" id="shortDescription3" rows="6" class="form-control">{{$profile->alamat_kantor}}</textarea>
            <span>* Wajib di isi Untuk informasi Notaris</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="webUrl3">Provinsi :</label>
            <select class="form-control required select2" name="prov" id="prov" data-placeholder="Pilih" data-allow-clear="true">
              <option></option>
              @foreach (\Indonesia::allProvinces() as $key)
                <option value="{{$key->id}}" {{($profile->provinces_id==$key->id)?"selected":""}}>{{$key->name}}</option>
              @endforeach
            </select>

             </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="webUrl3">Kota / Kab :</label>
            <select class="form-control select2 required" name="kab" id="kab" data-placeholder="Pilih" data-allow-clear="true">
              <option value="{{$profile->cities_id}}">{{$profile1->nama_kab}}</option>
            </select> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="webUrl3">Kecamatan :</label>
            <select class="form-control select2 required" name="kec" id="kec" data-placeholder="Pilih" data-allow-clear="true">
<option value="{{$profile->districts_id}}">{{$profile1->nama_kec}}</option>
            </select> </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="webUrl3">Kelurahan :</label>
            <select class="form-control select2 required" name="kel" id="kel" data-placeholder="Pilih" data-allow-clear="true">
<option value="{{$profile->villages_id}}">{{$profile1->nama_kel}}</option>
            </select> </div>
        </div>
      </div>
      @csrf
    </section>
    <!-- Step 3 -->
    <h6>Pendidikan & Legal</h6>
    <section>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wint1">Nomor SK Pengangkatan:</label>
            <input type="text" class="form-control" value="{{$profile->no_sk}}" name="no_sk">
            <span>* Wajib Di isi Jika Akun Notaris / PPAT</span>
           </div>
          <div class="form-group">
            <label for="wintType1">Jabatan :</label>
            <select class="custom-select form-control select2" id="wintType1" data-placeholder="Type to search cities" name="jabatan">
              <option value="">--</option>
              <option value="Notaris" {{($profile->jabatan=="Notaris")?"selected":""}}>Notaris</option>
              <option value="PPAT" {{($profile->jabatan=="PPAT")?"selected":""}}>PPAT</option>
              <option value="Notaris & PPAT" {{($profile->jabatan=="Notaris & PPAT")?"selected":""}}>Notaris & PPAT</option>

            </select>
          </div>
          <div class="form-group">
            <label for="wLocation1">Jenis Ijazah :</label>
            <select class="custom-select form-control select2" id="wLocation1" name="jenis_ijazah">
              <option value="">--</option>
              <option value="CN" {{($profile->jenis_ijazah=="CN")?"selected":""}}>CN</option>
              <option value="SPN" {{($profile->jenis_ijazah=="SPN")?"selected":""}}>SPN</option>
              <option value="MKN" {{($profile->jenis_ijazah=="MKN")?"selected":""}}>MKN</option>
            </select>
            <span>* Wajib di Isi Jika Notaris</span>
          </div>
        </div>

      </div>
    </section>
    <!-- Step 4 -->
    <h6>Akun</h6>
    <section>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="behName3">Email :</label>
            <input type="email" class="form-control required" value="{{$user->email}}" name="email">
          </div>
          <div class="form-group">
            <label for="participants3">username</label>
            <input type="text" class="form-control required" id="username" name="username" value="{{$user->username}}">
          </div>
          <div class="form-group">
            <label for="participants3">Jenis User</label>
            <select class="form-control required select2" name="jenis_user">
              <option value="">--</option>
              @foreach ($jenis as $key)
                <option value="{{$key->id}}" {{($profile->jenis_user_id==$key->id)?"selected":""}}>{{$key->nama_jenis_user}}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="col-md-6">
          {{-- <div class="form-group">
  							Password  <span class="text-danger">*</span>
  							<div class="controls">
  								<input type="password" name="password" class="form-control required" min="5"> </div>
  						</div> --}}
              <div class="form-group">
              							Paket<span class="text-danger">*</span>
              							<div class="controls">
              								<select class="form-control select2 required" name="role">

                                @foreach ($role as $key)
                                    <option value="{{$key->name}}" {{($key->name==$roles2)?"selected":""}}>{{$key->name}}</option>
                                @endforeach

                              </select>
                            </div>
              						</div>

                          <div class="form-group">
                                        Status Aktiv ?<span class="text-danger">*</span>
                                        <div class="controls">
                                          <select class="form-control required select2" name="status">
                                            <option value=""></option>
                                            <option value="1" {{($user->status=="1")?"selected":""}}>Ya</option>
                                            <option value="0" {{($user->status=="0")?"selected":""}}>Tidak</option>


                                          </select>

                                        </div>
                                      </div>
        </div>
      </div>
    </section>
  </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection

@section('costumjs')

<script src="{{asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/jquery-steps-master/build/jquery.steps.js')}}"></script>

 <!-- validate  -->
  <script src="{{asset('assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<!-- Sweet-Alert  -->
  <script src="{{asset('assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
$("#password2").keyup(function(event) {
  if ($("#Password1").val() != $("#password2").val()) {
   $("#divCheckPasswordMatch").html("Password do not match").css("color","red");
   }else{
   $("#divCheckPasswordMatch").html("Password matched").css("color","green");
   }
});
});
$(function () {
    "use strict";

    $('.select2').select2();
    $('.date-picker').datepicker({
        autoclose: true
    });
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


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
      swal({
        title: "Apa Anda Yakin?",
        text: "Silahkan cek kembali data yang anda input dan pastikan semua benar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Perbarui!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: '{{route('klien-saya.update',[$user->id])}}',
            type: 'POST',
            data: $("#form_user").serialize(),
            success:function(){
              swal("Data Disimpan!", "Data Berhasil Disimpan.", "success");
              window.location.href= "{{route('users.index')}}";
            },
            error:function(){
                swal("Error", "Terjadi Kesalahan", "error");
            }
          })



        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
})
</script>
@endsection
