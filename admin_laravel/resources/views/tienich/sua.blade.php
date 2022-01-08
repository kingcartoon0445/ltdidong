@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin tiện ích</h1>
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
                            <div class="form-group">
                                <label class="col-form-label" for="txtTenTienIch">Tên</label>
                                <input type="text" class="form-control" id="txtTenTienIch" name="txtTenTienIch">
                            </div>

                            <div class="form-group">
                                <label>Loại Tiện Ích</label>
                                <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                <option>Ăn uống</option>
                                <option>Khu dừng chân</option>
                                <option>Khách sạn</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="txtDiaChi">Địa Chỉ</label>
                                <input type="text" class="form-control" id="txtDiaChi" name="txtDiaChi">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="txtSDTTienIch">Số Điện Thoại</label>
                                <input type="text" class="form-control" id="txtSDTTienIch" name="txtSDTTienIch">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="txtMotaTienich">Mô Tả</label>
                                <textarea class="form-control" id="txtMotaTienich" name="txtMotaTienich" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="custom-select form-control-border border-width-2" id="txtTrangThai" name="txtTrangThai">
                                <option>Hoạt động</option>
                                <option>Đóng cửa</option>
                                </select>
                            </div>

                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection