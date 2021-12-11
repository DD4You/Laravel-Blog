<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg: #282c34;
            --card-bg: #20232a;
            --action-color: #017cff;
            --text-color: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: var(--bg);
            height: 100vh;
            display: grid;
            place-items: center;
        }

        .container {
            background: var(--card-bg);
            width: 300px;
            padding: 30px 20px;
            border-radius: 10px;
            filter: drop-shadow(0px 2px 2px rgba(0, 0, 0, 0.2));
            filter: "progid:DXImageTransform.Microsoft.Dropshadow(OffX=0, OffY=1, Color='rgba(0, 0, 0, 0.2)')";
        }

        h1 {
            color: var(--text-color);
            text-align: center;
        }

        form {
            margin-top: 16px;
        }

        .input-group {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            color: var(--text-color);
        }

        input {
            padding: 6px;
            font-size: 16px;
            margin-top: 6px;
            border-radius: 5px;
            border: none;
            background: var(--bg);
            color: var(--text-color);
        }

        input:focus-visible {
            outline: none;
        }

        .login-btn {
            width: 100%;
            text-align: center;
            margin-top: 16px;
        }

        .login-btn button {
            padding: 6px 20px;
            font-size: 16px;
            background: var(--action-color);
            color: var(--text-color);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.5s;
        }
        .login-btn button:hover{
            background: var(--text-color);
            color: var(--action-color);
        }

        .forgot-password {
            margin-top: 8px;
        }

        .forgot-password a {
            color: var(--action-color);
            text-decoration: none;
            font-size: 14px;
        }

        .register-link {
            font-size: 14px;
            margin-top: 20px;
            color: var(--text-color);
        }

        .register-link a {
            color: var(--action-color);
            text-decoration: none;
        }
        .error{
            color: red;
            margin-top: 4px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reset Password</h1>
        <form action="{{route('admin.check')}}" method="post">

            @if (Session::get('fail'))
                <span class="error">{{Session::get('fail')}}</span>
            @endif

            @csrf
            <div class="input-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" value="{{old('email')}}" >
                <span class="error">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="input-group">
                <label for="email">New Password</label>
                <input type="email" id="email" name="email" placeholder="Enter new password" value="{{old('email')}}" >
                <span class="error">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="input-group">
                <label for="email">Confirm Password</label>
                <input type="email" id="email" name="email" placeholder="Enter confirm password" value="{{old('email')}}" >
                <span class="error">@error('email') {{$message}} @enderror</span>
            </div>
            
            <div class="login-btn">
                <button>Reset Password</button>
            </div>
        </form>
    </div>
</body>

</html>