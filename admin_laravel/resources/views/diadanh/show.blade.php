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
                    <div class="col-md-4 mb-4">
                        <div class="card card-light-blue">
                          <div class="card-body">
                            <p class="fs-25 mb-2">Rating</p>
                            <p>
                                @for ($i = 0; $i < $avg_stars; $i++)
                                    <i class="mdi mdi-star"></i>
                                @endfor
                            </p>
                            <p class="fs-25 mb-2">Total Reviews: {{ $totalReview }}</p>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="project-info-box">
                                        <p><b>Tên:</b> {{ $diaDanh->Ten }}</p>
                                        <p><b>Miền:</b> {{ $diaDanh->mien->TenMien }}</p>
                                        <p><b>Loại du lịch:</b>
                                            @foreach($listTheLoai as $theLoai)
                                                <br> {{ $theLoai->Ten }}
                                            @endforeach
                                        </p>
                                        <p><b>Kinh độ:</b> {{ $diaDanh->KinhDo }}</p>
                                        <p><b>Vĩ độ:</b> {{ $diaDanh->ViDo }}</p>
                                        <p><b>Địa chỉ:</b> {{ $diaDanh->DiaChi }}</p>
                                        <p><b>Trạng thái:</b> @if($diaDanh->TrangThai==1) Hoạt động @else Đóng cửa @endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pro-img-details">
                                <img src="{{ $diaDanh->AnhBia }}" style="width:1280px;max-height:1080px" class="rounded">
                            </div>
                            <div class="pro-img-list">
                                <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($listAnh as $anh)
                                            <div class="carousel-item">
                                                <div class="card">
                                                    <img src="{{ $anh->Anh }}" class="d-block w-100" style="width:100px;height:100px">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="project-info-box">
                                        <h4><b>Mô tả:</b></h4>
                                        {!! $diaDanh->MoTa !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection