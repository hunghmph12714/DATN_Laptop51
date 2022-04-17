@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Mã học sinh</th>
                        <th>Tên học sinh</th>
                        <th>Ngày sinh</th>
                        <th>Quê Quán </th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Lớp</th>
                        <th>Ảnh</th>
                        <th>
                            <a class="btn btn-info" href="{{route('hoc_sinh.add')}}">Thêm</a>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->ma_sv }}</td>
                            <td>{{ $item->ho_ten }}</td>
                            <td>{{ $item->ngay_sinh }}</td>
                            <td>{{ $item->que_quan }}</td>
                            <td>{{ $item->dien_thoai }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->class->ten_lop }}</td>

                            <td></td>
                            <td>

                                <a href="{{ route('hoc_sinh.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>

                                <a href="{{ route('hoc_sinh.remove', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bạn có chắc muốn xóa')"
                                    class="btn btn-sm btn-danger">Xóa</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection