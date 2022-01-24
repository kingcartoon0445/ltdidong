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
          <div class="card">
            <div class="card-body">
              <a href="{{ route('diaDanh.create') }}" type="button" class="btn btn-success">Thêm địa danh</a>

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
                              <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Đóng cửa</label>
                            @else
                              <label class="badge badge-success" style="width: 90px; height: 25px; font-weight: bold;">Hoạt động</label>
                            @endif                   
                        </td>
                        <td>
                            <div class="btn-group">
                              <a href="{{ route('diaDanh.show', $diaDanh) }}" type="button" style="width: 50px; height: 30px" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-eye"></i></a>
                              <a href="{{ route('diaDanh.edit', $diaDanh) }}" type="button" style="width: 50px; height: 30px" class="btn btn-outline-warning btn-fw"><i class="mdi mdi-border-color"></i></a>
                              <a type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $diaDanh->id }}"><i class="mdi mdi-cup"></i></a>
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
                                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
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
@endsection