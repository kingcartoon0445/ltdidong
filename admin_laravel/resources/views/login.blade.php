<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <link rel="stylesheet" href="./skydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="./skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./skydash/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./skydash/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="./skydash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./skydash/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="{{ route('check') }}" method="post">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="Email">
                    @if($errors->has('Email'))
                        <p style="color:red">{{ $errors->first('Email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="MatKhau">
                    @if($errors->has('MatKhau'))
                        <p style="color:red">{{ $errors->first('MatKhau') }}</p>
                    @endif
                </div>
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./skydash/vendors/js/vendor.bundle.base.js"></script>
  <script src="./skydash/js/off-canvas.js"></script>
  <script src="./skydash/js/hoverable-collapse.js"></script>
  <script src="./skydash/js/template.js"></script>
  <script src="./skydash/js/settings.js"></script>
  <script src="./skydash/js/todolist.js"></script>
</body>
</html>
