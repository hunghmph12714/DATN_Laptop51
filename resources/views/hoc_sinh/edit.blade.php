@extends('layouts.main')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card row">
        <div class="col-6">
            <div class="form-group mt-2">
                <label for="">Mã sinh viên</label>
                <input disabled type="text" name="ma_sv" value="{{$student->ma_sv}}" class="form-control"
                    placeholder="">
                @error('ma_sv')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="">Tên sinh viên</label>
                <input type="text" name="ho_ten" value="{{$student->ho_ten}}" class="form-control"
                    placeholder="">@error('ho_ten')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Ngày sinh</label>
                <input type="date" name="ngay_sinh" value="{{$student->ngay_sinh}}" class="form-control"
                    placeholder="">@error('ngay_sinh')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Quê quán</label>
                <input type="text" name="que_quan" value="{{$student->que_quan}}" class="form-control"
                    placeholder="">@error('que_quan')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Điện Thoại</label>
                <input type="text" name="dien_thoai" value="{{$student->dien_thoai}}" class="form-control"
                    placeholder="">@error('dien_thoai')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$student->email}}" class="form-control"
                    placeholder="">@error('email')
                <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="">Chọn Lớp</label>
                <select class="form-control" name="ma_lop" id="">
                    <option value="" hidden> Chọn lớp</option>
                    @foreach ($clases as $class)
                    <option @if ($student->ma_lop==$class->id)
                        selected
                        @endif value="{{ $class->id }}"> {{ $class->ma_lop ." - " .$class->ten_lop}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="">Ảnh</label>
                <input type="file" name="anh" value="" class="form-control" placeholder="">
                {{-- <img src="" alt=""> --}}
                @error('anh')
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