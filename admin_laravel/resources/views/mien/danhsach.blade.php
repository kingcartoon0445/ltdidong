@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý miền</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý miền</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('mien.create') }}" type="button" class="btn btn-success">Thêm miền</a>

          <!-- Danh sách bài viết -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên miền</th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian cập nhật</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listMien as $mien)
                    <tr>
                        <td>{{ $mien->id }}</td>
                        <td>{{ $mien->TenMien }}</td>
                        <td>{{ $mien->created_at }}</td>
                        <td>{{ $mien->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('mien.edit', $mien) }}" type="button" class="btn btn-warning">
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