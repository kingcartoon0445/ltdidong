@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm địa danh</h1>
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
                            <form action="{{ route('diaDanh.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="Ten">Tên</label>
                                    <input type="text" class="form-control" name="Ten">
                                    @if($errors->has('Ten'))
                                        <p style="color:red">{{ $errors->first('Ten') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Miền</label>
                                    <select class="custom-select form-control-border border-width-2" name="MaMien">
                                        @foreach($listMien as $mien)
                                            <option value="{{ $mien->id }}">{{ $mien->TenMien }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('MaMien'))
                                        <p style="color:red">{{ $errors->first('MaMien') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="KinhDo">Kinh độ</label>
                                    <input type="text" class="form-control" name="KinhDo">
                                    @if($errors->has('KinhDo'))
                                        <p style="color:red">{{ $errors->first('KinhDo') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="ViDo">Vĩ độ</label>
                                    <input type="text" class="form-control" name="ViDo">
                                    @if($errors->has('ViDo'))
                                        <p style="color:red">{{ $errors->first('ViDo') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-form-label" for="MoTa">Mô tả</label>
                                    <textarea class="form-control" name="MoTa" rows="3"></textarea>
                                    @if($errors->has('MoTa'))
                                        <p style="color:red">{{ $errors->first('MoTa') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option>Hoạt động</option>  
                                        <option>Đóng cửa</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection