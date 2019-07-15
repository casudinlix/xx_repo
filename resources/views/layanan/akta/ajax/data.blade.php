@php
$pihak=\DB::table('project_penghadap')
->where('project_penghadap.project_id',$id)->orWherenull('project_id')->get();
$no=1;
$data1=\DB::table('project_penghadap')
->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_penghadap.provinces_id')
->leftJoin('indonesia_cities','indonesia_cities.id','=','project_penghadap.cities_id')
->leftJoin('indonesia_districts','indonesia_districts.id','=','project_penghadap.districts_id')
->leftJoin('indonesia_villages','indonesia_villages.id','=','project_penghadap.villages_id')
->leftJoin('project','project.id','=','project_penghadap.project_id')
->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
->where('project_penghadap.project_id',$id)->first();

$direksi=DB::table('project_direksi')
->where('project_direksi.project_id',$id)->get();
$data2 =DB::table('project_direksi')
->leftJoin('indonesia_provinces','indonesia_provinces.id','=','project_direksi.provinces_id')
->leftJoin('indonesia_cities','indonesia_cities.id','=','project_direksi.cities_id')
->leftJoin('indonesia_districts','indonesia_districts.id','=','project_direksi.districts_id')
->leftJoin('indonesia_villages','indonesia_villages.id','=','project_direksi.villages_id')
->leftJoin('project','project.id','=','project_direksi.project_id')
->select(['indonesia_provinces.name as prov','indonesia_cities.name as kab','indonesia_districts.name as kec','indonesia_villages.name as kel'])
->where('project_direksi.project_id',$id)->first();
$jabatan=DB::table('jabatan')->get();
@endphp

<a class="data-data" href="javascript::void">lihat</a>

<div id="sidebar" class="users p-chat-user show-data">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="card-block">
                    <div class="right-icon-control">

                    </div>
                </div>
                <div class="main-friend-data">
                  <br>
                  <br>
                  <br>

                  <div id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="accordion-panel">
                          <div class="accordion-heading" role="tab" id="headingOne">
                              <h3 class="card-title accordion-title">
                              <a  class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Penghadap
                              </a>
                            </h3>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="accordion-content accordion-desc main-friend-data">
                                @foreach ($pihak as $key)
                                  <b>Pihak ke {{$no++}} </b>
                                <p draggable="true">  {{$key->title}} {{$key->nama_lengkap}} </p>
                                <p>
                                {{$key->jenis_penghadap}}
                                <p draggable="true">Lahir di {{$key->tempat_lahir}}, Pada {{tgl_akta($key->tgl_lahir)}} ,   <br/>
                                warganegara Republik-------- {{$key->kewarganegaraan}}, Pekerjaan {{$key->pekerjaan}}, bertempat tinggal di----------{{$data1->prov}} dengan alamat---
                                  {{$key->alamat_lengkap}} . Provinsi {{$data1->prov}}. {{$data1->kab}}. Kecamatan {{$data1->kec}}. Kelurahan {{$data1->kel}}.<br/>
                                pemegang Kartu Tanda Penduduk dengan------------- Nomor Induk Kependudukan:   {{$key->no_identitas}}, <br/></p>
                                </p>
                                  <hr>
                                @endforeach
                              </div>
                          </div>
                      </div>
                      <div class="accordion-panel">
                          <div class="accordion-heading" role="tab" id="headingTwo">
                              <h3 class="card-title accordion-title">
                              <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Direksi
                              </a>
                            </h3>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="accordion-content accordion-desc">
                                @foreach ($direksi as $key)
                                  
                                <p draggable="true">  {{$key->title}} {{$key->nama_lengkap}} </p>
                                <p>
                                {{$key->jabatan}}
                                <p draggable="true">Lahir di {{$key->tempat_lahir}}, Pada {{tgl_akta($key->tgl_lahir)}} ,   <br/>
                                warganegara Republik-------- {{$key->kewarganegaraan}}, bertempat tinggal di----------{{$data2->prov}} dengan alamat---
                                  {{$key->alamat_lengkap}} . Provinsi {{$data2->prov}}. {{$data2->kab}}. Kecamatan {{$data2->kec}}. Kelurahan {{$data2->kel}}.<br/>
                                pemegang Kartu Tanda Penduduk dengan------------- Nomor Induk Kependudukan:   {{$key->no_identitas}}, <br/></p>
                                </p>
                                  <hr>
                                @endforeach
                              </div>
                          </div>
                      </div>
                      <div class="accordion-panel">
                          <div class=" accordion-heading" role="tab" id="headingThree">
                              <h3 class="card-title accordion-title">
                              <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Pemodal
                              </a>
                            </h3>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="accordion-content accordion-desc">
                                  <p>
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </div>
                          </div>
                      </div>

                      <div class="accordion-panel">
                          <div class=" accordion-heading" role="tab" id="heading1">
                              <h3 class="card-title accordion-title">
                              <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                              Info
                              </a>
                            </h3>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                              <div class="accordion-content accordion-desc">
                                  <p>
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
        </div>
    </div>
</div>

{{-- <div class="showData_inner">
    <div class="media chat-inner-header">
        <a class="back_data">
            <i class="icofont icofont-rounded-left"></i> Josephin Doe
        </a>
    </div>
    <div class="media chat-messages">
        <a class="media-left photo-table" href="#!">
            <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
        </a>
        <div class="media-body chat-menu-content">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
    </div>
    <div class="media chat-messages">
        <div class="media-body chat-menu-reply">
            <div class="">
                <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                <p class="chat-time">8:20 a.m.</p>
            </div>
        </div>
        <div class="media-right photo-table">
            <a href="#!">
                <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
            </a>
        </div>
    </div>
    <div class="chat-reply-box p-b-20">
        <div class="right-icon-control">
            <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
            <div class="form-icon">
                <i class="icofont icofont-paper-plane"></i>
            </div>
        </div>
    </div>
</div> --}}

<script type="text/javascript">
  $(document).ready(function() {
    $('.datatables').DataTable({
      responsive:true,
    });
  });
</script>
<script type="text/javascript">

  $(document).ready(function() {
    var a = $(window).height() - 50;
    $(".main-friend-data").slimScroll({
        height: a,
        allowPageScroll: false,
        wheelStep: 5,
        color: '#1b8bf9'
    });
    $("#search-friends").on("keyup", function() {
        var g = $(this).val().toLowerCase();
        $(".userlist-data .media-body .chat-header").each(function() {
            var s = $(this).text().toLowerCase();
            $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    });
    // open chat box
    $('.data-data').on('click', function() {
        var options = {
            direction: 'right'
        };
        $('.show-data').toggle('slide', options, 500);
    });

    // $(document).on('click',function(e){

    //
    //       $('.showChat').hide();

    //  });
    $('.userlist-data').on('click', function() {
        var options = {
            direction: 'left'
        };
        $('.showData_inner').toggle('slide', options, 500);
    });
    //back to main chatbar
    $('.back_data').on('click', function() {
        var options = {
            direction: 'left'
        };
        $('.showData_inner').toggle('slide', options, 500);
        $('.show-data').css('display', 'block');
    });

  });
</script>
