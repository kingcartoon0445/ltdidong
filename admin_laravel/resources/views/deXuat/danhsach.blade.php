@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý đề xuất</h1>
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
                    <th>Người đề xuất</th>
                    <th>Đia danh</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listDeXuat as $deXuat)
                    <tr>
                        <td>{{ $deXuat->nguoiDung->Email }}</td>
                        <td>{{ $deXuat->diaDanh->Ten }}</td>
                        <td>
                            @if($deXuat->TrangThai==0)
                              <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Chờ duyệt</label>
                            @endif
                        </td>
                        <td class="dt-center">
                            <div class="btn-group">
                              <button style="width: 50px; height: 30px" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#modal-delete{{ $deXuat->id }}"><i class="mdi mdi-check"></i></button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-delete{{ $deXuat->id }}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Khi xác nhận địa danh này vui lòng kiểm tra địa danh bên bảng Địa Danh và thêm thông tin cần thiết</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('deXuat.destroy', ['deXuat'=>$deXuat]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-success">Chấp thuận</button>
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