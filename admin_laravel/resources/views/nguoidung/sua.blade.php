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
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="col-form-label" for="txtTDD">Tên đại diện</label>
                                    <input type="text" class="form-control" id="txtTenDaiDien" name = "txtTenDaiDien" placeholder="Nhập tên đại diện...">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtHoTen">Họ và tên</label>
                                    <input type="text" class="form-control" id="txtHoTen" name = "txtHoTen" placeholder="Nhập họ và tên...">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtEmail">Email</label>
                                    <input type="text" class="form-control" id="txtEmail" name = "txtEmail" placeholder="Nhập email...">
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="txtMatKhau">Mật khẩu</label>
                                    <input type="text" class="form-control" id="txtMatKhau" name = "txtMatKhau" placeholder="Nhập mật khẩu...">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="txtSDT">Số điện thoại</label>
                                    <input type="text" class="form-control" id="txtSDT" name = "txtSDT" placeholder="Nhập số điện thoại...">
                                </div>

                                <div class="form-group">
                                    <label>Loại tài khoản</label>
                                    <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                                    <option>Admin</option>  
                                    <option>User</option>
                                    </select>
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
                                        <input onchange="showAnh(this);" class="form-control" type="file" id="formFile">
                                    </div>
                                </div>

                                <div id="ImgDiv" class="form-group">
                                    <img id="Img"/>
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
          $('#Img').attr('src', e.target.result).width(725).height(450);
          $('#ImgDiv').height(450);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection