@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý tiện ích</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý tiện ích</li>
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
          <a href="/tienich/them" type="button" class="btn btn-success">Thêm tiện ích</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Loại Tiện Ích</th>
                    <th>Địa Chỉ</th>
                    <th>Mô Tả</th>
                    <th>Số Điện Thoại</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 20; $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>Tên {{ $i+1 }}</td>
                        <td>Loại tiện ích {{ $i+1 }}</td>
                        <td>Địa chỉ {{ $i+1 }}</td>
                        <td>Mô tả {{ $i+1 }}</td>
                        <td>SĐT {{ $i+1 }}</td>
                        <td>
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/tienich/sua" type="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
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