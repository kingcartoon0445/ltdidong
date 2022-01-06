@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="container rounded mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="200px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Test</span></div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Tên Đại Diện</label><input type="text" class="form-control" placeholder="Tên đại diện..." value=""></div>
                                <div class="col-md-12"><label class="labels">Họ Tên</label><input type="text" class="form-control" placeholder="Họ tên..." value=""></div>
                                <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email..." value=""></div>
                                <div class="col-md-12"><label class="labels">Mật khẩu</label><input type="text" class="form-control" placeholder="Mật khẩu..." value=""></div>
                                <div class="col-md-12"><label class="labels">Số Điện Thoại</label><input type="text" class="form-control" placeholder="Số điện thoại..." value=""></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection