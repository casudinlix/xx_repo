@extends('layouts.master')
@section('title')
  Project Detil
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" />
        <!-- Multi Select css -->
        <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('bower_components/multiselect/css/multi-select.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/lightbox2/dist/css/lightbox.min.css')}}">
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" />
{{-- <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datedropper/datedropper.min.css')}}" />
    <!-- Color Picker css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/spectrum/spectrum.css')}}" /> --}}

    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/chartist/dist/chartist.css')}}">

<link rel="stylesheet" href="{{asset('bower_components/jquery-ui/themes/base/all.css')}}" />

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Task detail</h4>
          <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="">Layanan</i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Project</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Project Detail</a>
              </li>
          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="page-body">
      <div class="row">
          <!-- Task-detail-right start -->
          <div class="col-xl-4 col-lg-12 push-xl-8 task-detail-right">
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-money-bag m-r-10"></i>Data Modal</h5>
                  </div>
                  <div class="card-block">
                      <div class="counter">
                          <div class="yourCountdownContainer">
                              <div class="row">
                                Total Lembar Saham : {{$investor['total_saham']}} <br/>
                                Total Lembar Saham Investor : {{$investor['total_lembar_saham']}} <br/>
                                Sisa Lembar Saham        :{{number_format($investor['sisa_saham'])}}<br/>
                                Nilai Saham        : Rp. {{number_format($investor['nilai_saham'])}}<br/>
                                Modal Dasar        : Rp. {{number_format($investor['total_modal_investor'])}}<br/>
                                Modal Ditetapkan   : Rp. {{number_format(25/100*$investor['modal_ditetapkan'])}}<br/>

                                {{-- {{dd($investor)}} --}}

                              </div>
                              <!-- end of row -->
                          </div>
                          <!-- end of yourCountdown -->
                      </div>
                      <!-- end of counter -->
                  </div>

              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-money-bag m-r-10"></i>Data Modal</h5>
                  </div>
                  <div class="card-block">
                      <div class="counter">
                          <div class="yourCountdownContainer">
                              <div class="row">
                                <canvas id="modal-chart" width="400" height="400"></canvas>

                              </div>
                              <!-- end of row -->
                          </div>
                          <!-- end of yourCountdown -->
                      </div>
                      <!-- end of counter -->
                  </div>

              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-ui-note m-r-10"></i> Project Details</h5>
                  </div>
                  <div class="card-block task-details">
                      <table class="table table-border table-xs">
                          <tbody>
                              <tr>
                                  <td><i class="icofont icofont-contrast"></i> Kode Project:</td>
                                  <td class="text-right"><span class="f-right"><a href="#"> {{$project->kode}}</a></span></td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-meeting-add"></i> Updated:</td>
                                  <td class="text-right">{{tgl_akta($project->updated_at)}}</td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-id-card"></i> Created:</td>
                                  <td class="text-right">{{tgl_akta($project->created_at)}}</td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-spinner-alt-5"></i> Priority:</td>
                                  <td class="text-right">
                                      <div class="btn-group">
                                          <a href="#">
                                              <i class="icofont icofont-upload m-r-5"></i> Highest
                                          </a>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-spinner-alt-3"></i> Revisions:</td>
                                  <td class="text-right">29</td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-ui-love-add"></i> Added by:</td>
                                  <td class="text-right"><a href="#">{{$project1->name}}</a></td>
                              </tr>
                              <tr>
                                  <td><i class="icofont icofont-washing-machine"></i> Status:</td>
                                  <td class="text-right">{{$project1->status}}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="card-footer">
                      <div>
                          <span>
                        <a href="#!" class="text-muted m-r-10 f-16"><i class="icofont icofont-random"></i> </a>
                      </span>
                          <span class="m-r-10">
                         <a href="#!" class="text-muted f-16"><i class="icofont icofont-options"></i></a>
                      </span>
                          <div class="dropdown-secondary dropdown d-inline-block">
                              <button class="btn btn-sm btn-primary dropdown-toggle waves-light" type="button" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                              <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                  <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-checked m-r-10"></i>Check in</a>
                                  <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-attachment m-r-10"></i>Attach screenshot</a>
                                  <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-rotation m-r-10"></i>Reassign</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-edit-alt m-r-10"></i>Edit task</a>
                                  <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-close m-r-10"></i>Remove</a>
                              </div>
                              <!-- end of dropdown menu -->
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-wheel m-r-10"></i> Kelengkapan Data</h5>
                  </div>
                  <div class="card-block task-setting">
                      <div class="form-group">
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Publish after save</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Allow comments</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Allow users to edit the task</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Use task timer</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Auto saving</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Auto saving</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                  <label class="f-left">Allow attachments</label>
                                  <input type="checkbox" class="js-small f-right" checked="">
                              </div>
                          </div>
                          <div class="row text-center">
                              <div class="col-sm-12">
                                  <button type="button" class="btn btn-default waves-effect p-l-40 p-r-40  m-r-30">Reset
                                  </button>
                                  <button type="button" class="btn btn-primary waves-effect waves-light p-l-40 p-r-40">Save</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-certificate-alt-2 m-r-10"></i> Revisions</h5>
                  </div>
                  <div class="card-block revision-block">
                      <div class="form-group">
                          <div class="row">
                              <ul class="media-list">
                                  <li class="media d-flex m-b-15">
                                      <div class="p-l-15 p-r-20 d-inline-block v-middle"><a href="#" class="btn border-primary txt-primary btn-icon btn-sm b-2-primary"><i class="icon-ghost f-18 v-middle"></i></a></div>
                                      <div class="d-inline-block">
                                          Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                          <div class="media-annotation">4 minutes ago</div>
                                      </div>
                                  </li>
                                  <li class="media d-flex m-b-15">
                                      <div class="p-l-15 p-r-20 d-inline-block v-middle"><a href="#" class="btn border-primary txt-primary btn-icon btn-sm b-2-primary"><i class="icon-vector f-18 v-middle"></i></a></div>
                                      <div class="d-inline-block">
                                          Add full font overrides for popovers and tooltips
                                          <div class="media-annotation">36 minutes ago</div>
                                      </div>
                                  </li>
                                  <li class="media d-flex m-b-15">
                                      <div class="p-l-15 p-r-20 d-inline-block v-middle"><a href="#" class="btn border-primary txt-primary btn-icon btn-sm b-2-primary"><i class="icon-share-alt f-18 v-middle"></i></a></div>
                                      <div class="d-inline-block">
                                          created a new Design branch
                                          <div class="media-annotation">36 minutes ago</div>
                                      </div>
                                  </li>
                                  <li class="media d-flex m-b-15">
                                      <div class="p-l-15 p-r-20 d-inline-block v-middle"><a href="#" class="btn border-primary txt-primary btn-icon btn-sm b-2-primary"><i class="icon-equalizer f-18 v-middle"></i></a></div>
                                      <div class="d-inline-block">
                                          merged Master and Dev branches
                                          <div class="media-annotation">48 minutes ago</div>
                                      </div>
                                  </li>
                                  <li class="media d-flex">
                                      <div class="p-l-15 p-r-20 d-inline-block v-middle"><a href="#" class="btn border-primary txt-primary btn-icon btn-sm b-2-primary"><i class="icon-graph f-18 v-middle"></i></a></div>
                                      <div class="d-inline-block">
                                          Have Carousel ignore keyboard events
                                          <div class="media-annotation">Dec 12, 05:46</div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-attachment"></i> Dokumen Tambahan</h5>
                  </div>
                  <div class="card-block task-attachment">
                      <ul class="media-list">
                          <li class="media d-flex m-b-10">
                              <div class="m-r-20 v-middle">
                                  <i class="icofont icofont-file-word f-28 text-muted"></i>
                              </div>
                              <div class="media-body">
                                  <a href="#" class="m-b-5 d-block">Overdrew_scowled.doc</a>
                                  <div class="text-muted">
                                      <span>Size: 1.2Mb</span>
                                      <span>
                                    Added by <a href="">Winnie</a>
                               </span>
                                  </div>
                              </div>
                              <div class="f-right v-middle text-muted">
                                  <i class="icofont icofont-download-alt f-18"></i>
                              </div>
                          </li>
                          <li class="media d-flex m-b-10">
                              <div class="m-r-20 v-middle">
                                  <i class="icofont icofont-file-powerpoint f-28 text-muted"></i>
                              </div>
                              <div class="media-body">
                                  <a href="#" class="m-b-5 d-block">And_less_maternally.pdf</a>
                                  <div class="text-muted">
                                      <span>Size: 0.11Mb</span>
                                      <span>
                                    Added by <a href="">Eugene</a>
                               </span>
                                  </div>
                              </div>
                              <div class="f-right v-middle text-muted">
                                  <i class="icofont icofont-download-alt f-18"></i>
                              </div>
                          </li>
                          <li class="media d-flex m-b-10">
                              <div class="m-r-20 v-middle">
                                  <i class="icofont icofont-file-pdf f-28 text-muted"></i>
                              </div>
                              <div class="media-body">
                                  <a href="#" class="m-b-5 d-block">The_less_overslept.pdf</a>
                                  <div class="text-muted">
                                      <span>Size:5.9Mb</span>
                                      <span>
                                    Added by <a href="">Natalie</a>
                               </span>
                                  </div>
                              </div>
                              <div class="f-right v-middle text-muted">
                                  <i class="icofont icofont-download-alt f-18"></i>
                              </div>
                          </li>
                          <li class="media d-flex m-b-10">
                              <div class="m-r-20 v-middle">
                                  <i class="icofont icofont-file-exe f-28 text-muted"></i>
                              </div>
                              <div class="media-body">
                                  <a href="#" class="m-b-5 d-block">Well_equitably.mov</a>
                                  <div class="text-muted">
                                      <span>Size:20.9Mb</span>
                                      <span>
                                    Added by <a href="">Jenny</a>
                               </span>
                                  </div>
                              </div>
                              <div class="f-right v-middle text-muted">
                                  <i class="icofont icofont-download-alt f-18"></i>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-header-text"><i class="icofont icofont-users-alt-4"></i>  Assigned users</h5>
                  </div>
                  <div class="card-block user-box assign-user">
                      <div class="media">
                          <div class="media-left media-middle photo-table">
                              <a href="#">
                                  <img class="img-circle" src="assets/images/avatar-3.png" alt="chat-user">
                              </a>
                          </div>
                          <div class="media-body">
                              <h6>Sortino media</h6>
                              <p>Software Engineer</p>
                          </div>
                          <div>
                              <a href="#!" class="text-muted"> <i class="icon-options-vertical"></i></a>
                          </div>
                      </div>
                      <div class="media">
                          <div class="media-left media-middle photo-table">
                              <a href="#">
                                  <img class="img-circle" src="assets/images/avatar-2.png" alt="chat-user">
                              </a>
                          </div>
                          <div class="media-body">
                              <h6>Larry heading </h6>
                              <p>Web Designer</p>
                          </div>
                          <div>
                              <a href="#!" class="text-muted"> <i class="icon-options-vertical"></i></a>
                          </div>
                      </div>
                      <div class="media">
                          <div class="media-left media-middle photo-table">
                              <a href="#">
                                  <img class="img-circle" src="assets/images/avatar-1.png" alt="chat-user">
                              </a>
                          </div>
                          <div class="media-body">
                              <h6>Mark</h6>
                              <p>Chief Financial Officer (CFO)</p>
                          </div>
                          <div>
                              <a href="#!" class="text-muted"> <i class="icon-options-vertical"></i></a>
                          </div>
                      </div>
                      <div class="media p-0 d-flex">
                          <div class="media-left media-middle photo-table">
                              <a href="#">
                                  <img class="img-circle" src="assets/images/avatar-4.png" alt="chat-user">
                              </a>
                          </div>
                          <div class="media-body">
                              <h6>John Doe</h6>
                              <p>Senior Marketing Designer</p>
                          </div>
                          <div>
                              <a href="#!" class="text-muted"> <i class="icon-options-vertical"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Task-detail-right start -->
          <!-- Task-detail-left start -->

          <div class="col-xl-8 col-lg-12 pull-xl-4">
              <div class="card">

                  <div class="card-block">
                    <div class="">

                          <div class="col-lg-12 col-xl-12">
                              <div class="sub-title">Data</div>
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs  tabs" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#pihak-1" id="pihak" role="tab">Para Pihak</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#info-1" id="info" role="tab">Info Perusahaan</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#direksi-1" id="direksi" role="tab">Direksi</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#modal-1" id="modal" role="tab">Modal</a>
                                  </li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content tabs card-block">
                                  <div class="tab-pane active" id="pihak-1" role="tabpanel">
1
                                  </div>
                                  <div class="tab-pane" id="info-1" role="tabpanel">

                                  </div>
                                  <div class="tab-pane" id="direksi-1" role="tabpanel">

                                  </div>
                                  <div class="tab-pane" id="modal-1" role="tabpanel">

                                  </div>
                              </div>
                          </div>


                    </div>
                  </div>

              </div>
              <div class="card comment-block">
                  <div class="card-header animation-model">
                      <h5 class="card-header-text"><i class="icofont icofont-comment m-r-5"></i> Komentar</h5>
                      <button type="button" class="btn btn-warning btn-outline-warning waves-effect md-trigger" data-target="#tambahkomentar" data-toggle="collapse"><i class="icofont icofont-plus"></i></button>


                      <div class="collapse multi-collapse" id="tambahkomentar">
                        <div class="card">
                          <form class="" action="{{route('store.komentar')}}" method="post">
                              <textarea name="content" rows="8" cols="80" class="form-controll" id="editor2"></textarea>
                              <input type="hidden" name="project_id" value="{{$project->id}}">
                              @csrf
                              <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button>

                          </form>

                        </div>

                            {{-- <div class="card card-body">
                              <form class="" action="{{route('store.komentar')}}" method="post">
                                <textarea name="content" rows="8" cols="80" id="editor2"></textarea>
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                              <div class="modal-footer modal-footer-uniform">
                              <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button>
                              </div>
                              @csrf
                               </form>
                            </div> --}}
                          </div>
                  </div>
                  <div class="card-block">
                    @foreach ($comment as $key)
                      <ul class="media-list">
                          <li class="media">
                              <div class="media-left">
                                  <a href="#">
                                    @if (Auth::user()->avatar==null)
<img class="media-object img-circle comment-img" src="{{asset('assets/images/avatar-1.png')}}" alt="Generic placeholder image">
                                    @else
<img class="media-object img-circle comment-img" src="{{asset('storage/avatars/')}}/{{Auth::user()->avatar}}" alt="Generic placeholder image">
                                    @endif

                                  </a>
                              </div>
                              <div class="media-body">
                                  <h6 class="media-heading txt-primary">{{$key->name}} <span class="f-12 text-muted m-l-5">{{\Carbon\Carbon::parse($key->created_at)->diffForHumans()}}</span></h6>
                                  <p>
                                    {!!$key->content!!}

                                  </p>

                                  <hr>
                                  <!-- Nested media object -->

                              </div>
                          </li>
                      </ul>
                    @endforeach


                  </div>
              </div>
          </div>
          <!-- Task-detail-left end -->
      </div>
  </div>
  <div class="modal modal-right fade" id="tamba1h" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Komentar Baru</h5>
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <form class="" action="{{route('store.komentar')}}" method="post">
        <textarea name="content" rows="8" cols="80" id="editor2"></textarea>
        <input type="hidden" name="project_id" value="{{$project->id}}">
      <div class="modal-footer modal-footer-uniform">
      <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Simpan</button>
      </div>
      @csrf
       </form>
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
    <script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="{{asset('bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/lightbox2/dist/js/lightbox.min.js')}}"></script>
{{--
<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="{{asset('assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- Date-dropper js -->
<script type="text/javascript" src="{{asset('bower_components/datedropper/datedropper.min.js')}}"></script>
<!-- Color picker js -->
<script type="text/javascript" src="{{asset('bower_components/spectrum/spectrum.js')}}"></script> --}}

<script src="{{asset('assets/pages/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/chart.js/dist/Chart.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">
"use strict";
$(document).ready(function() {
  var token=$('meta[name="csrf-token"]').attr('content');
    var options = {
     filebrowserImageBrowseUrl: '/filemanager?type=Images',
     filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+token,
     filebrowserBrowseUrl: '/filemanager?type=Files',
     filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+token,


   };
 CKEDITOR.replace('editor2',options);
var data={
  labels: [0, 1, 2, 3, 4, 5, 6, 7],
  datasets: [{
      label: "My First dataset",
      backgroundColor: [
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)',
          'rgba(95, 190, 170, 0.99)'
      ],
      hoverBackgroundColor: [
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)',
          'rgba(26, 188, 156, 0.88)'
      ],
      data: [65, 59, 80, 81, 56, 55, 50],
  }, {
      label: "My second dataset",
      backgroundColor: [
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)',
          'rgba(93, 156, 236, 0.93)'
      ],
      hoverBackgroundColor: [
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)',
          'rgba(103, 162, 237, 0.82)'
      ],
      data: [60, 69, 85, 91, 58, 50, 45],
  }]
};
var bar = document.getElementById("modal-chart").getContext('2d');
var myBarChart = new Chart(bar, {
    type: 'bar',
    data: data,
    options: {
        barValueSpacing: 20
    }
});

  var project_id="{{$project->id}}"
    //$('#klien-1').load("{{url('data/ajax_klien')}}"+"/"+project_id);
    $('#pihak-1').load("{{url('data/ajax_penghadap')}}"+"/"+project_id);

    $("#pihak").click(function(event) {
      $('#pihak-1').load("{{url('data/ajax_penghadap')}}"+"/"+project_id);
    });
    $("#direksi").click(function(event) {
      $('#direksi-1').load("{{url('data/ajax_direksi')}}"+"/"+project_id);
    });
  $("#saham").click(function(event) {
    $("#saham-1").load("{{url('data/ajax_saham')}}"+"/"+project_id);
  });
  $("#modal").click(function(event) {
    $("#modal-1").load("{{url('data/ajax_investor')}}"+"/"+project_id);
  });
  $("#info").click(function(event) {
    $("#info-1").load("{{url('data/ajax_perusahaan')}}"+"/"+project_id);
  });
  $("#tab6").click(function(event) {
  $("#tab-6").load("{{url('projectdetil/dokumen')}}"+"/"+project_id);
  });
});
</script>
@endsection
