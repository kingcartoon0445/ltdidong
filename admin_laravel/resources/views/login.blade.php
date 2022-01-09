<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  {{ Html::style('plugins/fontawesome-free/css/all.min.css') }}
  {{ Html::style('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
  {{ Html::style('dist/css/adminlte.min.css') }}
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Admin</b></h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
