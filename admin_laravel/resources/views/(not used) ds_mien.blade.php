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
                    <th>Mã Miền</th>
                    <th>Kinh Độ</th>
                    <th>Vĩ Độ</th>
                    <th>Mô Tả</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 20; $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>Tên miền {{ $i+1 }}</td>
                        <td>Mã miền {{ $i+1 }}</td>
                        <td>Kinh độ {{ $i+1 }}</td>
                        <td>Vĩ độ {{ $i+1 }}</td>
                        <td>Mô tả {{ $i+1 }}</td>
                        <td>
                            <!--
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            <span class="badge bg-warning" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Chờ duyệt</h6></span>
                            <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Ẩn</h6></span>
                            -->
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>                        </td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#suaMien">
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

<!-- modal thêm -->
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
            <form>
              <div class="form-group">
                <label class="col-form-label" for="txtTenMien">Tên miền</label>
                <input type="text" class="form-control" id="txtTenMien" name = "txtTenMien" placeholder="Nhập tên miền...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtNoiDung">Mã miền</label>
                <input type="text" class="form-control" id="txtMaMien" name = "txtMaMien" placeholder="Nhập mã miền...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtKinhDo">Kinh độ</label>
                <input type="text" class="form-control" id="txtKinhDo" name = "txtKinhDo" placeholder="Nhập kinh độ...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtKinhDo">Vĩ độ</label>
                <input type="text" class="form-control" id="txtViDo" name = "txtViDo" placeholder="Nhập vĩ độ...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtMoTa">Mô tả</label>
                <textarea class="form-control" id="txtMoTa" name="txtMoTa" rows="3" placeholder="Nhập mô tả..."></textarea>
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Chờ duyệt</option>
                  <option>Ẩn</option>
                </select>
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

<!-- modal sửa -->
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
                <input type="text" class="form-control" id="txtTenMien" name = "txtTenMien" placeholder="Nhập tên miền...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtNoiDung">Mã miền</label>
                <input type="text" class="form-control" id="txtMaMien" name = "txtMaMien" placeholder="Nhập mã miền...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtKinhDo">Kinh độ</label>
                <input type="text" class="form-control" id="txtKinhDo" name = "txtKinhDo" placeholder="Nhập kinh độ...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtKinhDo">Vĩ độ</label>
                <input type="text" class="form-control" id="txtViDo" name = "txtViDo" placeholder="Nhập vĩ độ...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtMoTa">Mô tả</label>
                <textarea class="form-control" id="txtMoTa" name="txtMoTa" rows="3" placeholder="Nhập mô tả..."></textarea>
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Chờ duyệt</option>
                  <option>Ẩn</option>
                </select>
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
@endsection