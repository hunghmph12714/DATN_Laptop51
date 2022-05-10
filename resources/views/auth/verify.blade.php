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
    <h1 style="padding: 55px 0 55px;" class="breadcrumbs-title">Xác thực tài khoản</h1>
    <div class="login-section">
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
                            @if(!Auth::check())
                            <p>Bạn đã có tài khoản? <a href="/login"> Nhấp vào đây để đăng nhập!</a></p>
                            @endif
                            <form method="POST" action="{{route('resend.verify')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" id="slug" @if(Auth::check()) @endif onkeyup="ChangeToSlug()"
                                            class="@error('phone') is-invalid @enderror mb-0 mt-4"
                                            value=@if(Auth::check()) {{Auth::user()->phone}}
                                            @elseif(session()->has('phone_verify'))
                                        "{{session()->get('phone_verify')}}"
                                        "{{ old('phone') }}"
                                        @endif
                                        name="phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="submit-btn-1 btn-hover-1 mb-0 mt-4" type="submit">Gửi lại
                                            mã</button>
                                    </div>
                                </div>
                            </form>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <form method="POST" action="{{route('verify')}}">
                                @csrf
                                <input id="convert_slug" type="hidden"
                                    class="@error('phone') is-invalid @enderror mb-0 mt-4" value=@if(Auth::check())
                                    {{Auth::user()->phone}} @elseif(session()->has('phone_verify'))
                                "{{session()->get('phone_verify')}}"
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
                                        <button class="submit-btn-1 btn-hover-1" type="submit">Xác minh</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout_client.script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function ChangeToSlug() {
        var slug;
        //Lấy text từ thẻ input title 
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }
    </script>
    <script>
    if (window.performance.navigation.type === 2) {
        location.reload();
    }
    </script>
</body>

</html>