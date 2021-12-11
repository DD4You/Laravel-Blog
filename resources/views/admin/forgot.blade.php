<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            font-size: 30px;
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

        .login-btn button:hover {
            background: var(--text-color);
            color: var(--action-color);
        }

        .error {
            color: red;
            margin-top: 4px;
            font-size: 15px;
        }
        .info {
            color: var(--action-color);
            margin-top: 4px;
            font-size: 15px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form action="{{ route('admin.forgot_password') }}" method="post">

            @if (Session::get('msg'))
                <span class="info">{{ Session::get('msg') }}</span>
            @endif


            @csrf
            <div class="input-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                <span class="error">@error('email') {{ $message }} @enderror</span>
            </div>

            <div class="login-btn">
                <button>Send Password Reset Link</button>
            </div>
        </form>
    </div>
</body>

</html>
