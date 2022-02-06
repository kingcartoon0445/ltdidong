@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm tiện ích</h1>
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
                                <form action="{{ route('tienIch.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="TenDaiDien">Tên đại diện</label>
                                        <input type="text" class="form-control" name="TenDaiDien">
                                        @if($errors->has('TenDaiDien'))
                                            <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                                        @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="MaDiaDanh">Thuộc địa danh</label>
                                      <select class="custom-select form-control-border border-width-2" name="MaDiaDanh">
                                          @foreach($listDiaDanh as $diaDanh)
                                              <option value="{{ $diaDanh->id }}">{{ $diaDanh->Ten }}</option>
                                          @endforeach
                                      </select>
                                      @if($errors->has('MaDiaDanh'))
                                          <p style="color:red">{{ $errors->first('MaDiaDanh') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="DiaChi">Địa chỉ</label>
                                        <input type="text" class="form-control" name="DiaChi">
                                        @if($errors->has('DiaChi'))
                                            <p style="color:red">{{ $errors->first('DiaChi') }}</p>
                                        @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="Loai">Loại tiện ích</label>
                                      <select class="custom-select form-control-border border-width-2" name="Loai">
                                        <option value="Khách sạn">Khách sạn</option>
                                        <option value="Nhà hàng">Nhà hàng</option>
                                      </select>
                    
                                      @if($errors->has('Loai'))
                                          <p style="color:red">{{ $errors->first('Loai') }}</p>
                                      @endif
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="SDT">Số điện thoại</label>
                                      <input type="text" class="form-control" name="SDT">
                                      @if($errors->has('SDT'))
                                          <p style="color:red">{{ $errors->first('SDT') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="MoTa">Mô tả</label>
                                        <textarea class="form-control" name="MoTa" rows="10"></textarea>
                                        @if($errors->has('MoTa'))
                                            <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                        @endif
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="TrangThai">Trạng thái</label>
                                        <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                            <option>Hoạt động</option>  
                                            <option>Đóng cửa</option>
                                        </select>
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="hinh">Ảnh đại diện</label>
                                      <input onchange="showAnhAdd(this);" class="file-upload-default" type="file" name="hinh" accept="image/*">
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
                    
                                    <div id="ImgDivAdd" class="form-group">
                                      <img id="ImgAdd" style="width:400px;height:250px"/>
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