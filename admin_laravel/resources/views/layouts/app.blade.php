<!DOCTYPE Html>
<Html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
  <!-- overlayScrollbars -->
  {{ Html::style('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}
  <!-- Theme style -->
  {{ Html::style('dist/css/adminlte.min.css') }}

  {{ Html::style('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
  {{ Html::style('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
  {{ Html::style('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}

  <!-- summernote -->
  {{ Html::style('plugins/summernote/summernote-bs4.min.css') }}
  <!-- CodeMirror -->
  {{ Html::style('plugins/codemirror/codemirror.css') }}
  {{ Html::style('plugins/codemirror/theme/monokai.css') }}
  <!-- SimpleMDE -->
  {{ Html::style('plugins/simplemde/simplemde.min.css') }}
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">Test</h3>
                <p class="text-sm">Test message...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">1 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 1 new messages
            <span class="float-right text-muted text-sm">4 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.Html" class="brand-link">
      <img src="{{ asset('dist/img/mainlogo.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Me</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>Quản lý bài viết <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dsbv') }}" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.Html" class="nav-link">
                  <i class="nav-icon fas fa-image"></i>
                  <p>Ảnh bài viết</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mountain"></i>
              <p>Quản lý địa danh <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.Html" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Danh sách địa danh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav.Html" class="nav-link">
                  <i class="nav-icon fas fa-image"></i>
                  <p>Ảnh địa danh</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.Html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Quản lý thể loại</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.Html" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>Quản lý miền</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="pages/widgets.Html" class="nav-link">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>Quản lý tiện ích</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.Html" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Quản lý tài khoản</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{ Html::script('plugins/jquery/jquery.min.js') }}
<!-- Bootstrap -->
{{ Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
<!-- overlayScrollbars -->
{{ Html::script('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}
<!-- AdminLTE App -->
{{ Html::script('dist/js/adminlte.js') }}
<!-- jQuery Mapael -->
{{ Html::script('plugins/jquery-mousewheel/jquery.mousewheel.js') }}
{{ Html::script('plugins/raphael/raphael.min.js') }}
{{ Html::script('plugins/jquery-mapael/jquery.mapael.min.js') }}
{{ Html::script('plugins/jquery-mapael/maps/usa_states.min.js') }}
<!-- ChartJS -->
{{ Html::script('plugins/chart.js/Chart.min.js') }}
<!-- AdminLTE for demo purposes -->
{{ Html::script('dist/js/demo.js') }}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{ Html::script('dist/js/pages/dashboard2.js') }}
<!-- DataTables  & Plugins -->
{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}
{{ Html::script('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}
{{ Html::script('plugins/jszip/jszip.min.js') }}
{{ Html::script('plugins/pdfmake/pdfmake.min.js') }}
{{ Html::script('plugins/pdfmake/vfs_fonts.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.html5.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.print.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.colVis.min.js') }}
<!-- Summernote -->
{{ Html::script('plugins/summernote/summernote-bs4.min.js') }}
<!-- CodeMirror -->
{{ Html::script('plugins/codemirror/codemirror.js') }}
{{ Html::script('plugins/codemirror/mode/css/css.js') }}
{{ Html::script('plugins/codemirror/mode/xml/xml.js') }}
{{ Html::script('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}
<!-- AdminLTE for demo purposes -->
{{ Html::script('dist/js/demo.js') }}
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#txtNoiDung').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</Html>