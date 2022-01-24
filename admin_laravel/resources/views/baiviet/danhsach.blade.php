@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý bài viết</h1>
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
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm bài viết</a>

              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Địa danh</th>
                    <th>Người đăng</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listbaiViet as $baiViet)
                    <tr>
                        <td>{{ $baiViet->TieuDe }}</td>
                        <td>{{ $baiViet->diadanh->Ten }}</td>
                        <td>{{ $baiViet->nguoidung->TenDaiDien }}</td>
                        <td>
                          @if($baiViet->TrangThai==0)
                            <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Ẩn</label>
                          @else
                            <label class="badge badge-success" style="width: 90px; height: 25px; font-weight: bold;">Hiển thị</label>
                          @endif                    
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route('baiViet.show', $baiViet) }}" type="button" style="width: 50px; height: 30px" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-eye"></i></a>
                            <a href="{{ route('baiViet.edit', $baiViet) }}" type="button" style="width: 50px; height: 30px" class="btn btn-outline-warning btn-fw"><i class="mdi mdi-border-color"></i></a>
                            <a type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $baiViet->id }}"><i class="mdi mdi-cup"></i></a>
                          </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-delete{{ $baiViet->id }}">
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
                                    <form action="{{ route('baiViet.destroy', ['baiViet'=>$baiViet]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-between">
              <form action="{{ route('baiViet.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="TieuDe">Tiêu đề</label>
                    <input type="text" class="form-control" name="TieuDe">
                    @if($errors->has('TieuDe'))
                        <p style="color:red">{{ $errors->first('TieuDe') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="NoiDung">Nội dung</label>
                    <textarea class="form-control" name="NoiDung" rows="5"></textarea>
                    @if($errors->has('NoiDung'))
                        <p style="color:red">{{ $errors->first('NoiDung') }}</p>
                    @endif
                </div>

                
                <div class="form-group">
                    <label for="MaDiaDanh">Địa danh</label>
                    <select class="custom-select form-control-border border-width-2" name="MaDiaDanh">
                        @foreach($listdiaDanh as $diaDanh)
                            <option value="{{ $diaDanh->id }}">{{ $diaDanh->Ten }}</option>
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
                            <option value="{{ $nguoiDung->id }}">{{ $nguoiDung->TenDaiDien }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('MaNguoiDung'))
                        <p style="color:red">{{ $errors->first('MaNguoiDung') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="TrangThai">Trạng thái</label>
                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                        <option>Hiện</option>  
                        <option>Ẩn</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <label for="hinh">Ảnh</label>
                        <input class="form-control" type="file" name="images[]" accept="image/*" multiple>
                    </div>
                </div>

                <div class="btn-group">
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection