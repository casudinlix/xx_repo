<div class="main-menu-content">
    <ul class="main-navigation">
        <li class="nav-item {{isActiveRoute('home')}}">
            <a href="{{route('home')}}">
                <i class="ti-home"></i>
                <span>Dashboard</span>
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
                        <li><a href="../horizontal-fixed-icon/menu-horizontal-icon-fixed.html">Fixed With Icon</a></li>
                        <li><a href="../horizontal-static-icon/menu-horizontal-icon.html">Static With Icon</a></li>
                    </ul>
                </li>
                <li><a href="{{route('aktaku.index')}}">Akta</a></li>
                <li><a href="box-layout.html" target="_blank">Box Layout</a>
                    <label class="label label-warning menu-caption">NEW</label>
                </li>
                <li><a href="menu-rtl.html" target="_blank">RTL</a></li>
                    <li><a href="navbar-light.html">Navbar</a></li>
                        <li><a href="navbar-dark.html">Navbar Inverse</a></li>
                            <li><a href="navbar-elements.html">Navbar With Elements</a></li>
                                <li><a href="landing-page.html">Landing Page</a></li>
            </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-layers"></i>
                    <span>Pages</span>
                </a>
                <ul class="tree-1">
                    <li class="nav-sub-item"><a href="javascript:">Authentication</a>
                        <ul class="tree-2">
                            <li><a href="auth-normal-sign-in.html" target="_blank">Login With BG Image</a></li>
                            <li><a href="auth-sign-in-social.html" target="_blank">Login With Social Icon</a></li>
                            <li><a href="auth-sign-in-social-header-footer.html" target="_blank">Login Social With Header And Footer</a></li>
                            <li><a href="auth-normal-sign-in-header-footer.html" target="_blank">Login With Header And Footer</a></li>
                            <li><a href="auth-sign-up.html" target="_blank">Registration BG Image</a></li>
                            <li><a href="auth-sign-up-social.html" target="_blank">Registration Social Icon</a></li>
                            <li><a href="auth-sign-up-social-header-footer.html" target="_blank">Registration Social With Header And Footer</a></li>
                            <li><a href="auth-sign-up-header-footer.html" target="_blank">Registration With Header And Footer</a></li>
                            <li><a href="auth-multi-step-sign-up.html" target="_blank">Multi Step Registration</a></li>
                            <li><a href="auth-reset-password.html" target="_blank">Forgot Password</a></li>
                            <li><a href="auth-lock-screen.html" target="_blank">Lock Screen</a></li>
                            <li><a href="auth-modal.html" target="_blank">Modal</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Maintenance</a>
                        <ul class="tree-2">
                            <li><a href="error.html">Error</a></li>
                            <li><a href="comming-soon.html">Comming Soon</a></li>
                            <li><a href="offline-ui.html">Offline UI</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">User Profile</a>
                        <ul class="tree-2">
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="timeline-social.html">Timeline Social</a></li>
                            <li><a href="user-profile.html">User Profile</a></li>
                            <li><a href="user-card.html">User Card</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Blog</a>
                        <ul class="tree-2">
                            <li><a href="blog.html" data-i18n="nav.blog.blog">Blog</a></li>
                            <li><a href="blog-detail.html" data-i18n="nav.blog.blog-detail">Blog Detail</a></li>
                            <li><a href="blog-detail-left.html" data-i18n="nav.blog.blog-left-side">Blog With Left Sidebar</a></li>
                            <li><a href="blog-detail-right.html" data-i18n="nav.blog.blog-right-sidebar">Blog With Right Sidebar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">E-Commerce</a>
                        <ul class="tree-2">
                            <li><a href="product.html" data-i18n="nav.e-commerce.product">Product</a></li>
                            <li><a href="product-list.html" data-i18n="nav.e-commerce.product-list">Product List</a></li>
                            <li><a href="product-edit.html" data-i18n="nav.e-commerce.product-edit">Product Edit</a></li>
                            <li><a href="product-detail.html" data-i18n="nav.e-commerce.product-detail">Product Detail</a></li>
                            <li><a href="product-cart.html" data-i18n="nav.e-commerce.product-card">Product Cart</a></li>
                            <li><a href="product-payment.html" data-i18n="nav.e-commerce.credit-card-form">Credit Card Form </a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Email</a>
                        <ul class="tree-2">
                            <li><a href="email-compose.html" data-i18n="nav.email.compose-mail">Compose Email</a></li>
                            <li><a href="email-inbox.html" data-i18n="nav.email.inbox">Inbox</a></li>
                            <li><a href="email-read.html" data-i18n="nav.email.read-read-mail">Read Mail</a></li>
                            <li class="nav-sub-item-3"><a href="javascript:">Email Template</a>
                                <ul class="tree-3">
                                    <li><a href="email-templates/email-welcome.html" data-i18n="nav.email.email-template.welcome-email">Welcome Email</a></li>
                                    <li><a href="email-templates/email-password.html" data-i18n="nav.email.email-template.reset-password">Reset Password</a></li>
                                    <li><a href="email-templates/email-newsletter.html" data-i18n="nav.email.email-template.newsletter-email">Newsletter Email</a></li>
                                    <li><a href="email-templates/email-launch.html" data-i18n="nav.email.email-template.app-launch">App Launch</a></li>
                                    <li><a href="email-templates/email-activation.html" data-i18n="nav.email.email-template.activation-code">Activation Code</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Editor</a>
                        <ul class="tree-2">
                            <li><a href="ck-editor.html">CK-Editor</a></li>
                            <li><a href="wysiwyg-editor.html">WYSIWYG Editor</a></li>
                            <li><a href="ace-editor.html">Ace Editor</a></li>
                            <li><a href="summernote.html">Summer Note Editor</a></li>
                            <li><a href="long-press-editor.html">Long Press Editor</a></li>
                        <li><a href="x-editable.html">X-editable</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Invoice</a>
                        <ul class="tree-2">
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="invoice-summary.html">Invoice Summary</a></li>
                            <li><a href="invoice-list.html">Invoice List</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Event Calendar</a>
                        <ul class="tree-2">
                            <li><a href="event-full-calender.html">Full Calendar</a></li>
                            <li><a href="event-clndr.html">CLNDER
                        <label class="label label-info menu-caption">New</label>
                    </a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Internationalize</a>
                        <ul class="tree-2">
                            <li><a href="internationalization/internationalization-after-init.html">After Init</a></li>
                            <li><a href="internationalization/internationalization-fallback.html">Fallback</a></li>
                            <li><a href="internationalization/internationalization-on-init.html">On Init</a></li>
                            <li><a href="internationalization/internationalization-resources.html">Resources</a></li>
                            <li><a href="internationalization/internationalization-xhr-backend.html">XHR Backend</a></li>
                        </ul>
                    </li>
                    <li><a href="image-crop.html">Image Cropper</a></li>
                    <li><a href="file-upload.html">File Upload</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-wallet"></i>
                    <span>Keuangan</span>
                </a>
                <ul class="tree-1">
                    <li class="nav-sub-item"><a href="javascript:">Pajak</a>
                        <ul class="tree-2">
                            <li><a href="alert.html">Alert</a></li>
                            <li><a href="breadcrumb.html">Breadcrumbs</a></li>
                            <li><a href="button.html">Button</a></li>
                            <li><a href="box-shadow.html">Box-Shadow</a></li>
                            <li><a href="accordion.html">Collapse–Accordion</a></li>
                            <li><a href="generic-class.html">Generic Class</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="color.html">Color</a></li>
                            <li><a href="label-badge.html">Label Badge</a></li>
                            <li><a href="progress-bar.html">Progress Bar</a></li>
                            <li><a href="preloader.html">Pre-Loader</a></li>
                            <li><a href="list.html">List</a></li>
                            <li><a href="tooltip.html">Tooltip And Popover</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="other.html">Other</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Akunting</a>
                        <ul class="tree-2">
                            <li><a href="draggable.html">Faktur Klien</a></li>
                            <li><a href="bs-grid.html">Petty Cash</a></li>
                            <li><a href="light-box.html">Bank</a></li>
                            <li><a href="modal.html">Tagihan</a></li>
                            <li><a href="modal-form.html">Vendor</a></li>
                            <li><a href="notification.html">Notifications</a></li>
                            <li><a href="notify.html">PNOTIFY</a>
                                <label class="label label-info menu-caption">NEW</label>
                            </li>
                            <li><a href="rating.html">Rating</a></li>
                            <li><a href="range-slider.html">Range Slider</a></li>
                            <li><a href="slider.html">Slider</a></li>
                            <li><a href="syntax-highlighter.html">Syntax Highlighter </a></li>
                            <li><a href="tour.html">Tour</a></li>
                            <li><a href="treeview.html">Tree View</a></li>
                            <li><a href="nestable.html">Nestable</a></li>
                            <li><a href="toolbar.html">Toolbar</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Extra Components</a>
                        <ul class="tree-2">
                            <li><a href="session-timeout.html">Session Timeout</a></li>
                            <li><a href="session-idle-timeout.html">Session Idle Timeout</a>
                            </li>
                            <li><a href="offline.html">Offline</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Icons</a>
                        <ul class="tree-2">
                            <li><a href="icon-font-awesome.html">Font Awesome</a></li>
                            <li><a href="icon-themify.html">Themify</a></li>
                            <li><a href="icon-simple-line.html">Simple Line Icon</a></li>
                            <li><a href="icon-ion.html">Ion Icon</a></li>
                            <li><a href="icon-material-design.html">Material Design</a></li>
                            <li><a href="icon-icofonts.html">Ico Fonts</a></li>
                            <li><a href="icon-weather.html">Weather Icon</a></li>
                            <li><a href="icon-typicons.html">Typicons</a></li>
                            <li><a href="icon-flags.html">Flags</a></li>
                        </ul>
                    </li>
                    <li><a href="sticky.html">Sticky Notes</a>
                        <label class="label label-danger menu-caption">HOT</label>
                    </li>
                    <li><a href="animation.html">Animations</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-write"></i>
                    <span>Forms</span>
                </a>
                <ul class="tree-1">
                    <li class="nav-sub-item"><a href="javascript:">Form Components</a>
                        <ul class="tree-2">
                            <li><a href="form-elements-component.html">Form Components</a></li>
                            <li><a href="form-elements-add-on.html
                    ">Form-Elements-Add-On
                    </a></li>
                            <li><a href="form-elements-advance.html">Form-Elements-Advance</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">JSON Form</a>
                        <ul class="tree-2">
                            <li><a href="json-forms/simple-form.html">Simple Form</a></li>
                            <li><a href="json-forms/clubs.html">Clubs(View Selector)</a></li>
                            <li><a href="json-forms/customer-form.html">Customer Form</a></li>
                            <li><a href="json-forms/customer-profile-display-form.html">Profile Display</a></li>
                            <li><a href="json-forms/customer-profile-edit-form.html">Profile Edit</a></li>
                            <li><a href="json-forms/customer-profile-read-only.html">Profile Ready Only</a></li>
                            <li><a href="json-forms/json-form-fields.html">Form Fields</a></li>
                            <li><a href="json-forms/registration-click-validation.html">Registration Validation</a></li>
                            <li><a href="json-forms/registration-automatic-validation.html">Automatic Validation</a></li>
                            <li><a href="json-forms/localized-login.html">Localized Login</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Ready To Use</a>
                        <ul class="tree-2">
                            <li><a href="ready-cloned-elements-form.html">Cloned Elements Form</a></li>
                            <li><a href="ready-currency-form.html">Currency Form </a></li>
                            <li><a href="ready-form-booking.html">Booking Form</a></li>
                            <li><a href="ready-form-booking-multi-steps.html"> Booking Multi Steps Form</a></li>
                            <li><a href="ready-form-comment.html">Comment Form</a></li>
                            <li><a href="ready-form-contact.html"> Contact Form</a></li>
                            <li><a href="ready-job-application-form.html">Job Application Form</a></li>
                            <li><a href="ready-js-addition-form.html">JS Addition Form</a></li>
                            <li><a href="ready-login-form.html"> Login Form</a></li>
                            <li><a href="ready-popup-modal-form.html" target="_blank">Popup Modal Form</a></li>
                            <li><a href="ready-registration-form.html">Registration Form</a>
                            </li>
                            <li><a href="ready-review-form.html">Review Form</a></li>
                            <li><a href="ready-subscribe-form.html">Subscribe Form</a></li>
                            <li><a href="ready-suggestion-form.html">Suggestion Form</a></li>
                            <li><a href="ready-tabs-form.html">Tabs Form</a></li>
                        </ul>
                    </li>
                    <li><a href="form-picker.html">Form Picker</a></li>
                    <li><a href="form-select.html">Form Select </a></li>
                    <li><a href="form-masking.html">Form Masking</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-layout-grid3"></i>
                    <span>Tables</span>
                </a>
                <ul class="tree-1">
                    <li class="nav-sub-item"><a href="javascript:">Bootstrap Table</a>
                        <ul class="tree-2">
                            <li><a href="bs-basic-table.html">Basic Table</a></li>
                            <li><a href="bs-table-sizing.html">Sizing Table</a></li>
                            <li><a href="bs-table-border.html">Border Table</a></li>
                            <li><a href="bs-table-styling.html">Styling Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Data Table</a>
                        <ul class="tree-2">
                            <li><a href="dt-basic.html">Basic Initialization</a></li>
                            <li><a href="dt-advance.html">Advance Initialization</a></li>
                            <li><a href="dt-styling.html">Styling</a></li>
                            <li><a href="dt-api.html">API</a></li>
                            <li><a href="dt-ajax.html">Ajax</a></li>
                            <li><a href="dt-server-side.html">Server Side</a></li>
                            <li><a href="dt-plugin.html">Plug-In</a></li>
                            <li><a href="dt-data-sources.html">Data Sources</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Table Extensions</a>
                        <ul class="tree-2">
                            <li><a href="dt-ext-autofill.html">AutoFill</a></li>
                            <li class="nav-sub-item-3"><a href="javascript:">Button</a>
                                <ul class="tree-3">
                                    <li><a href="dt-ext-basic-buttons.html">Basic Button</a></li>
                                    <li><a href="dt-ext-buttons-flash.html">Flash Button</a></li>
                                    <li><a href="dt-ext-buttons-html-5-data-export.html">Html-5 Data Export </a></li>
                                    <li><a href="dt-ext-buttons-print.html">Print Button</a></li>
                                </ul>
                            </li>
                            <li><a href="dt-ext-col-reorder.html">Col Reorder</a></li>
                            <li><a href="dt-ext-fixed-columns.html">Fixed Columns</a></li>
                            <li><a href="dt-ext-fixed-header.html">Fixed Header</a></li>
                            <li><a href="dt-ext-key-table.html">Key Table</a></li>
                            <li><a href="dt-ext-responsive.html">Responsive</a></li>
                            <li><a href="dt-ext-row-reorder.html">Row Recorder</a></li>
                            <li><a href="dt-ext-scroller.html">Scroller</a></li>
                            <li><a href="dt-ext-select.html">Select Table</a></li>
                        </ul>
                    </li>
                    <li><a href="foo-table.html">FooTable</a></li>
                    <li class="nav-sub-item"><a href="javascript:">Handson Table</a>
                        <ul class="tree-2">
                            <li><a href="handson-appearance.html">Appearance</a></li>
                            <li><a href="handson-data-operation.html">Data Operation</a></li>
                            <li><a href="handson-rows-cols.html">Rows Columns</a></li>
                            <li><a href="handson-columns-only.html">Columns Only</a></li>
                            <li><a href="handson-cell-features.html">Cell Features</a></li>
                            <li><a href="handson-cell-types.html">Cell Types</a></li>
                            <li><a href="handson-integrations.html">Integrations</a></li>
                            <li><a href="handson-rows-only.html">Rows Only</a></li>
                            <li><a href="handson-utilities.html">Utilities</a></li>
                        </ul>
                    </li>
                    <li><a href="editable-table.html">Editable Table</a></li>
                    <li class="nav-sub-item"><a href="javascript:">Charts</a>
                        <ul class="tree-2">
                            <li><a href="chart-google.html">Google Chart</a></li>
                            <li><a href="chart-echart.html">Echarts</a></li>
                            <li><a href="chart-chartjs.html">ChartJs</a></li>
                            <li><a href="chart-list.html">List Chart</a></li>
                            <li><a href="chart-float.html">Float Chart</a></li>
                            <li><a href="chart-knob.html">Know chart</a></li>
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chart-nvd3.html">Nvd3 Chart</a></li>
                            <li><a href="chart-peity.html">Peity Chart</a></li>
                            <li><a href="chart-radial.html">Radial Chart</a></li>
                            <li><a href="chart-rickshaw.html">Rickshaw Chart</a></li>
                            <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                            <li><a href="chart-c3.html">C3 Chart</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Maps</a>
                        <ul class="tree-2">
                            <li><a href="map-google.html" data-i18n="nav.maps.google-maps">Google Maps</a></li>
                            <li><a href="map-vector.html" data-i18n="nav.maps.vector-map">Vector Maps</a></li>
                            <li><a href="map-api.html" data-i18n="nav.maps.google-map-api">Google Map Search API</a></li>
                            <li><a href="location.html" data-i18n="nav.maps.location">Location</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-settings"></i>
                    <span>Pengaturan</span>
                </a>
                <ul class="tree-1">
                    <li><a href="{{route('akta.index')}}">Tamplate Akta</a></li>
                    <li> <a href="crm-contact.html">CRM Contact</a></li>
                    <li class="nav-sub-item"><a href="javascript:">Social</a>
                        <ul class="tree-2">
                            <li><a href="fb-wall.html">Fb Wall</a></li>
                            <li><a href="message.html">Messages</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Job Search</a>
                        <label class="label label-danger menu-caption">NEW</label>
                        <ul class="tree-2">
                            <li><a href="job-card-view.html">Card View</a></li>
                            <li><a href="job-details.html">Job Detailed</a></li>
                            <li><a href="job-find.html">Job Find</a></li>
                            <li><a href="job-panel-view.html">Job Panel View</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Task</a>
                        <ul class="tree-2">
                            <li><a href="task-list.html">Task List</a></li>
                            <li><a href="task-board.html">Task Board</a></li>
                            <li><a href="task-detail.html">Task Detail</a></li>
                            <li><a href="issue-list.html">Issue List</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">To-Do</a>
                        <ul class="tree-2">
                            <li><a href="todo.html">To-Do</a></li>
                            <li><a href="notes.html">Notes</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Gallery</a>
                        <ul class="tree-2">
                            <li><a href="gallery-grid.html">Gallery-Grid</a></li>
                            <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                            <li><a href="gallery-advance.html">Advance Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-sub-item"><a href="javascript:">Search</a>
                        <ul class="tree-2">
                            <li><a href="search-result.html">Simple Search</a></li>
                            <li><a href="search-result2.html">Grouping Search</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:!">
                    <i class="ti-folder"></i>
                    <span>General</span>
                </a>
                <ul class="tree-1">
                    <li><a href="javascript:">Documentation</a></li>
                    <li><a href="javascript:">Submit Issue</a></li>
                    <li><a href="javascript:" class="nav-link disabled"> Disabled Menu</a></li>
                    <li><a href="sample-page.html">Sample Page</a></li>
                    <li><a href="change-loges.html">Change Loges</a></li>
                    <li class="nav-sub-item"><a href="javascript:">Menu Level 1.1</a>
                        <ul class="tree-2">
                            <li><a href="javascript:">Menu Level 2.1</a></li>
                            <li class="nav-sub-item-3"><a href="javascript:">Menu Level 2.2</a>
                                <ul class="tree-3">
                                    <li><a href="javascript:">Menu Level 3.1</a></li>
                                    <li class="nav-sub-item-4"><a href="javascript:">Menu Level 3.2</a>
                                        <ul class="tree-4">
                                            <li><a href="javascript:">Menu Level 4.1</a></li>
                                            <li><a href="javascript:">Menu Level 4.2</a></li>
                                            <li><a href="javascript:">Menu Level 4.3</a></li>
                                            <li><a href="javascript:">Menu Level 4.4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:">Menu Level 3.3</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:">Menu Level 2.3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
    </ul>
</div>
