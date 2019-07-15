
@extends('layouts.master')
@section('title')
  Create Template Akta
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

@endsection
@section('atas')
  <div class="page-header">
      <div class="page-header-title">
          <h4>Tamplate Akta</h4>
      </div>
      <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="index.html">
                      <i class="">Pengaturan</i>
                  </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Tamplate Akta</a>
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
            <form action="{{route('akta.store')}}" method="post">
              <div class="form-group">
                <label for="">Nama Akta</label>
                <input type="text" class="form-control" id="" placeholder="Nama Akta" name="nama">
                <p class="help-block">Help text here.</p>
              </div>
              <div class="form-group">
                <label for="">Jenis Akta</label>
                <select class="form-control" name="jenis" required>
                  <option value="">--</option>
                  @foreach ($jenis as $key)
                    <option value="{{$key->id}}">{{$key->nama_jenis_akta}}</option>

                  @endforeach
                </select>
              </div>
              <textarea id="editor2" name="content">
              </textarea>
                  @csrf
                  <br>
<button type="submit" name="button" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
            </form>
          </div>
        </div>
      </div>

@endsection

@section('costumjs')
<script src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>

@endsection

@section('script')
<script type="text/javascript">

  var token=$('meta[name="csrf-token"]').attr('content');
 //  var options = {
 //   filebrowserImageBrowseUrl: '/filemanager?type=Images',
 //   filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+token,
 //   filebrowserBrowseUrl: '/filemanager?type=Files',
 //   filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+token,
 //
 // };
 // CKEDITOR.replace('editor1',options);

 CKEDITOR.replace('editor2', {
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
</script>
@endsection
