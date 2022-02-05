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
                                <form action="{{ route('diaDanh.update', ['diaDanh'=>$diaDanh]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <label class="col-form-label" for="Ten">Tên</label>
                                        <input type="text" class="form-control" name="Ten" value="{{ $diaDanh->Ten }}">
                                        @if($errors->has('Ten'))
                                            <p style="color:red">{{ $errors->first('Ten') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Miền</label>
                                        <select class="custom-select form-control-border border-width-2" name="MaMien">
                                            @foreach($listMien as $mien)
                                                <option value="{{ $mien->id }}" @if($mien->id == $diaDanh->MaMien) selected @endif>{{ $mien->TenMien }}</option>
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
                                            <option value="{{ $theLoai->id }}" @foreach($selectedListTheLoai as $selected) @if($selected->MaTheLoai == $theLoai->id) selected="selected" @endif @endforeach>{{ $theLoai->Ten }}</option>
                                          @endforeach
                                        </select>
                                        @if($errors->has('theloais'))
                                          <p style="color:red">{{ $errors->first('theloais') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="KinhDo">Kinh độ</label>
                                        <input type="text" class="form-control" name="KinhDo" value="{{ $diaDanh->KinhDo }}">
                                        @if($errors->has('KinhDo'))
                                            <p style="color:red">{{ $errors->first('KinhDo') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="ViDo">Vĩ độ</label>
                                        <input type="text" class="form-control" name="ViDo" value="{{ $diaDanh->ViDo }}">
                                        @if($errors->has('ViDo'))
                                            <p style="color:red">{{ $errors->first('ViDo') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="DiaChi">Địa chỉ</label>
                                        <input type="text" class="form-control" name="DiaChi" value="{{ $diaDanh->DiaChi }}">
                                        @if($errors->has('DiaChi'))
                                            <p style="color:red">{{ $errors->first('DiaChi') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label" for="MoTa">Mô tả</label>
                                        <textarea class="form-control" name="MoTa" rows="10" style="font-size: 16px">{{ $diaDanh->MoTa }}</textarea>
                                        @if($errors->has('MoTa'))
                                            <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                            <option value="1" @if($diaDanh->TrangThai==1) selected @endif>Hoạt động</option>  
                                            <option value="0" @if($diaDanh->TrangThai==0) selected @endif>Đóng cửa</option>
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

                                    <div id="ImgDivEdit" class="form-group">
                                        <img id="ImgEdit" src="{{ $diaDanh->AnhBia }}" style="width:400px;height:250px"/>
                                    </div>

                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="hinh" class="form-label">Các ảnh con</label>
                                            <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-anh">
                                            <span>Hiển thị danh sách ảnh con <i class="fas fa-images"></i></span>
                                        </a>
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

    <div class="modal fade" id="modal-delete-anh">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Danh sách ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer justify-content-between">
                    @foreach($listAnh as $anhDiaDanh)
                        <div class="form-group">
                            <div style="position: relative;width: 100%;max-width: 400px;">
                                <form action="{{ route('anhDiaDanh.destroy', ['anhDiaDanh'=>$anhDiaDanh]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <img id="Img" src="{{ $anhDiaDanh->Anh }}" style="width:250px;height:200px"/>
                                    <button type="submit" style="position: absolute;top: 10%;left: 96%;transform: translate(-50%, -50%);background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                                        <i class="mdi mdi-delete" style="font-size:24px;color:red;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection