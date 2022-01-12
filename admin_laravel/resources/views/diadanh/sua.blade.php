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
                                    <textarea class="form-control" name="MoTa" rows="3">{{ $diaDanh->MoTa }}"</textarea>
                                    @if($errors->has('MoTa'))
                                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option>Hoạt động</option>  
                                        <option>Đóng cửa</option>
                                    </select>
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
                <form action="{{ route('diaDanh.destroy', ['diaDanh'=>$diaDanh]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection