@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Người dùng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý tài khoản</li>
            <li class="breadcrumb-item active">Người dùng</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('nguoidung.create') }}" type="button" class="btn btn-success">Thêm tài khoản</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ảnh Đại Diện</th>
                    <th>Tên Đại Diện</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Mật Khẩu</th>
                    <th>SĐT</th>
                    <th>Loại tài khoản</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listnguoiDung as $nguoiDung)
                    <tr>
                        <td>{{ $nguoiDung->id }}</td>
                        <td>{{ $nguoiDung->AnhNen }}</td>
                        <td>{{ $nguoiDung->TenDaiDien }}</td>
                        <td>{{ $nguoiDung->HovaTen }}</td>
                        <td>{{ $nguoiDung->Email }}</td>
                        <td>{{ $nguoiDung->MatKhau }}</td>
                        <td>{{ $nguoiDung->SDT }}</td>
                        <td>@if($nguoiDung->IsAdmin==1) 
                                Admin 
                            @else 
                                User
                            @endif
                        </td>
                        <td>
                            @if($nguoiDung->TrangThai==0)
                              <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Khóa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                     
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('nguoidung.edit', $nguoiDung) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                  @endforeach
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