<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>SHOP LỪA ĐẢO</title>
</head>
<body>
    <div class="header">
        <div class="header2">
            <a href=""><i class="fa-solid fa-house"></i>Trang chủ</a>
            <a href="/error">Giới thiệu</a>
            <a href=""><i class="fa-solid fa-truck-fast"></i> Giao hàng xuyên Lục Địa</a>
            <a href="/product details"><i class="fa-solid fa-phone"></i> HOTLINE: 0678 910J QKA </a>
            <a href=""><i class="fa-solid fa-envelope"></i>Email: LuaDaoShop@gmail.com</a>
            <a href=""></i></a>
        </div>
    </div>
    <hr>
    <div class="logo">
        <div class="menu">
            <ul>
                <div class="search-box">
                    <input type="search" placeholder="     Search...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="login">
                    <a href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
                    @if(Auth::check())
                    <div class="user-menu">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>{{ Auth::user()->name }}
                        <div class="dropdown-content">
                            <a href="/profile">Cài đặt</a>
                            <a href="{{ asset('logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                    @else
                    <a href="{{ asset('login') }}"><i class="fa-solid fa-right-to-bracket"></i></a>
                    @endif
                </div>
                <li><a>SẢN PHẨM</a>
                    <ul class="submenu">
                        @foreach ($categories as $value)
                            <li><a href="#">{{ $value->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">PHÒNG</a>
                    <ul class="submenu">
                        <li><a href="#">Phòng khách</a></li>
                        <li><a href="#">Phòng ngủ</a></li>
                        <li><a href="#">Phòng bếp</a></li>
                        <li><a href="#">Phòng tắm</a></li>
                        <li><a href="#">Phòng làm việc</a></li>
                    </ul>
                </li>
                <li><a href="#">COMBO</a></li>
            </ul>
        </div>
        <div class="pyramid-loader">
            <div class="wrapper">
                <span class="side side1"></span>
                <span class="side side2"></span>
                <span class="side side3"></span>
                <span class="side side4"></span>
                <span class="shadow"></span>
            </div>
            <div class="name">
                <marquee behavior="" direction="left"><a href="">LỪA ĐẢO SHOP </a></marquee>
            </div>
        </div>
    </div>
    <br>
    @yield('main')
</body>
</html>
