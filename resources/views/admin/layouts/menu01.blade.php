<div class="header">
    <div class="header2">
        <a href="{{ route('index') }}"><i class="fa-solid fa-house"></i>Trang chủ</a>
        <a href=""><i class="fa-solid fa-circle-info"></i> Giới thiệu</a>
        <a href=""><i class="fa-solid fa-truck-fast"></i> Miễn Phí Giao Hàng</a>
        <a href="/product details"><i class="fa-solid fa-phone"></i> HOTLINE: 0388838472 </a>
        <a href=""><i class="fa-solid fa-envelope"></i>Email: nguyenquochuygg20042004@gmail.com</a>
        <a href=""></i></a>
    </div>
</div>
<hr>
<div class="logo">
    <div class="menu">
        <ul>
            <form action={{route('search')}} method="POST">
                <div class="search-box">
                    <input name="key" placeholder="     Search...">
                    <input style="width: 80px" type="submit" name="search" value="Tìm kiếm" >
                    {{-- <button><i class="fa-solid fa-magnifying-glass"></i></button> --}}
                </div>
            </form>
            <div class="container mt-5">
                <div class="login">
                    <div class="cart-icon">
                        <a href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <span class="cart-quantity">{{ $cart->getTotalquantity() }}</span>
                    </div>
                    @if (Auth::check())
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
            </div>
            <li><a>SẢN PHẨM</a>
                <ul class="submenu">
                    @foreach ($categories as $value)
                        <li><a href="{{ route('fe.category', $value->id) }}">{{ $value->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">PHÒNG</a>
                <ul class="submenu">
                    <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                            href="#">Phòng khách</a></li>
                    <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                            href="#">Phòng ngủ</a></li>
                    <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                            href="#">Phòng bếp</a></li>
                    <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                            href="#">Phòng tắm</a></li>
                    <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                            href="#">Phòng làm việc</a></li>
                </ul>
            </li>
            <li onclick="return confirm('Hệ thống đang trong trạng thái nâng cấp, xin thử lại sau')"><a
                    href="#">COMBO</a></li>
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
            <marquee behavior="" direction="left"><a href="" style=" font-weight:bold;font-size: 15px">
                    FURNITURE KING </a></marquee>
        </div>
    </div><br><br>
    <div>
        @yield('content')
    </div>
</div><br><br>
