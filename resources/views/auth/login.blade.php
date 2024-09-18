<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCHOOL Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://www.nyandaruahighschool.co.ke/assets/images/283.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/User_Avatar.png" alt="Avatar" class="avatar">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
        </form>
    </div>
</body>
</html>
