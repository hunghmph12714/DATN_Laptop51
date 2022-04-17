@extends('layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card row">
        <div class="col-6">
            <div class="form-group mt-2">
                <label for="">Mã Lớp</label>
                <input type="text" name="ma_lop" value="{{old('ma_lop')}}" class="form-control" placeholder="">
                @error('ma_lop')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Tên Lớp</label>
                <input type="text" name="ten_lop" value="{{old('ten_lop')}}" class="form-control"
                    placeholder="">@error('ten_lop')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">

                <a href="{{route('lop_hoc.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
</form>
@endsection