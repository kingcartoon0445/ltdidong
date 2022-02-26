@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý tài khoản</h1>
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
              <a href="{{ route('nguoiDung.create') }}" type="button" class="btn btn-success">Thêm tài khoản</a>

              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Đại Diện</th>
                    <th>Email</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listnguoiDung as $nguoiDung)
                    <tr>
                        <td><img class="img-circle elevation-2" style="width:50px;height:50px;object-fit:cover" src="{{ $nguoiDung->AnhNen }}" alt=""> {{ $nguoiDung->TenDaiDien }}</td>
                        <td>{{ $nguoiDung->Email }}</td>
                        <td>{{ $nguoiDung->HovaTen }}</td>
                        <td>{{ $nguoiDung->SDT }}</td>
                        <td>
                            @if($nguoiDung->IsAdmin==1)
                              <label class="badge badge-primary" style="width: 90px; height: 25px; font-weight: bold;">Admin</label>
                            @else
                              <label class="badge badge-info" style="width: 90px; height: 25px; font-weight: bold;">Người dùng</label>
                            @endif  
                        </td>
                        <td>
                            @if($nguoiDung->TrangThai==0)
                              <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Khóa</label>
                            @else
                              <label class="badge badge-success" style="width: 90px; height: 25px; font-weight: bold;">Hoạt động</label>
                            @endif                     
                        </td>
                        <td class="dt-center">
                          <div class="btn-group">
                            <button onclick="location.href='{{ route('nguoiDung.edit', $nguoiDung) }}'" style="width: 50px; height: 30px" class="btn btn-outline-warning btn-fw"><i class="mdi mdi-border-color"></i></a>
                            <button type="button" style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $nguoiDung->id }}"><i class="mdi mdi-cup"></i></button>
                          </div>
                        </td>
                    </tr>

                  <div class="modal fade" id="modal-delete{{ $nguoiDung->id }}">
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
                            <form action="{{ route('nguoiDung.destroy', ['nguoiDung'=>$nguoiDung]) }}" method="post">
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