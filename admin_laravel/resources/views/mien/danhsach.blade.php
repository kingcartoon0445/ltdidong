@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý miền</h1>
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
              <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm miền</a>

              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên miền</th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian sửa</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listMien as $mien)
                    <tr>
                        <td>{{ $mien->TenMien }}</td>
                        <td>{{ $mien->created_at }}</td>
                        <td>{{ $mien->updated_at }}</td>
                        <td>
                          <div class="btn-group">
                            <!--<button type="button" style="width: 50px; height: 30px" class="btn btn-outline-primary btn-fw" data-toggle="modal" data-target="#modal-edit{{ $mien->id }}"><i class="mdi mdi-eye"></i></button>-->
                            <button type="button" style="width: 50px; height: 30px" class="btn btn-outline-warning btn-fw" data-toggle="modal" data-target="#modal-edit{{ $mien->id }}"><i class="mdi mdi-border-color"></i></button>
                            <button type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $mien->id }}"><i class="mdi mdi-cup"></i></button>
                          </div>
                        </td>
                    </tr>

                      <div class="modal fade" id="modal-edit{{ $mien->id }}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Cập nhật thông tin</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body justify-content-between">
                                    <form action="{{ route('mien.update', ['mien'=>$mien]) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      @method('PATCH')
                                      <div class="form-group">
                                        <label for="TenMien">Tên miền</label>
                                        <input type="text" class="form-control" name="TenMien" value="{{ $mien->TenMien }}">
                                        @if($errors->has('TenMien'))
                                            <p style="color:red">{{ $errors->first('TenMien') }}</p>
                                        @endif
                                      </div>

                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="modal fade" id="modal-delete{{ $mien->id }}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Xác nhận xóa dữ liệu này?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('mien.destroy', ['mien'=>$mien]) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <div class="btn-group">
                                        <button type="submit" class="btn btn-danger">Chấp nhận xóa</button>
                                      </div>
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
              <form id="addform" action="{{ route('mien.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="TenMien">Tên miền</label>
                  <input type="text" class="form-control" name="TenMien">
                  @if($errors->has('TenMien'))
                      <p style="color:red">{{ $errors->first('TenMien') }}</p>
                  @endif
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection