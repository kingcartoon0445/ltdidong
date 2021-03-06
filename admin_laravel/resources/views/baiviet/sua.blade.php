@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                            <form action="{{ route('baiViet.update', ['baiViet'=>$baiViet]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('PATCH')
                                  <div class="form-group">
                                      <label for="TieuDe">Tiêu đề</label>
                                      <input type="text" class="form-control" name="TieuDe" value="{{ $baiViet->TieuDe }}">
                                      @if($errors->has('TieuDe'))
                                          <p style="color:red">{{ $errors->first('TieuDe') }}</p>
                                      @endif
                                  </div>

                                  <div class="form-group">
                                      <label for="NoiDung">Nội dung</label>
                                      <textarea class="form-control" name="NoiDung" rows="5">{{ $baiViet->NoiDung }}</textarea>
                                      @if($errors->has('NoiDung'))
                                          <p style="color:red">{{ $errors->first('NoiDung') }}</p>
                                      @endif
                                  </div>

                                  
                                  <div class="form-group">
                                      <label for="MaDiaDanh">Địa danh</label>
                                      <select class="custom-select form-control-border border-width-2" name="MaDiaDanh">
                                          @foreach($listdiaDanh as $diaDanh)
                                              <option value="{{ $diaDanh->id }}" @if($diaDanh->id == $baiViet->MaDiaDanh) selected @endif>{{ $diaDanh->Ten }}</option>
                                          @endforeach
                                      </select>
                                      @if($errors->has('MaDiaDanh'))
                                          <p style="color:red">{{ $errors->first('MaDiaDanh') }}</p>
                                      @endif
                                  </div>

                                  <div class="form-group">
                                      <label for="MaNguoiDung">Người đăng</label>
                                      <select class="custom-select form-control-border border-width-2" name="MaNguoiDung">
                                          @foreach($listnguoiDung as $nguoiDung)
                                              <option value="{{ $nguoiDung->id }}" @if($nguoiDung->id == $baiViet->MaNguoiDung) selected @endif>{{ $nguoiDung->TenDaiDien }}</option>
                                          @endforeach
                                      </select>
                                      @if($errors->has('MaNguoiDung'))
                                          <p style="color:red">{{ $errors->first('MaNguoiDung') }}</p>
                                      @endif
                                  </div>

                                  <div class="form-group">
                                    <label for="TrangThai">Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option value="1" @if($baiViet->TrangThai==1) selected @endif>Hiển thị</option>  
                                        <option value="0" @if($baiViet->TrangThai==0) selected @endif>Ẩn</option>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                      <div class="mb-3">
                                          <label for="hinh">Ảnh</label>
                                          <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-anh">
                                        <span>Hiển thị danh sách ảnh <i class="fas fa-images"></i></span>
                                    </a>
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
                @foreach($listAnh as $anhBaiViet)
                    <div class="form-group">
                        <div style="position: relative;width: 100%;max-width: 400px;">
                            <form action="{{ route('anhBaiViet.destroy', ['anhBaiViet'=>$anhBaiViet]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <img id="Img" src="{{ $anhBaiViet->Anh }}" style="width:250px;height:200px"/>
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