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
              <a href="{{ route('tienIch.create') }}" type="button" class="btn btn-success">Thêm tiện ích</a>

              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Tên</th>
                    <th>Loại tiện ích</th>
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
                      <td>{{ $tienIch->Loai }}</td>
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
                        @if($tienIch->TrangThai==0)
                          <label class="badge badge-danger" style="width: 90px; height: 25px; font-weight: bold;">Đóng cửa</label>
                        @else
                          <label class="badge badge-success" style="width: 90px; height: 25px; font-weight: bold;">Hoạt động</label>
                        @endif
                      </td>
                      <td class="dt-center">
                        <div class="btn-group">
                          <button onclick="location.href='{{ route('tienIch.show', $tienIch) }}'" style="width: 50px; height: 30px" class="btn btn-outline-primary btn-fw"><i class="mdi mdi-eye"></i></a>
                          <button onclick="location.href='{{ route('tienIch.edit', $tienIch) }}'" style="width: 50px; height: 30px" class="btn btn-outline-warning btn-fw"><i class="mdi mdi-border-color"></i></a>
                          <button style="width: 50px; height: 30px" class="btn btn-outline-danger btn-fw" data-toggle="modal" data-target="#modal-delete{{ $tienIch->id }}"><i class="mdi mdi-cup"></i></button>
                        </div>
                      </td>
                    </tr>

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
@endsection