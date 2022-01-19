<!DOCTYPE Html>
<Html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>

  {{ Html::style('plugins/bootstrap-5/css/bootstrap.min.css') }}
  {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
  {{ Html::style('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}
  {{ Html::style('dist/css/adminlte.min.css') }}
  {{ Html::style('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}
  {{ Html::style('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}
  {{ Html::style('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}
  {{ Html::style('plugins/codemirror/theme/monokai.css') }}
  {{ Html::style('plugins/simplemde/simplemde.min.css') }}
  {{ Html::style('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}
  {{ Html::style('plugins/toastr/toastr.min.css') }}
  {{ Html::style('dist/css/detail.css') }}
  {{ Html::style('dist/css/multi-slide.css') }}
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" role="button">
          Logout  <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
                </li>

    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('dist/img/mainlogo.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ $LoggedUserInfo->AnhNen }}" class="img-circle elevation-2" style="object-fit:cover" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{ $LoggedUserInfo->TenDaiDien }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/baiviet/danhsach" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>Bài viết</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mountain"></i>
              <p>Địa danh <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('diaDanh.index') }}" class="nav-link">
                  <p>Địa danh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mien.index') }}" class="nav-link">
                  <p>Miền</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('theLoai.index') }}" class="nav-link">
                  <p>Loại du lịch</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>Tiện ích <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tienIch.index') }}" class="nav-link">
                  <p>Tiện ích</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <p>Loại tiện ích</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('nguoiDung.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Tài khoản</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  @yield('content')
</div>

{{ Html::script('plugins/bootstrap-5/js/bootstrap.bundle.min.js') }}
{{ Html::script('plugins/jquery/jquery.min.js') }}
{{ Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
{{ Html::script('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}
{{ Html::script('dist/js/adminlte.js') }}
{{ Html::script('plugins/jquery-mousewheel/jquery.mousewheel.js') }}
{{ Html::script('plugins/raphael/raphael.min.js') }}
{{ Html::script('plugins/jquery-mapael/jquery.mapael.min.js') }}
{{ Html::script('plugins/jquery-mapael/maps/usa_states.min.js') }}
{{ Html::script('plugins/chart.js/Chart.min.js') }}
{{ Html::script('dist/js/pages/dashboard2.js') }}
{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}
{{ Html::script('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.html5.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.print.min.js') }}
{{ Html::script('plugins/datatables-buttons/js/buttons.colVis.min.js') }}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  function showAnhAdd(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#ImgAdd').attr('src', e.target.result);
          $('#ImgDivAdd').height(250);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }

  function showAnhEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#ImgEdit').attr('src', e.target.result);
          $('#ImgDivEdit').height(250);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
</body>
</Html>