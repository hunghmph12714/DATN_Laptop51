@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Mã lớp</th>
                        <th>Tên Lớp</th>
                        <th>
                            <a class="btn btn-info" href="{{route('lop_hoc.add')}}">Thêm</a>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($classes as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->ma_lop }}</td>
                            <td>{{ $item->ten_lop }}</td>
                            <td>

                                <a href="{{ route('lop_hoc.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>

                                <a href="{{ route('lop_hoc.remove', ['id' => $item->id]) }}"
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