<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="container">
        <div class="login__header">
            <h2 class="heading">Quản lý nhà sách</h2>
        </div>

        <div class="login__body">
            <form action="/login" method="POST">
                @csrf

                <div class="input__wrapper">
                    <input type="text" name='username' id="username" placeholder="Tên đăng nhập..." value="{{ old('username') }}">

                    @error('username')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input__wrapper input-password">
                    {{-- <input type="password" name='password' id="password" placeholder="Mật khẩu..." value="{{ old('password') }}"> --}}
                    <input type="password" name='password' id="password" placeholder="Mật khẩu...">

                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror
                    <i class="fas fa-eye"></i>
                </div>
                {{-- <a href="forgot-password" class="forgot">Quên mật khẩu</a> --}}
                <button class="btn-submit"type="submit">Đăng nhập</button>
            </form>
        </div>
        {{-- <div class="signup">
           Bạn chưa có tài khoản. Đăng ký <a href ="">Tại đây</a>
        </div> --}}
    </div>
    <script src="js/login.js"></script>
</body>
</html>
