<div class="main-nav">
  <nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link" href="{{url('home')}}"><span class=""></span><i class="fa fa-dashboard mr-5"></i> <span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-flask-outline faa-flash animated"></i> <span>Applikasi</span>
      </a>
      <ul class="menu-mega-child dropdown-menu multilevel scale-up-left">
        <li class="nav-item"><a class="nav-link" href="{{route('permission.index')}}"><i class="mdi mdi-flask-outline"></i>Permission</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('role.index')}}"><i class="mdi mdi-account-key"></i>Role</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}"><i class="mdi mdi-account-multiple-outline"></i>Users</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/app/calendar.html">Calendar</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/app/profile.html">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/app/userlist-grid.html">Userlist Grid</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/app/userlist.html">Userlist</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/email/index.html">Emails</a></li>
      </ul>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-envelope mr-5 faa-shake animated"></i> <span>Email</span>
      </a>
      <ul class="dropdown-menu multilevel scale-up-left">
        <li class="nav-item"><a class="nav-link" href="pages/mailbox/mailbox.html">Inbox</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/mailbox/compose.html">Compose</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/mailbox/read-mail.html">Read</a></li>
      </ul>
      </li>
      <li class="nav-item dropdown m-menu m-fix">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-briefcase mr-5 faa-tada animated"></i> <span>Pekerjaan & Misc</span>
      </a>
      <div class="dropdown-menu menu-mega mega-menu-auto scale-up-left">
          <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="{{route('klien-saya.index')}}" title=""><i class="fa fa-address-book mr-15"></i>Klien Saya</a>
          </li>
          <li>
            <a class="nav-link" href="{{route('project-notaris.index')}}" title=""><i class="fa fa-code mr-15"></i>Project Notaris</a>
          </li>
          <li>
            <a class="nav-link" href="pages/forms/editor-markdown.html" title=""><i class="fa fa-code-fork mr-15"></i>Project PPAT</a>
          </li>
          <li>
            <a class="nav-link" href="{{route('akta.index')}}" title=""><i class="fa fa-book mr-15"></i>Tamplate Akta</a>
          </li>
          <li>
            <a class="nav-link" href="pages/forms/form-validation.html" title=""><i class="fa fa-calendar mr-15"></i>Jadwal Akad</a>
          </li>
          <li>
            <a class="nav-link" href="{{route('file.saya')}}" title=""><i class="fa fa-folder mr-15"></i>File Manager</a>
          </li>
          <li>
            <a class="nav-link" href="pages/forms/general.html" title=""><i class="fa fa-book mr-15"></i>Akta Klien</a>
          </li>
          <li>
            <a class="nav-link" href="pages/forms/mask.html" title=""><i class="fa fa-cubes mr-15"></i>Formatter</a>
          </li>
          <li>
            <a class="nav-link" href="pages/forms/xeditable.html" title=""><i class="fa fa-file-code-o mr-15"></i>Xeditable Editor</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="pages/widgets/blog.html" title=""><i class="fa fa-flag mr-15"></i>Blog</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/chart.html" title=""><i class="fa fa-line-chart mr-15"></i>Chart</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/list.html" title=""><i class="fa fa-list mr-15"></i>List</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/social.html" title=""><i class="fa fa-share-alt mr-15"></i>Social</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/statistic.html" title=""><i class="fa fa-sitemap mr-15"></i>Statistic</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/weather.html" title=""><i class="fa fa-cloud mr-15"></i>Weather</a>
          </li>
          <li>
            <a class="nav-link" href="pages/widgets/widgets.html" title=""><i class="fa fa-comments-o mr-15"></i>Widgets</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->

      </div>

      </li>
      <li class="nav-item dropdown m-menu m-fix">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-cash-multiple mr-5 faa-ring animated"></i> <span>Keuangan & Other</span>
      </a>
      <div class="dropdown-menu menu-mega mega-menu-auto scale-up-left">
          <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="pages/charts/chartjs.html" title=""><i class="fa fa-bar-chart mr-15"></i>ChartJS</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/flot.html" title=""><i class="fa fa-area-chart mr-15"></i>Flot</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/inline.html" title=""><i class="fa fa-pie-chart mr-15"></i>Inline charts</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/morris.html" title=""><i class="fa fa-bar-chart-o mr-15"></i>Morris</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/peity.html" title=""><i class="fa fa-pie-chart mr-15"></i>Peity</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="pages/tables/simple.html" title=""><i class="fa fa-table mr-15"></i>Simple tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/data.html" title=""><i class="fa fa-th mr-15"></i>Data tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/editable-tables.html" title=""><i class="fa fa-th-list mr-15"></i>Editable Tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/table-color.html" title=""><i class="fa fa-paint-brush mr-15"></i>Table Color</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->

      </div>

      </li>
      <li class="nav-item dropdown m-menu m-fix">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-account-multiple mr-5 faa-ring animated"></i> <span>Klien Menu</span>
      </a>
      <div class="dropdown-menu menu-mega mega-menu-auto scale-up-left">
          <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="pages/charts/chartjs.html" title=""><i class="fa fa-book mr-15"></i>Akta Saya</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/flot.html" title=""><i class="fa fa-area-chart mr-15"></i>Progress Pekerjaan</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/inline.html" title=""><i class="fa fa-pie-chart mr-15"></i>Inline charts</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/morris.html" title=""><i class="fa fa-bar-chart-o mr-15"></i>Morris</a>
          </li>
          <li>
            <a class="nav-link" href="pages/charts/peity.html" title=""><i class="fa fa-pie-chart mr-15"></i>Peity</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-half list-unstyled">
          <li>
            <a class="nav-link" href="pages/tables/simple.html" title=""><i class="fa fa-table mr-15"></i>Simple tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/data.html" title=""><i class="fa fa-th mr-15"></i>Data tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/editable-tables.html" title=""><i class="fa fa-th-list mr-15"></i>Editable Tables</a>
          </li>
          <li>
            <a class="nav-link" href="pages/tables/table-color.html" title=""><i class="fa fa-paint-brush mr-15"></i>Table Color</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->

      </div>

      </li>

      <li class="nav-item dropdown m-menu">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-laptop mr-5"></i> <span>UI Elements</span>
      </a>
      <div class="dropdown-menu menu-mega scale-up-down">

        <ul class="menu-mega-child one-four list-unstyled">
          <li>
            <a class="nav-link" href="pages/UI/badges.html" title=""><i class="fa fa-certificate mr-15"></i>Badges</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/border-utilities.html" title=""><i class="fa fa-window-minimize mr-15"></i>Border</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/buttons.html" title=""><i class="fa fa-minus mr-15"></i>Buttons</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/bootstrap-switch.html" title=""><i class="fa fa-toggle-on mr-15"></i>Bootstrap Switch</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/cards.html" title=""><i class="fa fa-user-circle mr-15"></i>User Card</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/color-utilities.html" title=""><i class="fa fa-paint-brush mr-15"></i>Color</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/date-paginator.html" title=""><i class="fa fa-ellipsis-h mr-15"></i>Date Paginator</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-four list-unstyled">
          <li>
            <a class="nav-link" href="pages/UI/dropdown.html" title=""><i class="fa fa-check mr-15"></i>Dropdown</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/dropdown-grid.html" title=""><i class="fa fa-check-square-o mr-15"></i>Dropdown Grid</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/general.html" title=""><i class="fa fa-clone mr-15"></i>General</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/icons.html" title=""><i class="fa fa-italic mr-15"></i>Icons</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/media-advanced.html" title=""><i class="fa fa-file mr-15"></i>Advanced Medias</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/modals.html" title=""><i class="fa fa-unlink mr-15"></i>Modals</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/nestable.html" title=""><i class="fa fa-th-list mr-15"></i>Nestable</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-four list-unstyled">
          <li>
            <a class="nav-link" href="pages/UI/notification.html" title=""><i class="fa fa-indent mr-15"></i>Notification</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/portlet-draggable.html" title=""><i class="fa fa-list mr-15"></i>Draggable Portlets</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/ribbons.html" title=""><i class="fa fa-clipboard mr-15"></i>Ribbons</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/sliders.html" title=""><i class="fa fa-sliders mr-15"></i>Sliders</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/sweatalert.html" title=""><i class="fa fa-window-maximize mr-15"></i>Sweet Alert</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/tab.html" title=""><i class="fa fa-sticky-note mr-15"></i>Tabs</a>
          </li>
          <li>
            <a class="nav-link" href="pages/UI/timeline.html" title=""><i class="fa fa-object-group mr-15"></i>Timeline</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->
        <ul class="menu-mega-child one-four list-unstyled">
          <li>
            <a class="nav-link" href="pages/UI/timeline-horizontal.html" title=""><i class="fa fa-object-group mr-15"></i>Horizontal Timeline</a>
          </li>
          <li>
            <a class="nav-link" href="pages/extension/fullscreen.html" title=""><i class="fa fa-television mr-15"></i>Fullscreen</a>
          </li>
          <li>
            <a class="nav-link" href="pages/box/advanced.html" title=""><i class="fa fa-square mr-15"></i>Box Advanced</a>
          </li>
          <li>
            <a class="nav-link" href="pages/box/basic.html" title=""><i class="fa fa-square-o mr-15"></i>Box Basic</a>
          </li>
          <li>
            <a class="nav-link" href="pages/box/color.html" title=""><i class="fa fa-paint-brush mr-15"></i>Box Color</a>
          </li>
          <li>
            <a class="nav-link" href="pages/box/group.html" title=""><i class="fa fa-window-restore mr-15"></i>Box Group</a>
          </li>
        </ul><!-- /.menu-mega-child one-four -->

      </div>

      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Extra Pages
      </a>

      <ul class="dropdown-menu multilevel scale-up-left">
        <li class="nav-item"><a class="nav-link" href="pages/map/map-google.html">Google Map</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/map/map-vector.html">Vector Map</a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-item dropdown-toggle" href="#">Sample Pages</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item nav-link" href="pages/samplepage/blank.html">Blank</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/coming-soon.html">Coming Soon</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/custom-scroll.html">Custom Scrolls</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/faq.html">FAQ</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/gallery.html">Gallery</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/invoice.html">Invoice</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/lightbox.html">Lightbox Popup</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/pace.html">Pace</a></li>
          <li><a class="dropdown-item nav-link" href="pages/samplepage/pricing.html">Pricing</a></li>

          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle nav-link" href="#">Authentication</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item nav-link" href="pages/samplepage/login.html">Login</a></li>
            <li><a class="dropdown-item nav-link" href="pages/samplepage/register.html">Register</a></li>
            <li><a class="dropdown-item nav-link" href="pages/samplepage/lockscreen.html">Lockscreen</a></li>
            <li><a class="dropdown-item nav-link" href="pages/samplepage/user-pass.html">Recover password</a></li>
          </ul>
          </li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle nav-link" href="#">Error Pages</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item nav-link" href="pages/samplepage/404.html">404</a></li>
            <li><a class="dropdown-item nav-link" href="pages/samplepage/500.html">500</a></li>
            <li><a class="dropdown-item nav-link" href="pages/samplepage/maintenance.html">Maintenance</a></li>
          </ul>
          </li>
              </ul>
        </li>
      </ul>
      </li>

    </ul>
    </div>
  </nav>
</div>
