@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thông tin địa danh</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="project-info-box mt-0">
                        <p><b>Tên:</b> {{ $diaDanh->Ten }}</p>
                        <p><b>Miền:</b> {{ $diaDanh->mien->TenMien }}</p>
                        <p><b>Kinh độ:</b> {{ $diaDanh->KinhDo }}</p>
                        <p><b>Vĩ độ:</b> {{ $diaDanh->ViDo }}</p>
                        <p><b>Trạng thái:</b> @if($diaDanh->TrangThai==1) Hoạt động @else Đóng cửa @endif</p>
                    </div>
                </div>

                <div class="col-md-12 mt-0">
                    <div class="project-info-box mt-0">
                        <h5><b>Mô tả</b></h5>
                        <p>{{ $diaDanh->MoTa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection