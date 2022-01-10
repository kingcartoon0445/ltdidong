@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm thể loại</h1>
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
                            <form action="{{ route('theLoai.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="TenTheLoai">Tên thể loại</label>
                                    <input type="text" class="form-control" id="TenTheLoai" name = "TenTheLoai">
                                    @if($errors->has('TenTheLoai'))
                                        <p style="color:red">{{ $errors->first('TenTheLoai') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="custom-select form-control-border border-width-2" name="TrangThai">
                                        <option>Hoạt động</option>
                                        <option>Xóa</option>
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
