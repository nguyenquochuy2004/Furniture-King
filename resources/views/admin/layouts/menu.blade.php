<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <lable class="navbar-brand" href="#">XIN CHÀO ADMIN</lable>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Danh mục Sản Phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Sản phẩm đề cử</a>
            </li>
        </ul>
        @if(Auth::check())
        <div class="user-menu ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdownMenu">
                <a class="dropdown-item" href="/profile">Cài đặt</a>
                <a class="dropdown-item" href="{{ route('admin.signout') }}">Đăng xuất</a>
            </div>
        </div>
        @endif
    </div>
</nav>
