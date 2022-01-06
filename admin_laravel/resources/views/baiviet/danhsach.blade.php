@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý bài viết</li>
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
          <a href="/baiviet/them" type="button" class="btn btn-success">Thêm bài viết</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ảnh </th>
                    <th>Tiêu Đề</th>
                    <th>Nội dung</th>
                    <th>Địa danh</th>
                    <th>Người đăng</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 20; $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>Hình {{ $i+1 }}</td>
                        <td>Tiêu đề {{ $i+1 }}</td>
                        <td>Nội dung {{ $i+1 }}</td>
                        <td>Địa danh {{ $i+1 }}</td>
                        <td>User {{ $i+1 }}</td>
                        <td>
                            <!--
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            <span class="badge bg-warning" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Chờ duyệt</h6></span>
                            <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Ẩn</h6></span>
                            -->
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/baiviet/sua" type="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection