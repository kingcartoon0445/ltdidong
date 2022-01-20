@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý tiện ích</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm tiện ích</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Địa Chỉ</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listTienIch as $tienIch)
                    <tr>
                        <td><a href="{{ route('tienIch.show', $tienIch) }}">{{ $tienIch->Ten }}</a></td>
                        <td>{{ $tienIch->Loai }}</td>
                        <td>{{ $tienIch->DiaChi }}</td>
                        <td>{{ $tienIch->SDT }}</td>
                        <td>
                            @if($tienIch->TrangThai==0)
                              <span class="badge bg-danger" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Đóng cửa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                   
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit{{ $tienIch->id }}">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="btn-group">
                            <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $tienIch->id }}">
                              <i class="fas fa-trash"></i>
                            </a>
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
                                          <input onchange="showAnhEdit(this);" class="form-control" type="file" name="hinh" accept="image/*">
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
                    <label class="col-form-label" for="TenDaiDien">Tên đại diện</label>
                    <input type="text" class="form-control" name="TenDaiDien">
                    @if($errors->has('TenDaiDien'))
                        <p style="color:red">{{ $errors->first('TenDaiDien') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="Loai">Loại</label>
                    <input type="text" class="form-control" name="Loai">
                    @if($errors->has('Loai'))
                        <p style="color:red">{{ $errors->first('Loai') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="DiaChi">Địa chỉ</label>
                    <input type="text" class="form-control" name="DiaChi">
                    @if($errors->has('DiaChi'))
                        <p style="color:red">{{ $errors->first('DiaChi') }}</p>
                    @endif
                </div>
                
                <div class="form-group">
                    <label class="col-form-label" for="MoTa">Mô tả</label>
                    <textarea class="form-control" name="MoTa" rows="10"></textarea>
                    @if($errors->has('MoTa'))
                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="SDT">Số điện thoại</label>
                    <input type="text" class="form-control" name="SDT">
                    @if($errors->has('SDT'))
                        <p style="color:red">{{ $errors->first('SDT') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                        <option>Hoạt động</option>  
                        <option>Đóng cửa</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Ảnh</label>
                        <input onchange="showAnhAdd(this);" class="form-control" type="file" name="hinh" accept="image/*">
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