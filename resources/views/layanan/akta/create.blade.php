
@extends('layouts.master')
@section('title')
  Create Akta
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
    </div>@endsection
@section('costumcss')
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/data-table/css/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/sweetalert/dist/sweetalert.css')}}">

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4> Akta</h4>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="">Pengajuan</i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!"> Akta</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Buat Akta</a>
              </li>
          </ul>
      </div>
  </div>
@endsection
@section('content')
  <div class="page-body">
      <!-- Article Editor card start -->
      <div class="card">
          <div class="card-header">
              <h5>Akta Editor</h5>
              <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
              <div class="card-header-right">
                  <i class="icofont icofont-rounded-down"></i>
                  <i class="icofont icofont-refresh"></i>
                  <i class="icofont icofont-close-circled"></i>
              </div>
          </div>
          <div class="card-block">
            <form action="{{route('aktaku.store')}}" method="post">
              <div class="form-group">
                <label for="">Project Refrence</label>
                <select class="form-control" name="project" required id="project">
                  <option value=""></option>
                  @foreach ($project as $key)
                    <option value="{{$key->id}}">{{$key->kode}}</option>
                  @endforeach
                </select>
                <input type="hidden" id="users_id">
                <input type="hidden" id="project_id">
                <input type="hidden" id="jenis_akta_id">

              </div>
              <div class="form-group">
                <label for="">Klien</label>
                <input type="text" class="form-control" name="klien" required id="klien" readonly>

              </div>
              <div class="form-group">
                <label for="">Jenis Akta</label>
                <input type="text" class="form-control" name="jenis" required id="jenis" readonly>

              </div>
              <div class="form-group">
                <label for="">Nomor Akta</label>
                <input type="text" class="form-control" name="no_akta" required>

              </div>
              <div class="form-group">
                <label for="">Pilih Dari Tamplate Akta</label>
                <select class="form-control" name="akta" id='akta'>
                  <option value="Manual">Ketik Manual</option>
                  @foreach ($akta as $key)
                    <option value="{{$key->id}}">{{$key->nama_akta}}</option>
                  @endforeach
                </select>

              </div>
              <div class="form-group" id="xx">
                <label for="">Data List</label>
                <div id="penghadap"></div>

              </div>

              <div class="form-group">
                <label for="">Content</label>
                <textarea id="editor1" name="content" data-sample-short contenteditable="true" class="columns">
                </textarea>
              </div>

                  @csrf
                  <br>
<button type="submit" name="button" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
            </form>
          </div>
        </div>
      </div>
        <a href="#" class="color-1" ></a>
        <a href="#" class="color-2" ></a><a href="#" class="color-3" ></a>
        <a href="#" class="color-4" ></a><a href="#" class="color-5"></a>
        <a href="#" class="color-6"></a></div></div></div>

@endsection

@section('costumjs')
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
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
  <script type="text/javascript" src="{{asset('assets/pages/sparkline/jquery.sparkline.js')}}"></script>
 <script type="text/javascript" src="{{asset('bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">

