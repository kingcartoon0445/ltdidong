@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Các tài khoản đã xóa</h1>
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
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Đại Diện</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Chức vụ</th>
                    <th>Thời gian xóa</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listnguoiDung as $nguoiDung)
                    <tr>
                        <td><img class="img-circle elevation-2" style="width:50px;height:50px;object-fit:cover" src="{{ $nguoiDung->AnhNen }}" alt=""> {{ $nguoiDung->TenDaiDien }}</td>
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
                          {{$nguoiDung->deleted_at}}
                        </td>
                        <td class="dt-center">
                          <div class="btn-group">
                            <button type="button" style="width: 50px; height: 30px" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#modal-delete{{ $nguoiDung->id }}"><i class="mdi mdi-cup"></i></button>
                          </div>
                        </td>
                    </tr>

                  <div class="modal fade" id="modal-delete{{ $nguoiDung->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Xác nhận recover dữ liệu này?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('nguoiDungEdit', ['id'=>$nguoiDung->id]) }}" method="post">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="btn btn-success">Chấp nhận</button>
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