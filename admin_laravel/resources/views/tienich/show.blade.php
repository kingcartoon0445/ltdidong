@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thông tin tiện ích</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="project-info-box mt-0">
                        <p><b>Tên:</b> {{ $tienIch->Ten }}</p>
                        <p><b>Thuộc địa danh:</b> {{ $diaDanh->Ten }}</p>
                        <p><b>Loại tiện ích:</b> {{ $tienIch->Loai }}</p>
                        <p><b>Địa chỉ:</b> {{ $tienIch->DiaChi }}</p>
                        <p><b>Số điện thoại:</b> {{ $tienIch->SDT }}</p>
                        <p><b>Trạng thái:</b> @if($tienIch->TrangThai==1) Hoạt động @else Đóng cửa @endif</p>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="{{ $tienIch->Anh }}" style="width:1280px;max-height:1080px" class="rounded">
                </div>

                <div class="col-md-12 mt-4">
                    <div class="project-info-box mt-0">
                        <h5><b>Mô tả</b></h5>
                        <p>{!! $tienIch->MoTa !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection