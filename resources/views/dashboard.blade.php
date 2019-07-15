@extends('layouts.master')
@section('title')
  Dashboard
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
          <li class="nav-item has-class">
              <a href="#">
                  <i class="ti-dashboard"></i>
                  <span>Dashboard</span>
              </a>

          </li>
        </ul>
      </div>
@endsection
@section('costumcss')
  <!-- Horizontal-Timeline css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/horizontal-timeline/css/style.css')}}">
  <!-- amchart css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/amchart/css/amchart.css')}}">
  <!-- flag icon framework css -->
@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Dashboard</h4>
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
              <li class="breadcrumb-item"><a href="#!">Dashboard</a>
              </li>
          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="page-body">
      <div class="row">
          <div class="col-md-12 col-xl-4">
              <!-- table card start -->
              <div class="card table-card">
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-6 card-block-big br">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-eye-alt text-success"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>10k</h5>
                                      <span>Visitors</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 card-block-big">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-ui-music text-danger"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>100%</h5>
                                      <span>Volume</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-6 card-block-big br">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-files text-info"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>2000 +</h5>
                                      <span>Files</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 card-block-big">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-envelope-open text-warning"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>120</h5>
                                      <span>Mails</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- table card end -->
          </div>
          <div class="col-md-12 col-xl-4">
              <!-- table card start -->
              <div class="card table-card">
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-6 card-block-big br">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <div id="barchart" style="height:40px;width:40px;"></div>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>1000</h5>
                                      <span>Shares</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 card-block-big">
                              <div class="row ">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-network text-primary"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>600</h5>
                                      <span>Network</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-6 card-block-big br">
                              <div class="row ">
                                  <div class="col-sm-4">
                                      <div id="barchart2" style="height:40px;width:40px;"></div>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>350</h5>
                                      <span>Returns</span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6 card-block-big">
                              <div class="row ">
                                  <div class="col-sm-4">
                                      <i class="icofont icofont-network-tower text-primary"></i>
                                  </div>
                                  <div class="col-sm-8 text-center">
                                      <h5>100%</h5>
                                      <span>Connections</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- table card end -->
          </div>
          <div class="col-md-12 col-xl-4">
              <!-- widget primary card start -->
              <div class="card table-card widget-primary-card">
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-3 card-block-big">
                              <i class="icofont icofont-star"></i>
                          </div>
                          <div class="col-sm-9">
                              <h4>4000 +</h4>
                              <h6>Ratings Received</h6>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- widget primary card end -->
              <!-- widget-success-card start -->
              <div class="card table-card widget-success-card">
                  <div class="">
                      <div class="row-table">
                          <div class="col-sm-3 card-block-big">
                              <i class="icofont icofont-trophy-alt"></i>
                          </div>
                          <div class="col-sm-9">
                              <h4>17</h4>
                              <h6>Achievements</h6>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- widget-success-card end -->
          </div>
          <div class="col-lg-6">
              <div class="card">
                  <div class="card-block">
                      <div id="chartdiv"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="card">
                  <div class="card-block">
                    <div id="chartdiv"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card card-border-primary">
                          <div class="card-header">
                              <h5>John Doe </h5>
                              <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->
                              <div class="dropdown-secondary dropdown f-right">
                                  <button class="btn btn-primary btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Overdue</button>
                                  <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-danger"></span>Pending</a>
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-warning"></span>Paid</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item waves-light waves-effect active" href="#!"><span class="point-marker bg-success"></span>On Hold</a>
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-info"></span>Canceled</a>
                                  </div>
                                  <!-- end of dropdown menu -->
                                  <span class="f-left m-r-5 text-inverse">Status : </span>
                              </div>
                          </div>
                          <div class="card-block">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <ul class="list list-unstyled">
                                          <li>Invoice #: &nbsp;0028</li>
                                          <li>Issued on: <span class="text-semibold">2015/01/25</span></li>
                                      </ul>
                                  </div>
                                  <div class="col-sm-6">
                                      <ul class="list list-unstyled text-right">
                                          <li>$8,750</li>
                                          <li>Method: <span class="text-semibold">Paypal</span></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <div class="task-list-table">
                                  <p class="task-due"><strong> Due : </strong><strong class="label label-success">23 hours</strong></p>
                              </div>
                              <div class="task-board m-0">
                                  <a href="../html/invoice.html" class="btn btn-info btn-mini b-none"><i class="icofont icofont-eye-alt m-0"></i></a>
                                  <!-- end of dropdown-secondary -->
                                  <div class="dropdown-secondary dropdown">
                                      <button class="btn btn-info btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                      <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-alarm"></i> Print Invoice</a>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-attachment"></i> Download invoice</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-spinner-alt-5"></i> Edit Invoice</a>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-edit"></i> Remove Invoice</a>
                                      </div>
                                      <!-- end of dropdown menu -->
                                  </div>
                                  <!-- end of seconadary -->
                              </div>
                              <!-- end of pull-right class -->
                          </div>
                          <!-- end of card-footer -->
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <!-- Invoice list card start -->
                      <div class="card card-border-primary">
                          <div class="card-header">
                              <h5>John Doe </h5>
                              <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->
                              <div class="dropdown-secondary dropdown f-right">
                                  <button class="btn btn-primary btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Overdue</button>
                                  <div class="dropdown-menu" aria-labelledby="dropdown12" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-danger"></span>Pending</a>
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-warning"></span>Paid</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item waves-light waves-effect active" href="#!"><span class="point-marker bg-success"></span>On Hold</a>
                                      <a class="dropdown-item waves-light waves-effect" href="#!"><span class="point-marker bg-info"></span>Canceled</a>
                                  </div>
                                  <!-- end of dropdown menu -->
                                  <span class="f-left m-r-5 text-inverse">Status : </span>
                              </div>
                          </div>
                          <div class="card-block">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <ul class="list list-unstyled">
                                          <li>Invoice #: &nbsp;0028</li>
                                          <li>Issued on: <span class="text-semibold">2015/01/25</span></li>
                                      </ul>
                                  </div>
                                  <div class="col-sm-6">
                                      <ul class="list list-unstyled text-right">
                                          <li>$8,750</li>
                                          <li>Method: <span class="text-semibold">Paypal</span></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer">
                              <div class="task-list-table">
                                  <p class="task-due"><strong> Due : </strong><strong class="label label-warning">23 hours</strong></p>
                              </div>
                              <div class="task-board m-0">
                                  <a href="../html/invoice.html" class="btn btn-info btn-mini b-none"><i class="icofont icofont-eye-alt m-0"></i></a>
                                  <!-- end of dropdown-secondary -->
                                  <div class="dropdown-secondary dropdown">
                                      <button class="btn btn-info btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                      <div class="dropdown-menu" aria-labelledby="dropdown8" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-alarm"></i> Print Invoice</a>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-attachment"></i> Download invoice</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-spinner-alt-5"></i> Edit Invoice</a>
                                          <a class="dropdown-item waves-light waves-effect" href="#!"><i class="icofont icofont-ui-edit"></i> Remove Invoice</a>
                                      </div>
                                      <!-- end of dropdown menu -->
                                  </div>
                                  <!-- end of seconadary -->
                              </div>
                              <!-- end of pull-right class -->
                          </div>
                          <!-- end of card-footer -->
                      </div>
                      <!-- Invoice list card end -->
                  </div>
              </div>
          </div>
          <div class="col-lg-8">
              <div class="card">
                  <div class="card-header">
                      <button class="btn btn-primary btn-sm">Week</button>
                      <button class="btn btn-primary btn-sm">Month</button>
                      <button class="btn btn-primary btn-sm">Year</button>
                  </div>
                  <div class="card-block">
                      <div id="morris-extra-area"></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-8">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card table-1-card">
                          <div class="card-block">
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr class="text-capitalize">
                                              <th>Type</th>
                                              <th>Lead Name</th>
                                              <th>Views</th>
                                              <th>Favourites</th>
                                              <th>Last Visit</th>
                                              <th>Last Action</th>
                                              <th>Last Date</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td><a href="#!">Buyer</a>
                                              </td>
                                              <td>Denish Ann</td>
                                              <td>153</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>9.23 A.M.</td>
                                              <td>9/27/2015</td>
                                          </tr>
                                          <tr>
                                              <td><a class="text-danger" href="#!">Lanload</a>
                                              </td>
                                              <td>John Doe</td>
                                              <td>121</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>6.23 A.M.</td>
                                              <td>8/27/2015</td>
                                          </tr>
                                          <tr>
                                              <td><a href="#!">Buyer</a>
                                              </td>
                                              <td>Henry Joe</td>
                                              <td>154</td>
                                              <td>140</td>
                                              <td>30</td>
                                              <td>7.54 P.M.</td>
                                              <td>4/30/2015</td>
                                          </tr>
                                          <tr>
                                              <td><a class="text-danger" href="#!">Lanload</a>
                                              </td>
                                              <td>Sara Soudein</td>
                                              <td>153</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>9.23 A.M.</td>
                                              <td>5/20/2016</td>
                                          </tr>
                                          <tr>
                                              <td><a href="#!">Buyer</a>
                                              </td>
                                              <td>Denish Ann</td>
                                              <td>153</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>9.23 A.M.</td>
                                              <td>3/26/2015</td>
                                          </tr>
                                          <tr>
                                              <td><a class="text-info" href="#!">Lanload</a>
                                              </td>
                                              <td>Stefen Joe</td>
                                              <td>153</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>11.45 A.M.</td>
                                              <td>5/20/2017</td>
                                          </tr>
                                          <tr>
                                              <td><a href="#!">Buyer</a>
                                              </td>
                                              <td>Mark Backlus</td>
                                              <td>153</td>
                                              <td>100</td>
                                              <td>20</td>
                                              <td>12.40 A.M.</td>
                                              <td>3/27/2017</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="card table-card group-widget">
                          <div class="">
                              <div class="row-table">
                                  <div class="col-sm-4 bg-primary card-block-big">
                                      <i class="icofont icofont-music"></i>
                                      <p>1,586</p>
                                  </div>
                                  <div class="col-sm-4 bg-dark-primary card-block-big">
                                      <i class="icofont icofont-video-clapper"></i>
                                      <p>1,743</p>
                                  </div>
                                  <div class="col-sm-4 bg-darkest-primary card-block-big">
                                      <i class="icofont icofont-email"></i>
                                      <p>1,096</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="card widget-chat-box">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-sm-2">
                              <i class="icofont icofont-navigation-menu pop-up"></i>
                          </div>
                          <div class="col-sm-8 text-center">
                              <h5>
                         John Henry
                              </h5>
                          </div>
                          <div class="col-sm-2 text-right">
                              <i class="icofont icofont-ui-edit"></i>
                          </div>
                      </div>
                  </div>
                  <div class="card-block">
                      <p class="text-center">12:05 A.M.</p>
                      <div class="media">
                          <img class="d-flex mr-3 img-circle img-40 img-thumbnail" src="assets/images/user-card/img-round1.jpg" alt="Generic placeholder image">
                          <div class="media-body send-chat">
                              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at
                              <span class="time">3 min ago</span>
                          </div>
                      </div>
                      <div class="media col-sm-8 offset-md-4">
                          <div class="media-body  receive-chat">
                              Cras sit amet nibh libero, in gravida nulla.vel metus scelerisque ante
                              <span class="time">
                              <i class="icofont icofont-check m-r-5"></i>Seen 2 sec ago
                              </span>
                          </div>
                      </div>
                      <div class="media">
                          <img class="d-flex mr-3 img-circle img-40 img-thumbnail" src="assets/images/user-card/img-round1.jpg" alt="Generic placeholder image">
                          <div class="media-body send-chat">
                              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at
                              <span class="time">3 min ago</span>
                          </div>
                      </div>
                      <div class="media col-sm-8 offset-md-4">
                          <div class="media-body  receive-chat">
                              Cras sit amet nibh libero, in gravida nulla.Vel metus scelerisque ante
                              <span class="time">
                              <i class="icofont icofont-check m-r-5"></i>Seen 2 sec ago
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <input type="text" class="form-control" placeholder="Your Message">
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card social-widget-card">
                  <div class="card-block-big bg-facebook">
                      <h3>1165 +</h3>
                      <span class="m-t-10">Facebook Users</span>
                      <i class="icofont icofont-social-facebook"></i>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card social-widget-card">
                  <div class="card-block-big bg-twitter">
                      <h3>780 +</h3>
                      <span class="m-t-10">Twitter Users</span>
                      <i class="icofont icofont-social-twitter"></i>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card social-widget-card">
                  <div class="card-block-big bg-linkein">
                      <h3>998 +</h3>
                      <span class="m-t-10">Linked In Users</span>
                      <i class="icofont icofont-brand-linkedin"></i>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-xl-3">
              <div class="card social-widget-card">
                  <div class="card-block-big bg-google-plus">
                      <h3>650 +</h3>
                      <span class="m-t-10">Google Plus Users</span>
                      <i class="icofont icofont-social-google-plus"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('costumjs')
  <!-- Rickshow Chart js -->
  <script src="{{asset('bower_components/d3/d3.js')}}"></script>
  <script src="{{asset('bower_components/rickshaw/rickshaw.js')}}"></script>
  <!-- Morris Chart js -->
  <script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('bower_components/morris.js/morris.js')}}"></script>
  <!-- Horizontal-Timeline js -->
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/horizontal-timeline/js/main.js')}}"></script>
  <!-- amchart js -->
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/amcharts.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/serial.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/light.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/custom-amchart.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">

"use strict";
$(document).ready(function() {
    /*Multiple Bars*/
    $("#barchart").html('');
    var graph2 = new Rickshaw.Graph({
        element: document.querySelector("#barchart"),
        renderer: 'bar',
        stack: false,
        series: [{
            data: [{
                x: 0,
                y: 40
            }, {
                x: 1,
                y: 49
            }, {
                x: 2,
                y: 30
            }],
            color: '#1abc9c'
        }, {
            data: [{
                x: 0,
                y: 10
            }, {
                x: 1,
                y: 24
            }, {
                x: 2,
                y: 15
            }],
            color: '#bdc3c7'
        }]
    });
    graph2.render();
    /*Multiple Bars*/
    $("#barchart2").html('');
    var graph3 = new Rickshaw.Graph({
        element: document.querySelector("#barchart2"),
        renderer: 'bar',
        stack: false,
        series: [{
            data: [{
                x: 0,
                y: 28
            }, {
                x: 1,
                y: 48
            }, {
                x: 2,
                y: 78
            }],
            color: '#1abc9c'
        }, {
            data: [{
                x: 0,
                y: 78
            }, {
                x: 1,
                y: 88
            }, {
                x: 2,
                y: 98
            }],
            color: '#bdc3c7'
        }]
    });

    graph3.render();


    // Extra chart
    Morris.Area({
        element: 'morris-extra-area',
        data: [{
                period: '2010',
                iphone: 0,
                ipad: 0,
                itouch: 0
            }, {
                period: '2011',
                iphone: 50,
                ipad: 15,
                itouch: 5
            }, {
                period: '2012',
                iphone: 20,
                ipad: 50,
                itouch: 65
            }, {
                period: '2013',
                iphone: 60,
                ipad: 12,
                itouch: 7
            }, {
                period: '2014',
                iphone: 30,
                ipad: 20,
                itouch: 120
            }, {
                period: '2015',
                iphone: 25,
                ipad: 80,
                itouch: 40
            }, {
                period: '2016',
                iphone: 10,
                ipad: 10,
                itouch: 10
            }


        ],
        lineColors: ['#fb9678', '#7E81CB', '#01C0C8'],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['Site A', 'Site B', 'Site C'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: '#5FBEAA',
        hideHover: 'auto'

    });
});

</script>
@endsection
