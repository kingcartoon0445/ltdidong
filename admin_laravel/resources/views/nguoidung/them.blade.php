@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm tài khoản</h1>
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
                            <form action="{{ route('nguoiDung.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="txtTenDaiDien">Tên đại diện</label>
                                    <input type="text" class="form-control" name="txtTenDaiDien">
                                    @if($errors->has('txtTenDaiDien'))
                                        <p style="color:red">{{ $errors->first('txtTenDaiDien') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtHoTen">Họ và tên</label>
                                    <input type="text" class="form-control" name="txtHoTen">
                                    @if($errors->has('txtHoTen'))
                                        <p style="color:red">{{ $errors->first('txtHoTen') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtEmail">Email</label>
                                    <input type="text" class="form-control" name="txtEmail">
                                    @if($errors->has('txtEmail'))
                                        <p style="color:red">{{ $errors->first('txtEmail') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="txtMatKhau">Mật khẩu</label>
                                    <input type="text" class="form-control" name="txtMatKhau">
                                    @if($errors->has('txtMatKhau'))
                                        <p style="color:red">{{ $errors->first('txtMatKhau') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtSDT">Số điện thoại</label>
                                    <input type="text" class="form-control" name="txtSDT">
                                    @if($errors->has('txtSDT'))
                                        <p style="color:red">{{ $errors->first('txtSDT') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" name="checkIsAdmin" id="customCheckbox5">
                                        <label for="customCheckbox5" class="custom-control-label">Là Admin</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="txtTrangThai">
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
                                    <img id="Img" style="width:725px;max-height:500px"/>
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

<script>
function showAnh(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#Img').attr('src', e.target.result);
          $('#ImgDiv').height(500);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection