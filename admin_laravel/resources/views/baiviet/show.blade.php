@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thông tin bài viết</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4 mb-4">
                        <div class="card card-tale">
                          <div class="card-body">
                            <p class="fs-25 mb-2">Total likes</p>
                            <p>123456789</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="project-info-box">
                        <p><b>Tựa đề:</b> {{ $baiViet->TieuDe }}</p>
                        <p><b>Địa danh:</b> {{ $baiViet->diadanh->Ten }}</p>
                        <p><b>Người đăng:</b> {{ $baiViet->nguoidung->TenDaiDien }}</p>
                        <p><b>Trạng thái:</b> @if($baiViet->TrangThai==1) Hiển thị @else Ẩn @endif</p>
                        <p><b>Nội dung:</b> {{ $baiViet->NoiDung }}</p>

                        <b>Ảnh:</b>
                        <div class="col-md-12">
                            <div class="pro-img-list">
                                <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($listAnh as $anh)
                                            <div class="carousel-item">
                                                <div class="card">
                                                    <img src="{{ $anh->Anh }}" class="d-block w-100" style="width:250px;height:200px">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </button>
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