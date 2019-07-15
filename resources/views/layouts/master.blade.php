<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}:.@yield('title')</title>
  	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
		<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
			<script type="text/javascript">
				var url="{{env('APP_URL')}}"
			</script>
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/icon/simple-line-icons/css/simple-line-icons.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/icon/ion-icon/css/ionicons.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/menu-search/css/component.css')}}">
  	@yield('costumcss')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('login_asset/toastr.min.css')}}"/>
     <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('bower_components/jquery-ui/themes/base/all.css')}}" />

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color/color-1.css')}}" id="color"/>
    <link rel="stylesheet" type="text/css" href="{{asset('animasi.min.css')}}"/>

    <style type="text/css">
        li.item.new {
            position: relative;
        }
        li.item.new:after {
            content: 'New';
            background: rgba(255, 0, 0, 0.72);
            width: 30px;
            height: 30px;
            position: absolute;
            top: -10px;
            left: 50%;
            margin-left: 35px;
            color: white;
            border-radius: 50%;
            text-align: center;
            vertical-align: center;
            align-items: center;
            line-height: 27px;
            font-size: 10px;
            box-shadow: 2px 2px 3px rgba(85, 85, 85, 0.5);
            border: 1px solid gray;
            /*animation: shake 1s infinite ease-out;*/
            -webkit-animation-name: bounce;
            animation-name: bounce;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-delay: 1s;
        }
        @-webkit-keyframes bounce {
            0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);}
            40% {-webkit-transform: translateY(-10px);}
            60% {-webkit-transform: translateY(-5px);}
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }
    </style>
</head>

