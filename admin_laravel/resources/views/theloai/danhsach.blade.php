@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý thể loại</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý thể loại</li>
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
          <a href="{{ route('theLoai.create') }}" type="button" class="btn btn-success">Thêm thể loại</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên thể loại</th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian cập nhật</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listTheLoai as $theLoai)
                    <tr>
                        <td>{{ $theLoai->Ten }}</td>
                        <td>{{ $theLoai->created_at }}</td>
                        <td>{{ $theLoai->updated_at }}</td>
                        <td>
                            @if($theLoai->TrangThai==0)
                              <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Khóa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                     
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('theLoai.edit', ['theLoai'=>$theLoai]) }}" type="button" class="btn btn-warning">
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
