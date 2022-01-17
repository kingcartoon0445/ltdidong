@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý địa danh</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Quản lý địa danh</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('diaDanh.create') }}" type="button" class="btn btn-success">Thêm địa danh</a>

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
                        <td><a href="{{ route('diaDanh.show', $diaDanh) }}">{{ $diaDanh->Ten }}</a></td>
                        <td>{{ $diaDanh->mien->TenMien }}</td>
                        <td>
                            @if($diaDanh->TrangThai==0)
                              <span class="badge bg-danger" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Đóng cửa</h6></span>
                            @else
                              <span class="badge bg-success" style="width: 85px; height: 25px"><h6 style="font-weight: bold;">Hoạt động</h6></span>
                            @endif                   
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('diaDanh.edit', $diaDanh) }}" type="button" class="btn btn-warning">
                                  <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
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