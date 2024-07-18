<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Đăng Ký</title>
</head>

<body>
    <form action="{{ route('register') }}" method="POST" role="form">
        @csrf
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                <label for="tab-1" class="tab"><a href="{{ route('login') }}">ĐĂNG NHẬP</a></label>
                <input id="tab-2" type="radio" name="tab" class="sign-up">
                <label for="tab-2" class="tab">ĐĂNG KÝ</label>
                <div class="login-form">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="email" class="label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                            @error('email')<small class="error">{{ $message }}</small>@enderror
                        </div>
                        <div class="group">
                            <label for="name" class="label">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
                            @error('name')<small class="error">{{ $message }}</small>@enderror
                        </div>
                        <div class="group">
                            <label for="password" class="label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            @error('password')<small class="error">{{ $message }}</small>@enderror
                        </div>
                        <div class="group">
                            <label for="confirm_password" class="label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                            @error('confirm_password')<small class="error">{{ $message }}</small>@enderror
                        </div>
                        <div class="group">
                            <button type="submit" class="button">Đăng Ký</button>
                        </div>
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
