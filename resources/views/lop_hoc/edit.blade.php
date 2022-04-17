@extends('layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card row">
        <div class="col-6">
            <div class="form-group mt-2">
                <label for="">Mã Lớp</label>
                <input type="text" name="ma_lop" value="{{ $class->ma_lop }}" class="form-control" placeholder="">
            </div>
            <div class="form-group mt-2">
                <label for="">Tên Lớp</label>
                <input type="text" name="ten_lop" value="{{$class->ten_lop}}" class="form-control" placeholder="">
            </div>
            <div class="mb-2">
                <a href="{{route('lop_hoc.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
</form>
@endsection