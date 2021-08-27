<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{asset('rs/css/bootstrap.min.css')}}">
    <script src="{{asset('rs/js/bootstrap.min.js')}}"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('rs/style.css')}}" />
    <link rel="stylesheet" href="{{asset('rs/fontawesome-free-5.15.3-web/css/all.min.css')}}" />

    <title>@yield('title')</title>
</head>

<body>

    <section class="mainmenu">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <a href="/">
                        <img src="{{asset('images/logo.png')}}" style="height:30px;width:100px;" class=" my-2" />
                    </a>

                </div>

                <div class="col-md-6 " id="mainmenu">
                    @include('pages.mainmenu')
                </div>


                <div class="col-md-3 auth my-2">
                    @if(Auth::check())
                    <li class="text-center"><a href="#">Chào Bạn :{{Auth::user()->fullname}}</a></li>
                    <li class="text-center"><a href="{{asset('logout')}}"> <i class="fas fa-sign-out-alt"></i></a></li>
                    @else
                    <a href="{{asset('login')}}"> <i class="fas fa-lock"></i>Đăng Nhập</a> <a href="{{asset('dangki')}}"><i class="fas fa-registered"></i>Đăng Kí</a>

                    @endif

                </div>
                @if(Session::has("Cart") !=null)
                <div class="col-md-2 my-3">
                    <a href="{{asset('/listcart')}}" style="color: #000;">Giỏ Hàng ({{Session::get("Cart")->tongsl}})</a>
                </div>
                @else
                <div class="col-md-2 my-3">
                    <a href="{{asset('/listcart')}}" style="color: #000;">Giỏ Hàng(0)</a>
                </div>
                @endif
            </div>
        </div>

    </section>

    <section class="slider">

        @yield('slider')

    </section>
    <section id="categorypt">
        @yield('category')
    </section>
    @yield('content')
    <section class="footer my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        <li><a href="#"></a>Hades Flagship Store: 121 Nguyễn Trãi Q.1</li>
                        <li><a href="#"></a>Store 2: 26 LÝ TỰ TRỌNG Q.1 ( THE NEW PLAYROUND)</li>
                        <li><a href="#"></a>Store 3: 350 ĐIỆN BIÊN PHỦ F17 Q. BÌNH THẠNH ( G TOWN)</li>
                        <li><a href="#"></a>Store 4: 235 Phan Trung, thành phố Biên Hòa</li>
                        <li><a href="#"></a>Store 5: 15 Nguyễn Việt Hồng, quận Ninh Kiều, thành phố Cần Thơ</li>
                        <li><a href="#"></a>Store 4: 235 Phan Trung, thành phố Biên Hòa</li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>
                        <li><a href="#"></a>Chính sách sử dụng website</li>
                        <li><a href="#"></a>Phương thức thanh toán</li>
                        <li><a href="#"></a>Chính sách bảo mật</li>
                        <li><a href="#"></a>Chính sách giao nhận - vận chuyển</li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul>

                        <li> <a><i class="fab fa-facebook"></i></a></li>

                        <li> <a><i class="fab fa-instagram"></i></a></li>

                        <li> <a><i class="fab fa-telegram"></i></a></li>
                        <li> <a><i class="fab fa-google"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>





    <script src="{{asset('rs/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('rs/js/popper.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- 
    RTL version
-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <script type="text/javascript">
        function AddCart(id) {

            $.ajax({
                url: 'Add-Cart/' + id,
                type: 'GET',

            }).done(function(response) {
                alertify.success("Đã thêm vào giỏ hàng");
            });
        }
    </script>
</body>

</html>