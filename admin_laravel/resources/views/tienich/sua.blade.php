@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin tiện ích</h1>
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
                        <form action="{{ route('tienIch.update', ['tienIch'=>$tienIch]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label class="col-form-label" for="TenDaiDien">Tên đại diện</label>
                                    <input type="text" class="form-control" name="TenDaiDien" value="{{ $tienIch->Ten }}">
                                    @if($errors->has('TenDaiDien'))
                                        <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="Loai">Loại</label>
                                    <input type="text" class="form-control" name="Loai" value="{{ $tienIch->Loai }}">
                                    @if($errors->has('Loai'))
                                        <p style="color:red">{{ $errors->first('Loai') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="DiaChi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="DiaChi" value="{{ $tienIch->DiaChi }}">
                                    @if($errors->has('DiaChi'))
                                        <p style="color:red">{{ $errors->first('DiaChi') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="MoTa">Mô tả</label>
                                    <textarea class="form-control" name="MoTa" rows="10">{{ $tienIch->MoTa }}</textarea>
                                    @if($errors->has('MoTa'))
                                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="SDT">Số điện thoại</label>
                                    <input type="text" class="form-control" name="SDT" value="{{ $tienIch->SDT }}">
                                    @if($errors->has('SDT'))
                                        <p style="color:red">{{ $errors->first('SDT') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option @if($tienIch->TrangThai==1) selected @endif>Hoạt động</option>  
                                        <option @if($tienIch->TrangThai==0) selected @endif>Đóng cửa</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="hinh" class="form-label">Ảnh</label>
                                        <input onchange="showAnh(this);" class="form-control" type="file" name="hinh" accept="image/*">
                                    </div>
                                    @if($errors->has('hinh'))
                                        <p style="color:red">{{ $errors->first('hinh') }}</p>
                                    @endif
                                </div>

                                <div id="ImgDiv" class="form-group">
                                    <img id="Img" src="{{ $tienIch->Anh }}" style="width:725px;max-height:500px"/>
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

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận xóa dữ liệu này?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <form action="{{ route('tienIch.destroy', ['tienIch'=>$tienIch]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection