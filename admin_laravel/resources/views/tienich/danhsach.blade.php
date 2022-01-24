@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý tiện ích</h1>
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
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm tiện ích</a>

              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Địa danh</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listTienIch as $tienIch)
                    <tr>
                        <td>{{ $tienIch->Ten }}</td>
                        <td>
                          @foreach($listCoTienIch as $coTienIch)
                            @if($coTienIch->MaTienIch == $tienIch->id)
                              @foreach($listDiaDanh as $diaDanh)
                                @if($coTienIch->MaDiaDanh == $diaDanh->id)
                                  {{ $diaDanh->Ten }}
                                @endif
                              @endforeach
                            @endif
                          @endforeach
                        </td>
                        <td>{{ $tienIch->SDT }}</td>
                        <td>
                          @if($diaDanh->TrangThai==0)
                            <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Đóng cửa</label>
                          @else
                            <label class="badge badge-success" style="width: 90px; height: 25px; font-weight: bold;">Hoạt động</label>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route('tienIch.show', $tienIch) }}" type="button" style="width: 50px; height: 30px" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-eye"></i></a>
                            <a type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-edit{{ $tienIch->id }}"><i class="mdi mdi-border-color"></i></a>
                            <a type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $tienIch->id }}"><i class="mdi mdi-cup"></i></a>
                          </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-edit{{ $tienIch->id }}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Cập nhật thông tin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body justify-content-between">
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
                                    <input type="text" class="form-control" name="Loai" value="{{ $tienIch->Loai }}">
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
                                        <option @if($diaDanh->TrangThai==1) selected @endif>Hoạt động</option>  
                                        <option @if($diaDanh->TrangThai==0) selected @endif>Đóng cửa</option>
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

                  <div class="modal fade" id="modal-delete{{ $tienIch->id }}">
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
                <h5 class="modal-title">Thêm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-between">
              <form action="{{ route('tienIch.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="TenDaiDien">Tên đại diện</label>
                    <input type="text" class="form-control" name="TenDaiDien">
                    @if($errors->has('TenDaiDien'))
                        <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                    @endif
                </div>

                <div class="form-group">
                  <label for="MaDiaDanh">Thuộc địa danh</label>
                  <select class="custom-select form-control-border border-width-2" name="MaDiaDanh">
                      @foreach($listDiaDanh as $diaDanh)
                          <option value="{{ $diaDanh->id }}">{{ $diaDanh->Ten }}</option>
                      @endforeach
                  </select>
                  @if($errors->has('MaDiaDanh'))
                      <p style="color:red">{{ $errors->first('MaDiaDanh') }}</p>
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
                  <label for="Loai">Loại tiện ích</label>
                  <input type="text" class="form-control" name="Loai">
                  @if($errors->has('Loai'))
                      <p style="color:red">{{ $errors->first('Loai') }}</p>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="SDT">Số điện thoại</label>
                  <input type="text" class="form-control" name="SDT">
                  @if($errors->has('SDT'))
                      <p style="color:red">{{ $errors->first('SDT') }}</p>
                  @endif
                </div>

                <div class="form-group">
                    <label for="MoTa">Mô tả</label>
                    <textarea class="form-control" name="MoTa" rows="10"></textarea>
                    @if($errors->has('MoTa'))
                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="TrangThai">Trạng thái</label>
                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                        <option>Hoạt động</option>  
                        <option>Đóng cửa</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="hinh">Ảnh đại diện</label>
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

                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection