@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#themMien">
            Thêm miền
          </button>

          <!-- Danh sách bài viết -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Miền</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listMien as $mien)
                    <tr>
                        <td>{{ $mien->id }}</td>
                        <td>{{ $mien->TenMien }}</td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#suaMien">
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

<!-- modal thêm -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="themMien">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm miền</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form nhập -->
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <label class="col-form-label" for="txtTenMien">Tên miền</label>
                  <input type="text" class="form-control" name="txtTenMien" placeholder="Nhập tên miền...">
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- modal sửa -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="suaMien">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sửa thông tin miền</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form nhập -->
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label class="col-form-label" for="txtTenMien">Tên miền</label>
                  <input type="text" class="form-control" name = "txtTenMien" placeholder="Nhập tên miền...">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection