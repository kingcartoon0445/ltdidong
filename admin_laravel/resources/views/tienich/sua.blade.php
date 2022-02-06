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
                                <form action="{{ route('tienIch.update', ['tienIch'=>$tienIch]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
  
                                    <div class="form-group">
                                      <label for="TenDaiDien">Tên đại diện</label>
                                      <input type="text" class="form-control" name="TenDaiDien" value="{{ $tienIch->Ten }}">
                                      @if($errors->has('TenDaiDien'))
                                          <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="MaDiaDanh">Thuộc địa danh</label>
                                      <select class="custom-select form-control-border border-width-2" name="MaDiaDanh">
                                          @foreach($listDiaDanh as $diaDanh)
                                              <option value="{{ $diaDanh->id }}"
                                                @foreach($listCoTienIch as $coTienIch)
                                                  @if($coTienIch->MaTienIch == $tienIch->id)
                                                      @if($coTienIch->MaDiaDanh == $diaDanh->id)
                                                        selected
                                                      @endif
                                                  @endif
                                                @endforeach
                                              >{{ $diaDanh->Ten }}</option>
                                          @endforeach
                                      </select>
                                      @if($errors->has('MaDiaDanh'))
                                          <p style="color:red">{{ $errors->first('MaDiaDanh') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="DiaChi">Địa chỉ</label>
                                      <input type="text" class="form-control" name="DiaChi" value="{{ $tienIch->DiaChi }}">
                                      @if($errors->has('DiaChi'))
                                          <p style="color:red">{{ $errors->first('DiaChi') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="Loai">Loại tiện ích</label>
                                      <select class="custom-select form-control-border border-width-2" name="Loai">
                                        <option value="Khách sạn" @if($tienIch->Loai=='Khách sạn') selected @endif>Khách sạn</option>
                                        <option value="Nhà hàng" @if($tienIch->Loai=='Nhà hàng') selected @endif>Nhà hàng</option>
                                      </select>
                                      @if($errors->has('Loai'))
                                          <p style="color:red">{{ $errors->first('Loai') }}</p>
                                      @endif
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="SDT">Số điện thoại</label>
                                      <input type="text" class="form-control" name="SDT" value="{{ $tienIch->SDT }}">
                                      @if($errors->has('SDT'))
                                          <p style="color:red">{{ $errors->first('SDT') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="MoTa">Mô tả</label>
                                      <textarea class="form-control" name="MoTa" rows="10">{{ $tienIch->MoTa }}</textarea>
                                      @if($errors->has('MoTa'))
                                          <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                      @endif
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="TrangThai">Trạng thái</label>
                                      <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                          <option @if($tienIch->TrangThai==1) selected @endif>Hoạt động</option>  
                                          <option @if($tienIch->TrangThai==0) selected @endif>Đóng cửa</option>
                                      </select>
                                    </div>
                    
                                    <div class="form-group">
                                      <label for="hinh">Ảnh đại diện</label>
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
                                      <img id="ImgEdit" src="{{ $tienIch->Anh }}" style="width:400px;height:250px"/>
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