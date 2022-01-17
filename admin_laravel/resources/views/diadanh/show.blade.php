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
                <div class="col-md-6">
                    <div class="project-info-box">
                        <p><b>Tên:</b> {{ $diaDanh->Ten }}</p>
                        <p><b>Miền:</b> {{ $diaDanh->mien->TenMien }}</p>
                        <p><b>Kinh độ:</b> {{ $diaDanh->KinhDo }}</p>
                        <p><b>Vĩ độ:</b> {{ $diaDanh->ViDo }}</p>
                        <p><b>Trạng thái:</b> @if($diaDanh->TrangThai==1) Hoạt động @else Đóng cửa @endif</p>
                        <h5><b>Mô tả</b></h5><p>{{ $diaDanh->MoTa }}</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pro-img-details">
                        <img src="{{ $diaDanh->AnhBia }}" style="width:1280px;max-height:1080px" class="rounded">
                    </div>
                    <div class="pro-img-list">
                        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card">
                                        <img src="{{ $diaDanh->AnhBia }}" class="d-block w-100" style="width:100px;height:100px">
                                    </div>
                                </div>

                                @foreach($listAnh as $anh)
                                    <div class="carousel-item">
                                        <div class="card">
                                            <img src="{{ $anh->Anh }}" class="d-block w-100" style="width:100px;height:100px">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection