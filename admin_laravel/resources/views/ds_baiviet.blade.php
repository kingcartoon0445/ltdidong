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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#themBV">
            Thêm bài viết
          </button>

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
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#suaBV">
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
<div class="modal fade" id="themBV">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thêm bài viết</h4>
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
                <label class="col-form-label" for="txtTieuDe">Tiêu đề</label>
                <input type="text" class="form-control" id="txtTieuDe" name = "txtTieuDe" placeholder="Nhập tiêu đề...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtNoiDung">Nội dung</label>
                <textarea class="form-control" id="txtNoiDung" name="txtNoiDung" rows="3" placeholder="Nhập nội dung..."></textarea>
              </div>

              <div class="form-group">
                <label>Địa danh</label>
                <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                  <option>Địa danh 1</option>
                  <option>Địa danh 2</option>
                  <option>Địa danh 3</option>
                </select>
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Chờ duyệt</option>
                  <option>Ẩn</option>
                </select>
              </div>

              <div class="form-group">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Ảnh</label>
                  <input onchange="showAnh_ThemBV(this);" class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div id="themBV_ImgDiv" class="form-group">
                <img id="themBV_Img"/>
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
<div class="modal fade" id="suaBV">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sửa thông tin bài viết</h4>
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
                <label class="col-form-label" for="txtTieuDe">Tiêu đề</label>
                <input type="text" class="form-control" id="txtTieuDe" name = "txtTieuDe" placeholder="Nhập tiêu đề...">
              </div>

              <div class="form-group">
                <label class="col-form-label" for="txtNoiDung">Nội dung</label>
                <textarea class="form-control" id="txtNoiDung" name="txtNoiDung" rows="3" placeholder="Nhập nội dung..."></textarea>
              </div>

              <div class="form-group">
                <label>Địa danh</label>
                <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                  <option>Địa danh 1</option>
                  <option>Địa danh 2</option>
                  <option>Địa danh 3</option>
                </select>
              </div>

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                  <option>Hoạt động</option>  
                  <option>Chờ duyệt</option>
                  <option>Ẩn</option>
                </select>
              </div>

              <div class="form-group">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Ảnh</label>
                  <input onchange="showAnh_SuaBV(this);" class="form-control" type="file" id="formFile">
                </div>
              </div>

              <div id="suaBV_ImgDiv" class="form-group">
                <img id="suaBV_Img"/>
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