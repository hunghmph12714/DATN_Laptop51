@extends('admin.layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <div class="container">
        <h5 class="alert alert-danger  text-center">SỬA THÔNG TIN NGƯỜI DÙNG</h5>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Họ và Tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="avatar" value="{{ $user->avatar }}" class="form-control" placeholder="">
                        <img src="{{ asset($user->avatar) }}" alt="" width="200">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="number" name="phone" value="{{ $user->phone }}" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <input type="text" name="description" value="{{ $user->description }}" class="form-control"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Chức Vụ</label>
                        <select name="id_role" class="form-control">
                            <option value="">Chọn sản phẩm</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $user->id_role) selected @endif>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" id="mo" name="status" class="form-check-input" value="1"
                                {{ old('status', $user->status) == '1' ? 'checked' : '' }}>
                            <label for="mo" class="form-check-label">Hoạt Động</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="dong" name="status" class="form-check-input" value="0"
                                {{ old('status', $user->status) == '0' ? 'checked' : '' }}>
                            <label for="dong" class="form-check-label">Khóa</label>
                        </div>

                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <br>
                    <a style="text-decoration" href="{{ route('user.index') }}" class="btn btn-danger">Hủy</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
