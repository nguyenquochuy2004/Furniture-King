<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Đăng nhập</title>
    <style>
        .alert {
            position: relative;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        
        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            color: inherit;
        }
    </style>
</head>

<body>

    <form action="{{ route('login') }}" method="POST" role="form">
        @csrf
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                <label for="tab-1" class="tab">ĐĂNG NHẬP</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up">
                <label for="tab-2" class="tab"><a href="{{ asset('register') }}">ĐĂNG KÝ</a></label>
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Input field">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Input field">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Duy trì đăng nhập</label>
                        </div>
                        <div class="group">
                            <button type="submit" class="button">Đăng nhập</button>
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">Bạn quên mật khẩu?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Include jQuery and Bootstrap's JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".close").click(function() {
                $(this).closest(".alert").fadeOut();
            });
        });
    </script>
</body>

</html>
