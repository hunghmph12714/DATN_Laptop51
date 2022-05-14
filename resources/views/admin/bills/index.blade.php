@extends('admin.layouts.main')
@section('title', 'Danh sách đặt hàng')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('success') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('error') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<form action="" method="get" class="row">
    <div class="form-group col-3">
        {{-- <label for="">Tìm kiếm</label> --}}
        <input type="text" class="form-control" name="search" id="" aria-describedby="helpId"
            placeholder="Tìm kiếm mã hóa đơn">
        {{-- <button>Tìm</button> --}}
    </div>
    {{-- <div class="form-group col-2">
        <select name="type_bill" class="form-control ">
            <option value="1">Bán hàng</option>
            <option value="2"> Sửa chữa</option>
        </select>
    </div> --}}
    <div>
        <button type="submit" class="btn btn-primary">Tất cả</button>

    </div>
    <div>
        <button type="submit" name="type_bill" value="1" class="btn btn-info"> Bán hàng</button>
        <button type="submit" name="type_bill" value="2" class="btn btn-info"> Sửa chữa</button>
    </div class="form-group col-3">
</form>

<div class="row">
    <div class="col-12">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>STT</th>
                    <th onclick="onClick()">Mã hóa đơn</th>
                    <th>Loại hóa đơn</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>
                    </th>
                </thead>
                <tbody>
                    @foreach ($bills as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
                        <td>@if ($item->type==2)
                            <span class="text-info">Sửa chữa</span>
                            @else
                            <span class="text-yellow">Bán hàng</span>
                            @endif
                        </td>
                        <td>
                            <?php
                                // $total = str_replace('.', '', $item->total);
                                // $total= number_format($item->total, 2, ',', '.');
                                ?>
                            {{ $item->total_price }} VNĐ
                        </td>
                        <td>{{ $item->method == 1 ? 'Tiền măt' : 'Chuyển khoản'}}</td>
                        <td>@if($item->status == 0)
                            <p class="text-warning">Chưa thanh toán</p>

                            @elseif($item->status == 1)
                            <p class="text-danger">Hủy</p>
                            @else
                            <p class="text-success">Đã thanh toán</p>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @can('list-bill')
                            <a @if ($item->type==2)
                                href="{{ route('dat-lich.hoa-don', ['id'=>$item->booking_detail_id]) }}"
                                @else
                                href="{{route('bill.detail',['id' => $item->id])}}"
                                @endif class="btn btn-sm btn-success">Chi
                                tiết</a>
                            @endcan
                            @can('edit-bill')
                            @if($item->status != 0)
                            <a href="{{ route('bill.edit', ['id' => $item->id]) }}"
                                class="btn btn-sm btn-warning">Sửa</a>
                            @endif
                            @endcan
                            @can('delete-bill')

                            <!-- <a class="text-secondary" data-toggle="modal" id="mediumButton"
                                data-target=".bd-example-modal-lg" data-attr="">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a> -->
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-center ">
                @if($bills == NULL)
                Không có dữ liệu
                @endif
            </h4>
            <div class="d-flex justify-content-center">
                {{ $bills->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>


<script>
    // display a modal (medium modal)
$(document).on('click', '#mediumButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#largeModal').modal("show");
            $('#mediumBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});
</script>

@endsection