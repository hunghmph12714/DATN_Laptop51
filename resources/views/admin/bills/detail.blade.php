@extends('admin.layouts.main')
@section('title', 'Chi tiết hóa đơn')
@section('content')

<form action="" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="row ml-2">
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Tên người mua</label>
                    <input type="text" name="name" disabled value="{{ old('total', $bill_user->name) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" disabled value="{{ old('email', $bill_user->email) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" disabled value="{{ old('phone', $bill_user->phone) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" disabled value="{{ $bill_user->address }}" class="form-control"
                        placeholder="">
                </div>

            </div>
            <div class="col-6 mt-2">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Mã hóa đơn</label>
                            <input type="text" name="code" disabled value="{{ old('code', $bill->code) }}"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                            <label for="">Phương thức thanh toán</label>
                            <select disabled name="payment_method" class="form-control">
                                @if($bill->payment_method == 1)
                                <option disabled value="{{$bill->payment_method}}">Tiền mặt</option>
                                <option value="2">Chuyển khoản</option>
                                @elseif($bill->payment_method == 2)
                                <option disabled value="{{$bill->payment_method}}">Chuyển khoản</option>
                                <option value="1">Tiền mặt</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" name="total" disabled value="{{ old('total', $bill->total) }} VNĐ"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Trạng thái thanh toán</label>
                            <select disabled name="payment_status" class="form-control">
                                @if($bill->payment_status == 0)
                                <option disabled value="{{$bill->payment_status}}">Chưa thanh toán</option>
                                <option value="1">Thanh toán thất bại</option>
                                <option value="9">Thanh toán thành công</option>
                                @elseif($bill->payment_status == 1)
                                <option value="{{$bill->payment_status}}">Thanh toán thất bại</option>
                                <option value="0">Chưa thanh toán</option>
                                <option value="9">Thanh toán thành công</option>
                                @elseif($bill->payment_status == 9)
                                <option value="{{$bill->payment_status}}">Thanh toán thành công</option>
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Thanh toán thất bại</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ngày tạo</label>
                    <input type="text" name="created_at" disabled value="{{ old('created_at', $bill->created_at) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    <textarea disabled class="form-control" name="note" id="">{{$bill_user->note}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group mb-0 pb-0 text-center">
            <label class="mb-0 pb-0 text-center" for="">Sản phẩm đã mua</label>
        </div>
        <hr>
        <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Tên sản phẩm</p>
                </th>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Giá</p>
                </th>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Số lượng</p>
                </th>
                <th class="p-0">
                    <!-- <button type="button ms-auto" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button> -->
                </th>
            </tr>
            @foreach($bill_detail as $bill_d)
            <tr>
                <td><select disabled name="product_id" class="form-control">
                        @foreach ($prod as $pro)
                        <option @if ($pro->id == $bill_d->product_id) selected @endif value="{{ $pro->id }}">
                            {{ $pro->name }}</option>
                        @endforeach
                        <!-- <option value="{{$bill_d->product->id}}">{{$bill_d->product->name}}</option> -->
                    </select></td>
                <!-- <td><input disabled type="text" value="{{$bill_d->product->name}}" name="addMoreInputFields[0][subject]"
                        placeholder="Tên sản phẩm" class="form-control" />
                </td> -->
                <td><input disabled type="text" value="{{$bill_d->price}}" name="addMoreInputFields[0][subject]"
                        placeholder="Nhập giá" class="form-control" /></td>
                <td><input disabled type="text" value="{{$bill_d->qty}}" name="addMoreInputFields[0][subject]"
                        placeholder="Số lượng" class="form-control" /></td>
                <!-- <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Thêm sản
                        phẩm</button></td> -->
            </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-end mb-2 mr-2">
            <br>
            <a href="{{ route('bill.index') }}" class="btn btn-sm btn-danger">Quay lai</a>
            &nbsp;

        </div>
    </div>
    </div>
</form>
@endsection