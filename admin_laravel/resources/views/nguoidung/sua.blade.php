@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin tài khoản</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                                    <label class="col-form-label" for="MatKhau">Mật khẩu @if($nguoiDung->IsAdmin==0) (Hashed) @endif</label>
                                    <input type="text" class="form-control" id="MatKhau" name = "MatKhau" value="{{ $nguoiDung->MatKhau }}" @if($nguoiDung->IsAdmin==0) readonly @endif>
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

                                @if($nguoiDung->IsAdmin==1)
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" name="checkIsAdmin" id="customCheckbox5" value="1" @if($nguoiDung->IsAdmin)==1 checked @endif>
                                            <label for="customCheckbox5" class="custom-control-label">Là Admin</label>
                                        </div>
                                    </div>
                                @endif

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
                                        <input onchange="showAnh(this);" class="form-control" type="file" name="hinh" accept="image/*">
                                    </div>
                                    @if($errors->has('hinh'))
                                        <p style="color:red">{{ $errors->first('hinh') }}</p>
                                    @endif
                                </div>

                                <div id="ImgDiv" class="form-group">
                                    <img id="Img" src="{{ $nguoiDung->AnhNen }}" style="width:300px;max-height:300px">
                                </div>

                                <button type="submit" class="btn btn-primary">Save changes</button>
                                
                                @if($nguoiDung->Email!='admin@gmail.com')
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-delete">
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
@endsection