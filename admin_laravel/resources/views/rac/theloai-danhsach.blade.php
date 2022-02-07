@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Các thể loại đã xóa</h1>
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
                    <th>Tên thể loại</th>
                    <th>Thời gian xóa</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listTheLoai as $theLoai)
                    <tr>
                        <td>{{ $theLoai->Ten }}</td>
                        <td>{{ $theLoai->deleted_at }}</td>
                        <td class="dt-center">
                            <div class="btn-group">
                              <button type="button" style="width: 50px; height: 30px" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#modal-delete{{ $theLoai->id }}"><i class="mdi mdi-cup"></i></button>
                            </div>
                        </td>
                    </tr>

                      <div class="modal fade" id="modal-delete{{ $theLoai->id }}">
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
                                      <form action="{{ route('theLoaiEdit', ['id'=>$theLoai->id]) }}" method="post">
                                          @csrf
                                          @method('PATCH')
                                          <div class="btn-group">
                                            <button type="submit" class="btn btn-success">Chấp nhận</button>
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
@endsection
