<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
  {{ Html::style('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
  {{ Html::style('dist/css/adminlte.min.css') }}
</head>

<body class="hold-transition login-page">
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Reset Password</b></a>
      </div>
      <div class="card-body">
        <form action="{{ route('reset-password', $data->token) }}" method="post">
            @if(Session::get('success'))
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
            @endif

          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="Email" value="{{$data->email}}" readonly>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
            @if($errors->has('Email'))
              <p style="color:red">{{ $errors->first('Email') }}</p>
            @endif
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="New Password" name="MatKhau">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
            @if($errors->has('MatKhau'))
              <p style="color:red">{{ $errors->first('MatKhau') }}</p>
            @endif
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{ Html::script('plugins/jquery/jquery.min.js') }}
  {{ Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') }}
  {{ Html::script('dist/js/adminlte.min.js') }}
</body>
</html>
