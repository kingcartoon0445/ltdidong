@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cập nhật thông tin</h1>
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
                                <form action="{{ route('nguoiDung.update', ['nguoiDung'=>$nguoiDung]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                      <label for="TenDaiDien">Tên đại diện</label>
                                      <input type="text" class="form-control" name="TenDaiDien" value="{{ $nguoiDung->TenDaiDien }}">
                                      @if($errors->has('TenDaiDien'))
                                          <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                                      @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="HoTen">Họ và tên</label>
                                        <input type="text" class="form-control" name="HoTen" value="{{ $nguoiDung->HovaTen }}">
                                        @if($errors->has('HoTen'))
                                            <p style="color:red">{{ $errors->first('HoTen') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="text" class="form-control" name="Email" value="{{ $nguoiDung->Email }}">
                                        @if($errors->has('Email'))
                                            <p style="color:red">{{ $errors->first('Email') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="MatKhau">Mật khẩu (Hashed)</label>
                                        <input type="password" class="form-control" name="MatKhau" value="{{ $nguoiDung->MatKhau }}">
                                        @if($errors->has('MatKhau'))
                                            <p style="color:red">{{ $errors->first('MatKhau') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="SDT">Số điện thoại</label>
                                        <input type="text" class="form-control" name="SDT" value="{{ $nguoiDung->SDT }}">
                                        @if($errors->has('SDT'))
                                            <p style="color:red">{{ $errors->first('SDT') }}</p>
                                        @endif
                                    </div>
                              
                                    <div class="form-group">
                                      <label>Chức vụ</label>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="checkIsAdmin" value="1" @if($nguoiDung->IsAdmin==1) checked @endif>
                                          Là Admin
                                        </label>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                            <option value="1" @if($nguoiDung->TrangThai==1) selected @endif>Hoạt động</option>  
                                            <option value="0" @if($nguoiDung->TrangThai==0) selected @endif>Khóa</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label>Ảnh đại diện</label>
                                      <input onchange="showAnhEdit(this);" class="file-upload-default" type="file" name="hinh" accept="image/*">
                                      <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
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
            </div>
        </section>
    </div>
@endsection