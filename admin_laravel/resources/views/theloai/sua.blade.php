@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sửa thông tin thể loại</h1>
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
                            <form action="{{ route('theLoai.update', ['theLoai'=>$theLoai]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')    
                                <div class="form-group">
                                    <label class="col-form-label" for="TenTheLoai">Tên</label>
                                    <input type="text" class="form-control" name = "TenTheLoai" value="{{ $theLoai->Ten }}">
                                    @if($errors->has('TenTheLoai'))
                                        <p style="color:red">{{ $errors->first('TenTheLoai') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option @if($theLoai->TrangThai==1) selected @endif>Hoạt động</option>  
                                        <option @if($theLoai->TrangThai==0) selected @endif>Khóa</option>
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
                <form action="{{ route('theLoai.destroy', ['theLoai'=>$theLoai]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
