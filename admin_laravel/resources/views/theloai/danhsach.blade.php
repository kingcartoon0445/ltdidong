@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý thể loại</h1>
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
          <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">Thêm thể loại</a>

          <!-- Danh sách -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên thể loại</th>
                    <th>Thời gian thêm</th>
                    <th>Thời gian cập nhật</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listTheLoai as $theLoai)
                    <tr>
                        <td>{{ $theLoai->Ten }}</td>
                        <td>{{ $theLoai->created_at }}</td>
                        <td>{{ $theLoai->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit{{ $theLoai->id }}">
                                  <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                              <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $theLoai->id }}">
                                <i class="fas fa-trash"></i>
                              </a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-edit{{ $theLoai->id }}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Cập nhật thông tin</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body justify-content-between">
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

                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="modal fade" id="modal-delete{{ $theLoai->id }}">
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
                <h5 class="modal-title">Thêm thể loại du lịch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-between">
                <form action="{{ route('theLoai.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="col-form-label" for="TenTheLoai">Tên thể loại</label>
                    <input type="text" class="form-control" id="TenTheLoai" name = "TenTheLoai">
                    @if($errors->has('TenTheLoai'))
                      <p style="color:red">{{ $errors->first('TenTheLoai') }}</p>
                    @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
