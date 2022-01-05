@extends('layouts.app')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DanhSach</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Form nhập -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thêm bài viết</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label class="col-form-label" for="txtTieuDe">Tiêu đề</label>
                    <input type="text" class="form-control" id="txtTieuDe" name = "txtTieuDe" placeholder="Nhập tiêu đề...">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label" for="txtNoiDung">Nội dung</label>
                    <textarea class="form-control" id="txtNoiDung" name="txtNoiDung" rows="3">Nhập nội dung...</textarea>
                  </div>
                  <!-- input states
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                      success</label>
                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                      error</label>
                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                  </div>
                  -->

                  <!--
                    <div class="form-group">
                        <label>Select Multiple</label>
                        <select multiple class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                    </div>

                <div class="form-group">
                  <label>Người đăng</label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                    <option>Người đăng 1</option>
                    <option>Người đăng 2</option>
                    <option>Người đăng 3</option>
                  </select>
                </div>
                -->

                <div class="form-group">
                  <label>Địa danh</label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                    <option>Địa danh 1</option>
                    <option>Địa danh 2</option>
                    <option>Địa danh 3</option>
                  </select>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- Danh sách bài viết -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                                <span class="badge bg-danger">Không chấp thuận</span>
                                <span class="badge bg-warning">Chờ duyệt</span>
                            -->
                            <span class="badge bg-success">Hoạt động</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a type="button" class="btn btn-warning">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>