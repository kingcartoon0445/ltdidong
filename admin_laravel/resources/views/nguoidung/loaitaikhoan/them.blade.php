@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm loại tài khoản</h1>
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
                            <form action="{{ route('loaiTaiKhoan.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="txtTenLoaiTaiKhoan">Tên loại tài khoản</label>
                                    <input type="text" class="form-control" name="txtTenLoaiTaiKhoan" placeholder="Nhập tên loại tài khoản...">
                                    @if($errors->has('txtTenLoaiTaiKhoan'))
                                        <p style="color:red">{{ $errors->first('txtTenLoaiTaiKhoan') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="txtTrangThai">
                                        <option>Hoạt động</option>  
                                        <option>Khóa</option>
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