<body class="horizontal-fixed">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse">
                    <i class="ti-menu"></i>
                </a>
                {{-- <a class="mobile-search morphsearch-search">
                    <i class="ti-search"></i>
                </a> --}}
                <a href="{{route('home')}}">
                    <img class="img-fluid" src="{{asset('assets/images/logoenotaryadmin.png')}}" alt="Theme-Logo" />
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li>
                            {{-- <a class="main-search morphsearch-search" href="#">
                                <!-- themify icon -->
                                <i class="ti-search"></i>
                            </a> --}}
                        </li>
                        <li>

                        </li>
												@can ('setup aplikasi')
													@include('layouts.mega')
												@endcan

                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification lng-dropdown">
                            <a href="#" id="dropdown-active-item">
                                <i class="flag-icon flag-icon-id m-r-5"></i> Indonesia
                            </a>
                            <ul class="show-notification">
															<li>
																	<a href="#" data-lng="id">
																			<i class="flag-icon flag-icon-id m-r-5"></i> Indonesia
																	</a>
															</li>
                                <li>
                                    <a href="#" data-lng="en">
                                        <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="es">
                                        <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="pt">
                                        <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-lng="fr">
                                        <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @include('layouts.notif')
                        <li class="header-notification">
                            @php
                                $count = Auth::user()->newThreadsCount();
                                 $cssClass = $count == 0 ? 'hidden' : '';
                            @endphp
                            <a href="javascript:" class="displayChatbox">
                                <i class="ti-comments"></i>
                            <span class="badge">{{$count}}</span>
                            </a>
                        </li>
                        {{-- <li class="header-notification">
                            <a href="javascript:" class="display-data">
                                <i class="ti-harddrives"></i>
                                <span class="badge">Data</span>
                            </a>
                        </li> --}}
                        <li class="user-profile header-notification">
                            <a href="javascript:">

                                @if (Auth::user()->avatar==null)
                                <img src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image">
                                @else
    <img class="img-circle comment-img" src="{{asset('storage/avatars')}}/{{Auth::user()->avatar}}" alt="Generic placeholder image">
                                @endif
                                <span>{{Auth::user()->name}}</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="javascript:">
                                        <i class="ti-settings"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('me.index')}}">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="email-inbox.html">
                                        <i class="ti-email"></i> My Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen.html">
                                        <i class="ti-lock"></i> Lock Screen
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
													          document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
																		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													              @csrf
													          </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- search -->
                    <div id="morphsearch" class="morphsearch">
                        {{-- <form class="morphsearch-form">
                            <input class="morphsearch-input" type="search" placeholder="Search..." />
                            <button class="morphsearch-submit" type="submit">Search</button>
                        </form> --}}
                        <div class="morphsearch-content">
                            <div class="dummy-column">
                                <h2>People</h2>
                                <a class="dummy-media-object" href="javascript:">
                                    {{-- <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan" />
                                    <h3>Sara Soueidan</h3> --}}
                                </a>
                                <a class="dummy-media-object" href="javascript:">
                                    {{-- <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona" />
                                    <h3>Shaun Dona</h3> --}}
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Popular</h2>
                                <a class="dummy-media-object" href="javascript:">
                                    <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect" />
                                    <h3>Page Preloading Effect</h3>
                                </a>
                                <a class="dummy-media-object" href="javascript:">
                                    <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow" />
                                    <h3>Draggable Dual-View Slideshow</h3>
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Recent</h2>
                                <a class="dummy-media-object" href="javascript:">
                                    <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration" />
                                    <h3>Tooltip Styles Inspiration</h3>
                                </a>
                                <a class="dummy-media-object" href="javascript:">
                                    <img src="assets/images/avatar-1.png" alt="NotificationStyles" />
                                    <h3>Notification Styles Inspiration</h3>
                                </a>
                            </div>
                        </div>
                        <!-- /morphsearch-content -->
                        <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                    </div>
                    <!-- search end -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
    <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-header">
            <img class="img-40" src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span>{{Auth::user()->name}}</span>
                <span id="more-details">UX Designer<i class="icon-arrow-down"></i></span>
            </div>
        </div>
        @yield('menu')
    </div>
    <!-- Menu aside end -->
    <!-- Sidebar chat start -->
    <div id="sidebar" class="users p-chat-user showChat">
        {{-- <div id="app">
        <chat-component></chat-component>
    </div> --}}
      @include('layouts.chat')
    </div>
    <!-- Sidebar inner chat start-->
    <div>

    </div>
    <div id="chating"></div>
    {{-- @include('layouts.chating') --}}
    <!-- Sidebar inner chat end-->
    <!-- Main-body start-->
    <div class="main-body">
        <div class="page-wrapper">
            @yield('atas')

          @yield('content')
        </div>
    </div>

    <!-- Warning Section Ends -->
    <!-- Required Jqurey -->
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/tether/dist/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('bower_components/modernizr/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>
    <!-- classie js -->
    <script type="text/javascript" src="{{asset('bower_components/classie/classie.js')}}"></script>
		@yield('costumjs')
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('bower_components/i18next/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>

    <!-- Custom js -->
		<script type="text/javascript">
	  $.ajaxSetup({
	  headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	    });
	    function angka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	  if (charCode > 31 && (charCode < 48 || charCode > 57))

	  return false;
	  return true;
	  }
	  </script>
		@yield('script')

    <script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>
		<script src="{{asset('login_asset/toastr.min.js')}}"></script>

		@toastr_render
		<script type="text/javascript">
    $(document).ready(function() {


    // search
    $(".search-text").on("keyup", function() {

        var g = $(this).val().toLowerCase();
        $(".userlist-box .media-body .chat-header").each(function() {

            var s = $(this).text().toLowerCase();
            $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
        });
    });


      // open chat box
      $('.displayChatbox').on('click', function() {
          var options = {
              direction: 'right'
          };
          $('.showChat').toggle('slide', options, 500);
      });

      // $(document).on('click',function(e){

      //
      //       $('.showChat').hide();

      //  });

      //open friend chat
        $('#xx').clic

      $('.userlist-box').on('click', function() {
          var options = {
              direction: 'right',

          };

          var users_id=$(this).attr('data-id');
          //var  users_id=
          //alert(users_id);

          console.log(users_id);

          $('.showChat').toggle('slide', options, 500);
          $("#chating").load("{{url('get_chat')}}"+"/"+users_id);

      });
      //back to main chatbar
      $('.back_chatBox').on('click', function(e) {
          var options = {
              direction: 'right'
          };
          $('.showChat_inner').toggle('slide', options, 500);
          $('.showChat').css('display', 'block');
      });
      $('[data-toggle="tooltip"]').tooltip();
      $('[data-toggle="popover"]').popover({
                  html: true,
                  content: function() {
                      return $('#primary-popover-content').html();
                  }
              });
    });

		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "positionClass": "toast-top-center",
		  "onclick": null,
		  "showDuration": "1000",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		};
		//toastr.success("xxxxxxx");
		</script>
{{-- <script type="text/javascript" src="{{mix('js/app.js')}}"> --}}

</script>

</body>

</html>
