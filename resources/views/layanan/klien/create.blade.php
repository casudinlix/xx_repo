@extends('layouts.master')
@section('title')
Tambah Klien
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
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('bower_components/jquery.steps/demo/css/jquery.steps.css')}}">
<style type="text/css">
    .fieldset-auto-width {
         display: inline-block;
         overflow:auto;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/sweetalert/dist/sweetalert.css')}}">

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Tambah Klien</h4>
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
              <li class="breadcrumb-item"><a href="#!">Tambah Klien</a>
              </li>
          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="card">
      <div class="card-header">
          <h5>Form Tambah Klien</h5>

          <div class="card-header-right">
              <i class="icofont icofont-rounded-down"></i>
              <i class="icofont icofont-refresh"></i>
              <i class="icofont icofont-close-circled"></i>
          </div>
      </div>
      <div class="card-block">
          <div class="row">
              <div class="col-md-12">
                  <div id="wizard">
                      <section>
                          <form class="wizard-form" id="example-advanced-form"  method="POST">
                              <h3> Akun </h3>
                              <fieldset class="fieldset-auto-width">
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="userName-2" class="block">Username *</label>
                                      </div>
                                      @csrf
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="userName-2" name="username" type="text" class="required form-control">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="email-2" class="block">Email *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="email-2" name="email" type="email" class="required form-control">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="password-2" class="block">Password *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="password-2" name="password" type="password" class="form-control required" >
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="confirm-2" class="block">Confirm Password *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="confirm-2" name="password2" type="password" class="form-control required">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="confirm-2" class="block">Jenis Klien *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control required select2" name="jenis_user" data-placeholder="Pilih" data-allow-clear="true"
>
                                          <option value="">--</option>
                                          @foreach ($jenis as $key)
                                            <option value="{{$key->id}}">{{$key->nama_jenis_user}}</option>
                                          @endforeach
                                        </select>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="confirm-2" class="block">Paket *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control select2 required" name="role" data-placeholder="Pilih" data-allow-clear="true"
>
                                          <option value="">--</option>
                                          @foreach ($role as $key)
                                              <option value="{{$key->name}}">{{$key->name}}</option>
                                          @endforeach

                                        </select>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="confirm-2" class="block">Status Aktive ? *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control required select2" name="status">
                                          <option value="">--</option>
                                          <option value="True">Ya</option>
                                          <option value="False">Tidak</option>


                                        </select>
                                       </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="confirm-2" class="block">Tipe Akun ? *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control required select2" name="jenis_akun" data-placeholder="Pilih" data-allow-clear="true"
>
                                          <option value="">--</option>
                                          <option value="Perseorangan">Perseorangan</option>
                                          <option value="Badan Hukum / Badan usaha">Badan Hukum / Badan usaha</option>
                                        </select>
                                       </div>
                                  </div>

                              </fieldset>
                              <h3> Data Diri </h3>
                              <fieldset class="fieldset-auto-width">
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="name-2" class="block">Nama Lengkap *</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="name-2" name="nama_lengkap" type="text" class="form-control required">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="surname-2" class="block">Gelar Akademik</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input name="gelar" placeholder="Ex : Sarjana Komputer, Master Komputer. pisahkan dengan koma jika lebih dari 1" type="text" class="form-control required">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="phone-2" class="block">Telpone #</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="phone-2" name="telpon" type="text" class="form-control required phone" onkeypress="return angka(event)">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="date" class="block">Tanggal Lahir</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="date" name="tgl_lahir" type="text" class="form-control required date">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">Tempat Lahir</div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control select2 required" name="tempat_lahir" data-placeholder="Pilih" data-allow-clear="true">
                                          <option>--</option>
                                          @foreach (\Indonesia::allcities() as $key)
                                            <option value="{{$key->name}}">{{$key->name}}</option>
                                          @endforeach

                                        </select>
                                      </div>
                                  </div>


                                <div class="form-group row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label for="confirm-2" class="block">Jenis Identitas*</label>
                                    </div>
                                    <div class="col-sm-8 col-lg-10">
                                      <select class="form-control required select2" name="jenis_identitas" data-placeholder="Pilih" data-allow-clear="true"
>
                                        <option value="">--</option>
                                        <option value="KTP">KTP</option>
                                        <option value="Passport">Passport</option>
                                      </select>
                                     </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-sm-4 col-lg-2">
                                        <label for="date" class="block">Nomor Identitasr</label>
                                    </div>
                                    <div class="col-sm-8 col-lg-10">
                                      <input type="text" class="form-control required" name="no_identitas" onkeypress="return angka(event)" maxlength="16">
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="date" class="block">Jenis Kelamin</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control required select2" name="kelamin" data-placeholder="Pilih">
                                          <option value="">--</option>
                                          <option value="Laki-Laki">Laki-Laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                        </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="col-sm-4 col-lg-2">
                                            <label for="date" class="block">Nomor NPWP</label>
                                        </div>
                                        <div class="col-sm-8 col-lg-10">
                                          <input type="text" class="form-control required" name="no_npwp" onkeypress="return angka(event)">
                                        </div>
                                        </div>

                              </fieldset>
                              <h3> Pendidikan & Legal </h3>
                              <fieldset>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="University-2" class="block">Nomor SK Pengangkatan</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                          <input id="University-2" name="no_sk" type="text" class="form-control">
                                          <span>* Wajib Di isi Jika Akun Notaris / PPAT</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="Country-2" class="block">Jabatan</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="custom-select form-control select2" id="wintType1" data-placeholder="Pilih" name="jabatan">
                                          <option value="">--</option>
                                          <option value="Notaris">Notaris</option>
                                          <option value="PPAT">PPAT</option>
                                          <option value="Notaris & PPAT">Notaris & PPAT</option>

                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="Country-2" class="block">Jenis Ijazah</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="custom-select form-control select2" id="wLocation1" name="jenis_ijazah" data-placeholder="Pilih" data-allow-clear="true">
                                          <option value="">--</option>
                                          <option value="CN">CN</option>
                                          <option value="SPN">SPN</option>
                                          <option value="MKN">MKN</option>
                                        </select>
                                        <span>* Wajib di Isi Jika Notaris</span>
                                      </div>
                                  </div>


                              </fieldset>
                              <h3> Informasi & Tempat Tinggal </h3>
                              <fieldset class="fieldset-auto-width">
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="Company-2" class="block">Alamat rumah:</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <textarea name="alamat_rumah" rows="6" class="form-control"></textarea>
                                        <span>*</span>
                                        </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="Company-2" class="block">Alamat Kantor:</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <textarea name="alamat_kantor" id="shortDescription3" rows="6" class="form-control"></textarea>
                                      <span>* Wajib di isi Untuk informasi Notaris</span>
                                        </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="CountryW-2" class="block">Provinsi</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control required select2" name="prov" id="prov" data-placeholder="Pilih" data-allow-clear="true">
                                          <option></option>
                                          @foreach (\Indonesia::allProvinces() as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="CountryW-2" class="block">Kab / Kota</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control select2 required" name="kab" id="kab" data-placeholder="Pilih" data-allow-clear="true">

                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="CountryW-2" class="block">Kecamatan</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control select2 required" name="kec" id="kec" data-placeholder="Pilih" data-allow-clear="true">

                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-4 col-lg-2">
                                          <label for="CountryW-2" class="block">Kelurahan</label>
                                      </div>
                                      <div class="col-sm-8 col-lg-10">
                                        <select class="form-control select2 required" name="kel" id="kel" data-placeholder="Pilih" data-allow-clear="true">

                                        </select>
                                      </div>
                                  </div>

                              </fieldset>
                          </form>
                      </section>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection

@section('costumjs')
  <script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>

  <script src="{{asset('bower_components/jquery.cookie/jquery.cookie.js')}}"></script>
  <script src="{{asset('bower_components/jquery.steps/build/jquery.steps.js')}}"></script>
  <script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/form-validation/validate.js')}}"></script>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
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
  $("#verticle-wizard").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            stepsOrientation: "vertical",
            autoFocus: true
        });
        var form = $("#example-advanced-form").show();

        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            stepsOrientation: "vertical",
            onStepChanging: function(event, currentIndex, newIndex) {

                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {

                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                    form.steps("next");
                }
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    form.steps("previous");
                }
            },
            onFinishing: function(event, currentIndex) {

                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
              swal({
                title: "Apa Anda Yakin?",
                text: "Silahkan cek kembali data yang anda input dan pastikan semua benar!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Simpan!",
                cancelButtonText: "Batal!",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm) {
                if (isConfirm) {
                  $.ajax({
                    url: '{{route('klien-saya.store')}}',
                    type: 'POST',
                    data: $("#example-advanced-form").serialize(),
                    success:function(){
                      swal("Data Disimpan!", "Data Berhasil Disimpan.", "success");
                      window.location.href= "{{route('klien-saya.index')}}";
                    },
                    error:function(){
                        swal("Error", "Terjadi Kesalahan", "error");
                    }
                  })



                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              });

                //$('.content input[type="text"]').val('');
                ///$('.content input[type="email"]').val('');
                //$('.content input[type="password"]').val('');
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {

                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password-2"
                }
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
        confirmButtonText: "Simpan!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: '{{route('users.store')}}',
            type: 'POST',
            data: $("#form_user").serialize(),
            success:function(){
              swal("Data Disimpan!", "Data Berhasil Disimpan.", "success");
              window.location.href= "{{route('klien-saya.index')}}";
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
