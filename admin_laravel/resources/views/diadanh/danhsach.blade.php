@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý địa danh</h1>
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
                    <th>Tên địa danh</th>
                    <th>Miền</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listdiaDanh as $diaDanh)
                    <tr>
                        <td>{{ $diaDanh->Ten }}</td>
                        <td>{{ $diaDanh->mien->TenMien }}</td>
                        <td>
                            @if($diaDanh->TrangThai==0)
                              <span class="badge bg-danger" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Đóng cửa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 90px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                   
                        </td>
                        <td>
                            <div class="btn-group">
                              <a href="{{ route('diaDanh.show', $diaDanh) }}" type="button" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                              </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('diaDanh.edit', $diaDanh) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $diaDanh->id }}">
                                  <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-delete{{ $diaDanh->id }}">
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
                <h5 class="modal-title">Thêm địa danh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-between">
              <form action="{{ route('diaDanh.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label" for="Ten">Tên</label>
                    <input type="text" class="form-control" style="width:100%;" name="Ten">
                    @if($errors->has('Ten'))
                        <p style="color:red">{{ $errors->first('Ten') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Miền</label>
                    <select class="custom-select form-control-border border-width-2" name="MaMien">
                        @foreach($listMien as $mien)
                            <option value="{{ $mien->id }}">{{ $mien->TenMien }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('MaMien'))
                        <p style="color:red">{{ $errors->first('MaMien') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>Loại du lịch</label>
                    <select class="custom-select form-control-border border-width-2" name="theloais[]" multiple>
                        @foreach($listTheLoai as $theLoai)
                            <option value="{{ $theLoai->id }}">{{ $theLoai->Ten }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('theloais'))
                        <p style="color:red">{{ $errors->first('theloais') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="KinhDo">Kinh độ</label>
                    <input type="text" class="form-control" name="KinhDo">
                    @if($errors->has('KinhDo'))
                        <p style="color:red">{{ $errors->first('KinhDo') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="ViDo">Vĩ độ</label>
                    <input type="text" class="form-control" name="ViDo">
                    @if($errors->has('ViDo'))
                        <p style="color:red">{{ $errors->first('ViDo') }}</p>
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
                    <textarea class="form-control" name="MoTa" rows="5"></textarea>
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

                <div class="form-group">
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Ảnh bìa</label>
                        <input onchange="showAnhAdd(this);" class="form-control" type="file" name="hinh" accept="image/*">
                    </div>
                </div>

                <div id="ImgDivAdd" class="form-group">
                    <img id="ImgAdd" style="width:400px;max-height:250px"/>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Các ảnh con</label>
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