///
  var project_id= $('#project').val();
  $('#project').change(function(event) {
  $.ajax({
    url: '{{url('pengajuan/get_pro')}}/'+$(this).val(),
    type: 'get',
    dataType: 'JSON',
    data: {id: $(this).val()},
    success:function(data){
      $('#users_id').val(data.users_id);
      $('#project_id').val(data.id);
      $('#jenis_akta_id').val(data.jenis_akta_id);
      $('#jenis').val(data.nama_jenis_akta);
      $('#klien').val(data.name);
        $('#penghadap').load("{{url('pengajuan/data')}}/"+$('#project_id').val());
        //$("#tab-6").load("{{url('projectdetil/dokumen')}}"+"/"+project_id);

    },
    error:function(){
      $('#users_id').val(' ');
      $('#project_id').val(' ');
      $('#jenis_akta_id').val(' ');
      $('#jenis').val(' ');
      $('#klien').val(' ');
      $('#penghadap').hide();
      swal("Refresh!", "You clicked the button!", "info");
      window.location.href= "{{route('aktaku.create')}}";
    }
  });

  });

  CKEDITOR.on('instanceReady', function() {
        // When an item in the contact list is dragged, copy its data into the drag and drop data transfer.
        // This data is later read by the editor#paste listener in the hcard plugin defined above.
        CKEDITOR.document.getById('xx').on('dragstart', function(evt) {
          // The target may be some element inside the draggable div (e.g. the image), so get the div.h-card.
          var target = evt.data.getTarget();

          // Initialization of the CKEditor data transfer facade is a necessary step to extend and unify native
          // browser capabilities. For instance, Internet Explorer does not support any other data type than 'text' and 'URL'.
          // Note: evt is an instance of CKEDITOR.dom.event, not a native event.
          CKEDITOR.plugins.clipboard.initDragDataTransfer(evt);

          var dataTransfer = evt.data.dataTransfer;

          // Pass an object with contact details. Based on it, the editor#paste listener in the hcard plugin
          // will create the HTML code to be inserted into the editor. You could set 'text/html' here as well, but:
          // * It is a more elegant and logical solution that this logic is kept in the hcard plugin.
          // * You do not know now where the content will be dropped and the HTML to be inserted
          // might vary depending on the drop target.
          //dataTransfer.setData('contact',);
          //dataTransfer.setData('contact', CONTACTS[target.data('contact')]);
          // You need to set some normal data types to backup values for two reasons:
          // * In some browsers this is necessary to enable drag and drop into text in the editor.
          // * The content may be dropped in another place than the editor.
          dataTransfer.setData('text/html', target.getText());

          // You can still access and use the native dataTransfer - e.g. to set the drag image.
          // Note: IEs do not support this method... :(.

        });
      });
  var editor1=CKEDITOR.replace('editor1', {
      // Define the toolbar: http://docs.ckeditor.com/#!/guide/dev_toolbar
      // The full preset from CDN which we used as a base provides more features than we need.
      // Also by default it comes with a 3-line toolbar. Here we put all buttons in a single row.
      skin:'office2013',


      // Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
      // One HTTP request less will result in a faster startup time.
      // For more information check http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-customConfig
      //customConfig: '',

      // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
      // For more information check:
      //  - About Advanced Content Filter: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
      //  - About Disallowed Content: http://docs.ckeditor.com/#!/guide/dev_disallowed_content
      //  - About Allowed Content: http://docs.ckeditor.com/#!/guide/dev_allowed_content_rules
      disallowedContent: 'img{width,height,float}',
      extraAllowedContent: 'img[width,height,align]',

      /*********************** File management support ***********************/
      // In order to turn on support for file uploads, CKEditor has to be configured to use some server side
      // solution with file upload/management capabilities, like for example CKFinder.
      // For more information see http://docs.ckeditor.com/#!/guide/dev_ckfinder_integration

      // Uncomment and correct these lines after you setup your local CKFinder instance.
      // filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
      // filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      /*********************** File management support ***********************/

      // Make the editing area bigger than default.
      height: 800,

      // An array of stylesheets to style the WYSIWYG area.
      // Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
       contentsCss: ['{{asset('assets/pages/ckeditor/document.css')}}'],

      // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
      bodyClass: 'document-editor',

      // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
      format_tags: 'p;h1;h2;h3;pre',

      // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
      removeDialogTabs: 'image:advanced;link:advanced',

      // Define the list of styles which should be available in the Styles dropdown list.
      // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
      // (and on your website so that it rendered in the same way).
      // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
      // that file, which means one HTTP request less (and a faster startup).
      // For more information see http://docs.ckeditor.com/#!/guide/dev_styles

  });

  'use strict';
  function addItems( listElement, template, items ) {
  					for ( var i = 0, draggable, item; i < items.length; i++ ) {
  						item = new CKEDITOR.dom.element( 'li' );
  						draggable = CKEDITOR.dom.element.createFromHtml(
  							template.output( {
  								id: i,
  								name: items[ i ].name,
  								avatar: items[ i ].avatar
  							} )
  						);
  						draggable.setAttributes( {
  							draggable: 'true',
  							tabindex: '0'
  						} );

  						item.append( draggable );
  						listElement.append( item );
  					}
  				}
  addItems(
    CKEDITOR.document.getById( 'xx' ),
    new CKEDITOR.template(
      '<div class="contact h-card" data-contact="{id}">' +
        '<img src="assets/draganddrop/img/{avatar}.png" alt="avatar" class="u-photo" /> {name}' +
      '</div>'
    ),
    ''
  );
