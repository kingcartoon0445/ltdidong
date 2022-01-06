@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin địa danh</h1>
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
                          <form action="" method="post">
                            <div class="form-group">
                                <label class="col-form-label" for="txtTenMien">Tên địa danh</label>
                                <input type="text" class="form-control" id="txtTenDiaDanh" name = "txtTenDiaDanh" placeholder="Nhập tên địa danh...">
                            </div>

                            <div class="form-group">
                                <label>Miền</label>
                                <select class="custom-select form-control-border border-width-2" id="txtMaMien" name="txtMaMien">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                </select>
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