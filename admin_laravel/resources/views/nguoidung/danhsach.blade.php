@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý tài khoản</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm tài khoản</a>
          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Đại Diện</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Admin</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listnguoiDung as $nguoiDung)
                    <tr>
                        <td><img class="img-circle elevation-2" style="width:50px;height:50px;object-fit:cover" src="{{ $nguoiDung->AnhNen }}" alt=""> {{ $nguoiDung->TenDaiDien }}</td>
                        <td>{{ $nguoiDung->HovaTen }}</td>
                        <td>{{ $nguoiDung->Email }}</td>
                        <td>{{ $nguoiDung->SDT }}</td>
                        <td>
                            @if($nguoiDung->IsAdmin==1)
                              True
                            @else
                              False
                            @endif  
                        </td>
                        <td>
                            @if($nguoiDung->TrangThai==0)
                              <span class="badge bg-danger" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Khóa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                     
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit{{ $nguoiDung->id }}">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="btn-group">
                            <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $nguoiDung->id }}">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-edit{{ $nguoiDung->id }}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Cập nhật thông tin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body justify-content-between">
                                <form action="{{ route('nguoiDung.update', ['nguoiDung'=>$nguoiDung]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PATCH')
                                  <div class="form-group">
                                      <label class="col-form-label" for="TenDaiDien">Tên đại diện</label>
                                      <input type="text" class="form-control" id="TenDaiDien" name = "TenDaiDien" value="{{ $nguoiDung->TenDaiDien }}">
                                      @if($errors->has('TenDaiDien'))
                                          <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                                      @endif
                                  </div>
  
                                  <div class="form-group">
                                      <label class="col-form-label" for="HoTen">Họ và tên</label>
                                      <input type="text" class="form-control" id="HoTen" name = "HoTen" value="{{ $nguoiDung->HovaTen }}">
                                      @if($errors->has('HoTen'))
                                          <p style="color:red">{{ $errors->first('HoTen') }}</p>
                                      @endif
                                  </div>
  
                                  <div class="form-group">
                                      <label class="col-form-label" for="Email">Email</label>
                                      <input type="text" class="form-control" id="Email" name = "Email" value="{{ $nguoiDung->Email }}">
                                      @if($errors->has('Email'))
                                          <p style="color:red">{{ $errors->first('Email') }}</p>
                                      @endif
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-form-label" for="MatKhau">Mật khẩu (Hashed)</label>
                                      <input type="password" class="form-control" id="MatKhau" name = "MatKhau" value="{{ $nguoiDung->MatKhau }}">
                                      @if($errors->has('MatKhau'))
                                          <p style="color:red">{{ $errors->first('MatKhau') }}</p>
                                      @endif
                                  </div>
  
                                  <div class="form-group">
                                      <label class="col-form-label" for="SDT">Số điện thoại</label>
                                      <input type="text" class="form-control" id="SDT" name = "SDT" value="{{ $nguoiDung->SDT }}">
                                      @if($errors->has('SDT'))
                                          <p style="color:red">{{ $errors->first('SDT') }}</p>
                                      @endif
                                  </div>
  
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" name="checkIsAdmin" id="customCheckbox5" value="1" @if($nguoiDung->IsAdmin==1) checked @endif>
                                        <label for="customCheckbox5" class="custom-control-label">Là Admin</label>
                                    </div>
                                  </div>
  
                                  <div class="form-group">
                                      <label>Trạng thái</label>
                                      <select class="custom-select form-control-border border-width-2" id="TrangThai" name="TrangThai">
                                          <option @if($nguoiDung->TrangThai==1) selected @endif>Hoạt động</option>  
                                          <option @if($nguoiDung->TrangThai==0) selected @endif>Khóa</option>
                                      </select>
                                  </div>
  
                                  <div class="form-group">
                                      <div class="mb-3">
                                          <label for="hinh" class="form-label">Ảnh</label>
                                          <input onchange="showAnhEdit(this);" class="form-control" type="file" name="hinh" accept="image/*">
                                      </div>
                                      @if($errors->has('hinh'))
                                          <p style="color:red">{{ $errors->first('hinh') }}</p>
                                      @endif
                                  </div>
  
                                  <div id="ImgDivEdit" class="form-group">
                                      <img id="ImgEdit" src="{{ $nguoiDung->AnhNen }}" style="width:400px;height:250px">
                                  </div>
  
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="modal fade" id="modal-delete{{ $nguoiDung->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Xác nhận xóa dữ liệu này?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                              <form action="{{ route('nguoiDung.destroy', ['nguoiDung'=>$nguoiDung]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
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

<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Thêm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body justify-content-between">
            <form action="{{ route('nguoiDung.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label class="col-form-label" for="TenDaiDien">Tên đại diện</label>
                  <input type="text" class="form-control" name="TenDaiDien">
                  @if($errors->has('TenDaiDien'))
                      <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                  @endif
              </div>

              <div class="form-group">
                  <label class="col-form-label" for="HoTen">Họ và tên</label>
                  <input type="text" class="form-control" name="HoTen">
                  @if($errors->has('HoTen'))
                      <p style="color:red">{{ $errors->first('HoTen') }}</p>
                  @endif
              </div>

              <div class="form-group">
                  <label class="col-form-label" for="Email">Email</label>
                  <input type="text" class="form-control" name="Email">
                  @if($errors->has('Email'))
                      <p style="color:red">{{ $errors->first('Email') }}</p>
                  @endif
              </div>
              
              <div class="form-group">
                  <label class="col-form-label" for="MatKhau">Mật khẩu</label>
                  <input type="password" class="form-control" name="MatKhau">
                  @if($errors->has('MatKhau'))
                      <p style="color:red">{{ $errors->first('MatKhau') }}</p>
                  @endif
              </div>

              <div class="form-group">
                  <label class="col-form-label" for="SDT">Số điện thoại</label>
                  <input type="text" class="form-control" name="SDT">
                  @if($errors->has('SDT'))
                      <p style="color:red">{{ $errors->first('SDT') }}</p>
                  @endif
              </div>

              <div class="form-group">
                  <div class="custom-control custom-checkbox">
                      <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" name="checkIsAdmin" id="customCheckbox5" value="1">
                      <label for="customCheckbox5" class="custom-control-label">Là Admin</label>
                  </div>
              </div>

              <div class="form-group">
                  <label>Trạng thái</label>
                  <select class="custom-select form-control-border border-width-2" name="TrangThai">
                      <option>Hoạt động</option>  
                      <option>Khóa</option>
                  </select>
              </div>

              <div class="form-group">
                  <div class="mb-3">
                      <label for="hinh" class="form-label">Ảnh</label>
                      <input onchange="showAnhAdd(this);" class="form-control" type="file" name="hinh" accept="image/*">
                  </div>
                  @if($errors->has('hinh'))
                      <p style="color:red">{{ $errors->first('hinh') }}</p>
                  @endif
              </div>

              <div id="ImgDivAdd" class="form-group">
                  <img id="ImgAdd" style="width:400px;height:250px"/>
              </div>

              <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
          </div>
      </div>
  </div>
</div>
@endsection