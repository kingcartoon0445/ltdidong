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
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm địa danh</a>

          <div class="card">
            <div class="card-body">
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
                              <span class="badge bg-danger" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Ẩn</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Hiển thị</h6></span>
                            @endif                   
                        </td>
                        <td>
                            <div class="btn-group">
                              <a href="{{ route('baiViet.show', $baiViet) }}" type="button" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                              </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('baiViet.edit', $baiViet) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                              <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $baiViet->id }}">
                                <i class="fas fa-trash"></i>
                              </a>
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
                    <label class="col-form-label" for="TieuDe">Tiêu đề</label>
                    <input type="text" class="form-control" name="TieuDe">
                    @if($errors->has('TieuDe'))
                        <p style="color:red">{{ $errors->first('TieuDe') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="NoiDung">Nội dung</label>
                    <textarea class="form-control" name="NoiDung" rows="5"></textarea>
                    @if($errors->has('NoiDung'))
                        <p style="color:red">{{ $errors->first('NoiDung') }}</p>
                    @endif
                </div>

                
                <div class="form-group">
                    <label>Địa danh</label>
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
                    <label>Người đăng</label>
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
                    <label>Trạng thái</label>
                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                        <option>Hiện</option>  
                        <option>Ẩn</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Ảnh</label>
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