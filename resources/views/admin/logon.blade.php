<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Đăng Nhập Admin</title>
</head>
<body>

    <form action="{{route('admin.logon')}}" method="POST" role="form">
        @csrf
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                <label for="tab-1" class="tab">ĐĂNG NHẬP ADMIN </label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Input field">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Input field">
                        </div><br>
                        <div class="group">
                            <button type="submit" class="button">Đăng nhập</button>
                        </div>
                        
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Include jQuery and Bootstrap's JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
