@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Loại tài khoản</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý tài khoản</li>
            <li class="breadcrumb-item active">Loại tài khoản</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('loaiTaiKhoan.create') }}" type="button" class="btn btn-success">Thêm loại tài khoản</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên loại tài khoản</th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian cập nhật</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listLoaiTK as $loaiTaiKhoan)
                    <tr>
                        <td>{{ $loaiTaiKhoan->TenLoaiTK }}</td>
                        <td>{{ $loaiTaiKhoan->created_at }}</td>
                        <td>{{ $loaiTaiKhoan->updated_at }}</td>
                        <td>
                            @if($loaiTaiKhoan->TrangThai==0)
                              <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Khóa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                     
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('loaiTaiKhoan.edit', ['loaiTaiKhoan'=>$loaiTaiKhoan]) }}" type="button" class="btn btn-warning">
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