$('#akta').change(function(event) {
  CKEDITOR.instances.editor1.updateElement();
  CKEDITOR.instances.editor1.destroy();
  $.ajax({
    url: '{{url('pengajuan/data_akta')}}/'+$(this).val(),
    type: 'get',
    dataType: 'JSON',
    data: {id: $(this).val()},
    success:function(data){
      console.log(data);
      //document.getElementById('editor1').style.display = "block";
      if(typeof CKEDITOR.instances['editor1'] != 'undefined') {
          CKEDITOR.instances['editor1'].updateElement();
          CKEDITOR.instances['editor1'].destroy();
      }else{
      var value=$('#editor1').val(data.content);
      var editor1=CKEDITOR.replace('editor1', {
          // Define the toolbar: http://docs.ckeditor.com/#!/guide/dev_toolbar
          // The full preset from CDN which we used as a base provides more features than we need.
          // Also by default it comes with a 3-line toolbar. Here we put all buttons in a single row.
          skin:'office2013',


          // Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
          // One HTTP request less will result in a faster startup time.
          // For more information check http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-customConfig
          //customConfig: '',

          // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
          // For more information check:
          //  - About Advanced Content Filter: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
          //  - About Disallowed Content: http://docs.ckeditor.com/#!/guide/dev_disallowed_content
          //  - About Allowed Content: http://docs.ckeditor.com/#!/guide/dev_allowed_content_rules
          disallowedContent: 'img{width,height,float}',
          extraAllowedContent: 'img[width,height,align]',


          /*********************** File management support ***********************/
          // In order to turn on support for file uploads, CKEditor has to be configured to use some server side
          // solution with file upload/management capabilities, like for example CKFinder.
          // For more information see http://docs.ckeditor.com/#!/guide/dev_ckfinder_integration

          // Uncomment and correct these lines after you setup your local CKFinder instance.
          // filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
          // filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          /*********************** File management support ***********************/

          // Make the editing area bigger than default.
          height: 800,

          // An array of stylesheets to style the WYSIWYG area.
          // Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
           contentsCss: ['{{asset('assets/pages/ckeditor/document.css')}}'],

          // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
          bodyClass: 'document-editor',

          // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
          format_tags: 'p;h1;h2;h3;pre',

          // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
          removeDialogTabs: 'image:advanced;link:advanced',

          // Define the list of styles which should be available in the Styles dropdown list.
          // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
          // (and on your website so that it rendered in the same way).
          // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
          // that file, which means one HTTP request less (and a faster startup).
          // For more information see http://docs.ckeditor.com/#!/guide/dev_styles

      });
    }
  },
  error:function(data){
    if(typeof CKEDITOR.instances['editor1'] != 'undefined') {
        CKEDITOR.instances['editor1'].updateElement();
        CKEDITOR.instances['editor1'].destroy();
    }
    $('#editor1').val(data.content)
    var editor1=CKEDITOR.replace('editor1', {
        // Define the toolbar: http://docs.ckeditor.com/#!/guide/dev_toolbar
        // The full preset from CDN which we used as a base provides more features than we need.
        // Also by default it comes with a 3-line toolbar. Here we put all buttons in a single row.
        skin:'office2013',


        // Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
        // One HTTP request less will result in a faster startup time.
        // For more information check http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-customConfig
        //customConfig: '',

        // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
        // For more information check:
        //  - About Advanced Content Filter: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
        //  - About Disallowed Content: http://docs.ckeditor.com/#!/guide/dev_disallowed_content
        //  - About Allowed Content: http://docs.ckeditor.com/#!/guide/dev_allowed_content_rules
        disallowedContent: 'img{width,height,float}',
        extraAllowedContent: 'img[width,height,align]',


        /*********************** File management support ***********************/
        // In order to turn on support for file uploads, CKEditor has to be configured to use some server side
        // solution with file upload/management capabilities, like for example CKFinder.
        // For more information see http://docs.ckeditor.com/#!/guide/dev_ckfinder_integration

        // Uncomment and correct these lines after you setup your local CKFinder instance.
        // filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
        // filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        /*********************** File management support ***********************/

        // Make the editing area bigger than default.
        height: 800,

        // An array of stylesheets to style the WYSIWYG area.
        // Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
         contentsCss: ['{{asset('assets/pages/ckeditor/document.css')}}'],

        // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
        bodyClass: 'document-editor',

        // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
        format_tags: 'p;h1;h2;h3;pre',

        // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
        removeDialogTabs: 'image:advanced;link:advanced',

        // Define the list of styles which should be available in the Styles dropdown list.
        // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
        // (and on your website so that it rendered in the same way).
        // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
        // that file, which means one HTTP request less (and a faster startup).
        // For more information see http://docs.ckeditor.com/#!/guide/dev_styles

    });
  }
  });
});
  var token=$('meta[name="csrf-token"]').attr('content');
 //  var options = {
 //   filebrowserImageBrowseUrl: '/filemanager?type=Images',
 //   filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+token,
 //   filebrowserBrowseUrl: '/filemanager?type=Files',
 //   filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+token,
 //
 // };
 // CKEDITOR.replace('editor1',options);


</script>
@endsection
