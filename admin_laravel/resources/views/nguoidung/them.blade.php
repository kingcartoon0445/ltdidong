@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm tài khoản</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                                        <input onchange="showAnh(this);" class="form-control" type="file" name="hinh" accept="image/*">
                                    </div>
                                    @if($errors->has('hinh'))
                                        <p style="color:red">{{ $errors->first('hinh') }}</p>
                                    @endif
                                </div>

                                <div id="ImgDiv" class="form-group">
                                    <img id="Img" style="width:400px;height:250px"/>
                                </div>

                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection