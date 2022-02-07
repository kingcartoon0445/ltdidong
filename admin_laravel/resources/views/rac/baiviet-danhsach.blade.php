@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Các bài viết đã xóa</h1>
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
                    <th>Tiêu đề</th>
                    <th>Địa danh</th>
                    <th>Người đăng</th>
                    <th>Thời gian xóa</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listbaiViet as $baiViet)
                    <tr>
                        <td>{{ $baiViet->TieuDe }}</td>
                        <td>{{ $baiViet->Ten }}</td>
                        <td>{{ $baiViet->TenDaiDien }}</td>
                        <td>{{ $baiViet->deleted_at }}</td>
                        <td class="dt-center">
                          <div class="btn-group">
                            <button style="width: 50px; height: 30px" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#modal-delete{{ $baiViet->id }}"><i class="mdi mdi-cup"></i></button>
                          </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal-delete{{ $baiViet->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xác nhận recover dữ liệu này?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                    <form action="{{ route('baiVietEdit', ['id'=>$baiViet->id]) }}" method="post">
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