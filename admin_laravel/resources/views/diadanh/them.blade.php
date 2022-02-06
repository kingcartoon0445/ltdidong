@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm địa danh</h1>
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
                                <form action="{{ route('diaDanh.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="Ten">Tên</label>
                                      <input type="text" class="form-control" style="width:100%;" name="Ten">
                                      @if($errors->has('Ten'))
                                          <p style="color:red">{{ $errors->first('Ten') }}</p>
                                      @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Miền</label>
                                        <select class="custom-select form-control-border border-width-2" name="MaMien">
                                            @foreach($listMien as $mien)
                                                <option value="{{ $mien->id }}">{{ $mien->TenMien }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('MaMien'))
                                            <p style="color:red">{{ $errors->first('MaMien') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thể loại du lịch</label>
                                        <select class="js-example-basic-multiple" style="width: 100%;" name="theloais[]" multiple="multiple">
                                          @foreach($listTheLoai as $theLoai)
                                            <option value="{{ $theLoai->id }}">{{ $theLoai->Ten }}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('theloais'))
                                          <p style="color:red">{{ $errors->first('theloais') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="KinhDo">Kinh độ</label>
                                        <input type="text" class="form-control" name="KinhDo">
                                        @if($errors->has('KinhDo'))
                                            <p style="color:red">{{ $errors->first('KinhDo') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="ViDo">Vĩ độ</label>
                                        <input type="text" class="form-control" name="ViDo">
                                        @if($errors->has('ViDo'))
                                            <p style="color:red">{{ $errors->first('ViDo') }}</p>
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
                                        <label for="MoTa">Mô tả</label>
                                        <textarea class="form-control" name="MoTa" rows="5" style="font-size: 16px"></textarea>
                                        @if($errors->has('MoTa'))
                                            <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                            <option value="1">Hoạt động</option>  
                                            <option value="0">Đóng cửa</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="hinh" class="form-label">Ảnh bìa</label>
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
                                    
                                    <div class="form-group">
                                      <label>Các ảnh con</label>
                                      <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                                    </div>
                                    
                                    <div class="btn-group">
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection