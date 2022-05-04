<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <title>Bệnh Viện Laptop 51</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layout_client.style')

</head>

<body>

    @include('layout_client.menu')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Xác thực tài khoản</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Trang chủ</a></li>
                                <li>Xác thực tài khoản</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-section mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6  pb-5">
                    <div class="registered-customers">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                        <div class="login-account p-30 box-shadow">
                            <p>Bạn đã có tài khoản? <a href="/login"> Nhấp vào đây để đăng nhập!</a></p>
                            <form method="POST" action="{{route('resend.verify')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" id="slug" onkeyup="ChangeToSlug()"
                                            class="@error('phone') is-invalid @enderror mb-0 mt-4"
                                            value=@if(session()->has('phone_verify'))
                                        "{{session()->get('phone_verify')}}"
                                        @else
                                        "{{ old('phone') }}"
                                        @endif
                                        name="phone" placeholder="Số điện thoại">
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="col-md-4">
                                        <button class="submit-btn-1 btn-hover-1 mb-0 mt-4" type="submit">Gửi lại
                                            mã</button>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="{{route('verify')}}">
                                @csrf
                                <input id="convert_slug" type="hidden"
                                    class="@error('phone') is-invalid @enderror mb-0 mt-4"
                                    value=@if(session()->has('phone_verify'))
                                "{{session()->get('phone_verify')}}"
                                @else
                                "{{ old('phone') }}"
                                @endif
                                name="phone" placeholder="Số điện thoại">
                                <input type="text" name="verification_code" class="mb-0 mt-4" placeholder="Mã">
                                @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <p><small>Nhập số điện thoại rồi nhấn gửi mã</small></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <button class="submit-btn-1 btn-hover-1 f-right" type="reset">Đăng nhâp bằng
                                            OTP</button>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>