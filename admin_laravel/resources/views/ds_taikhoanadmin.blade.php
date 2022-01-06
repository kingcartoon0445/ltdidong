@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý tài khoản</li>
              <li class="breadcrumb-item active">Admin</li>
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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#themTKUser">
            Thêm tài khoản
          </button>

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
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 20; $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>Hình {{ $i+1 }}</td>
                        <td>Tên đại diện {{ $i+1 }}</td>
                        <td>Họ và tên {{ $i+1 }}</td>
                        <td>Email {{ $i+1 }}</td>
                        <td>Mật khẩu {{ $i+1 }}</td>
                        <td>SĐT {{ $i+1 }}</td>
                        <td>
                            <!--
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            <span class="badge bg-warning" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Chờ duyệt</h6></span>
                            <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Ẩn</h6></span>
                            -->
                            <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>                        </td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#suaTKUser">
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
<div class="modal fade" id="themTKUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm tài khoản admin</h4>
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
                <label class="col-form-label" for="txtTDD">Tên Đại Diện</label>
                <input type="text" class="form-control" id="txtTenDaiDien" name = "txtTenDaiDien" placeholder="Nhập tên đại diện...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtHoTen">Họ Và Tên</label>
                <input type="text" class="form-control" id="txtHoTen" name = "txtHoTen" placeholder="Nhập họ và tên...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtEmail">Email</label>
                <input type="text" class="form-control" id="txtEmail" name = "txtEmail" placeholder="Nhập email...">
              </div>
              
              <div class="form-group">
                <label class="col-form-label" for="txtMatKhau">Mật Khẩu</label>
                <input type="text" class="form-control" id="txtMatKhau" name = "txtMatKhau" placeholder="Nhập mật khẩu...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtSDT">Số Điện Thoại</label>
                <input type="text" class="form-control" id="txtSDT" name = "txtSDT" placeholder="Nhập số điện thoại...">
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Khóa</option>
                </select>
              </div>

              <div class="form-group">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Ảnh</label>
                  <input onchange="showAnh_ThemTKAdmin(this);" class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div id="themTKAdmin_ImgDiv" class="form-group">
                <img id="themTKAdmin_Img"/>
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
<div class="modal fade" id="suaTKUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sửa thông tin tài khoản admin</h4>
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
                <label class="col-form-label" for="txtTDD">Tên Đại Diện</label>
                <input type="text" class="form-control" id="txtTenDaiDien" name = "txtTenDaiDien" placeholder="Nhập tên đại diện...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtHoTen">Họ Và Tên</label>
                <input type="text" class="form-control" id="txtHoTen" name = "txtHoTen" placeholder="Nhập họ và tên...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtEmail">Email</label>
                <input type="text" class="form-control" id="txtEmail" name = "txtEmail" placeholder="Nhập email...">
              </div>
              
              <div class="form-group">
                <label class="col-form-label" for="txtMatKhau">Mật Khẩu</label>
                <input type="text" class="form-control" id="txtMatKhau" name = "txtMatKhau" placeholder="Nhập mật khẩu...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtSDT">Số Điện Thoại</label>
                <input type="text" class="form-control" id="txtSDT" name = "txtSDT" placeholder="Nhập số điện thoại...">
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Khóa</option>
                </select>
              </div>

              <div class="form-group">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Ảnh</label>
                  <input onchange="showAnh_SuaTKAdmin(this);" class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div id="suaTKAdmin_ImgDiv" class="form-group">
                <img id="suaTKAdmin_Img"/>
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