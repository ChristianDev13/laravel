<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #081c15,
                    #1b4332,
                    #2d6a4f
                );
        }

        .login-container {
            width: 420px;
            max-width: 92%;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 18px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            color: #102a2e;
            font-size: 30px;
        }

        .logo span {
            color: #52b788;
        }

        .logo p {
            color: #777;
            margin-top: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 14px;

            border: 1px solid #ddd;
            border-radius: 8px;

            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2d6a4f;
        }

        .login-btn {
            width: 100%;
            padding: 14px;

            background: #2d6a4f;
            color: white;

            border: none;
            border-radius: 8px;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;
        }

        .login-btn:hover {
            background: #1b4332;
        }

        .register {
            text-align: center;
            margin-top: 25px;
            color: #777;
        }

        .register a {
            color: #2d6a4f;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            background: #f8d7da;
            color: #842029;

            padding: 12px;
            border-radius: 7px;

            margin-bottom: 20px;

            font-size: 14px;
        }

    </style>

</head>

<body>

<div class="login-container">

    <div class="card">

        <div class="logo">

            <h1>
                Product<span>Hub</span>
            </h1>

            <p>Admin Login</p>

        </div>


        @if($errors->any())

            <div class="error">

                {{ $errors->first() }}

            </div>

        @endif


        <form method="POST"
              action="{{ route('login') }}">

            @csrf


            <div class="input-group">

                <label>
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                >

            </div>


            <div class="input-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-btn"
            >
                Login
            </button>

        </form>


        <div class="register">

            Don't have an account?

            <a href="{{ route('register') }}">
                Register
            </a>

        </div>

    </div>

</div>

</body>

</html>