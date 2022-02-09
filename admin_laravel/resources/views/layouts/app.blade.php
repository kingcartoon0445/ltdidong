<!DOCTYPE Html>
<Html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>
  
  {{ Html::style("skydash/vendors/mdi/css/materialdesignicons.min.css") }}
  {{ Html::style("skydash/vendors/feather/feather.css") }}
  {{ Html::style("skydash/vendors/ti-icons/css/themify-icons.css") }}
  {{ Html::style("skydash/vendors/css/vendor.bundle.base.css") }}

  {{ Html::style("skydash/css/vertical-layout-light/style.css") }}
  {{ Html::style("skydash/vendors/select2/select2.min.css") }}
  
  {{ Html::style("plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}
  {{ Html::style("plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}
  {{ Html::style("plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}
  {{ Html::style("plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css") }}

  {{ Html::style("dist/css/detail.css") }}
  {{ Html::style("dist/css/multi-slide.css") }}
</head>
<body class="sidebar-dark">
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/"><img src="{{ asset('skydash/images/logoxanh.png') }}" class="mr-10" alt="logo" style="width: 80px; height:80px"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ $LoggedUserInfo->AnhNen }}"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('baiViet.index') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Bài viết</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Địa danh</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('diaDanh.index') }}">Địa danh</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('mien.index') }}">Miền</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('theLoai.index') }}">Loại du lịch</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('tienIch.index') }}">
              <i class="mdi mdi-food menu-icon"></i>
              <span class="menu-title">Tiện ích</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('nguoiDung.index') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Tài khoản</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-cup menu-icon"></i>
                <span class="menu-title">Khu vực rác</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('baiVietIndex') }}">Bài viết</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('diaDanhIndex') }}">Địa danh</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('mienIndex') }}">Miền</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('theLoaiIndex') }}">Loại du lịch</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('tienIchIndex') }}">Tiện ích</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('nguoiDungIndex') }}">Tài khoản</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-panel">
        @yield('content')
      </div>
    </div>   
  </div>

  {{ Html::script("skydash/vendors/js/vendor.bundle.base.js") }}
  {{ Html::script("skydash/vendors/chart.js/Chart.min.js") }}
  {{ Html::script("skydash/js/hoverable-collapse.js") }}
  {{ Html::script("skydash/js/Chart.roundedBarCharts.js") }}
  {{ Html::script("skydash/vendors/chart.js/Chart.min.js") }}
  {{ Html::script("skydash/js/file-upload.js") }}
  {{ Html::script("skydash/js/template.js") }}

  {{ Html::script("skydash/vendors/select2/select2.min.js") }}
  {{ Html::script("skydash/js/select2.js") }}
  
  <!-- Chart editor-->
  {{ Html::script("skydash/js/chart.js") }}
  
  {{ Html::script("plugins/datatables/jquery.dataTables.min.js") }}
  {{ Html::script("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}
  {{ Html::script("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}
  {{ Html::script("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}
  {{ Html::script("plugins/datatables-buttons/js/dataTables.buttons.min.js") }}
  {{ Html::script("plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js") }}
  
  {{ Html::script("dist/js/multi-slide.js") }}

  {{ Html::script("ckeditor/ckeditor.js") }}

  <script>
    	ClassicEditor.create( document.querySelector('.editor'), {licenseKey: '',} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 6psx97ta6i9h-fxxp4hao3qfu' );
				console.error( error );
			});

    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
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