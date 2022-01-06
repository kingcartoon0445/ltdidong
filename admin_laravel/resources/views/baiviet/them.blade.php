@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm bài viết</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
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
                                    <input onchange="showAnh(this);" class="form-control" type="file" id="formFile">
                                    </div>
                                </div>

                                <div id="ImgDiv" class="form-group">
                                    <img id="Img"/>
                                </div>

                                <button type="button" class="btn btn-primary">Save changes</button>
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