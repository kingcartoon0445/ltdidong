@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                                    <label>Loại du lịch</label>
                                    <select class="form-control" name="theloais[]" multiple>
                                        @foreach($listTheLoai as $theLoai)
                                            <option value="{{ $theLoai->id }}">{{ $theLoai->Ten }}</option>
                                        @endforeach
                                    </select>
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
                                    <label class="col-form-label" for="MoTa">Mô tả</label>
                                    <textarea class="form-control" name="MoTa" rows="5">{{ $diaDanh->MoTa }}</textarea>
                                    @if($errors->has('MoTa'))
                                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option @if($diaDanh->TrangThai==1) selected @endif>Hoạt động</option>  
                                        <option @if($diaDanh->TrangThai==0) selected @endif>Đóng cửa</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="hinh" class="form-label">Ảnh bìa</label>
                                        <input onchange="showAnhEdit(this);" class="form-control" type="file" name="hinh" accept="image/*">
                                    </div>
                                    @if($errors->has('hinh'))
                                        <p style="color:red">{{ $errors->first('hinh') }}</p>
                                    @endif
                                </div>

                                <div id="ImgDivEdit" class="form-group">
                                    <img id="ImgEdit" src="{{ $diaDanh->AnhBia }}" style="width:725px;max-height:500px"/>
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

                                <div class="btn-group">
                                    <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
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
                                <button type="submit" class="btn text-danger" style="position: absolute;top: 8%;left: 95%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);font-size: 20px;">X</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection