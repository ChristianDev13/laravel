<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Registration</title>

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

        .container {
            width: 450px;
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
            margin-bottom: 25px;
        }

        .logo h1 {
            color: #102a2e;
        }

        .logo span {
            color: #52b788;
        }

        .logo p {
            color: #777;
            margin-top: 7px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;

            padding: 13px;

            border: 1px solid #ddd;
            border-radius: 8px;

            outline: none;
        }

        input:focus {
            border-color: #2d6a4f;
        }

        .register-btn {
            width: 100%;

            padding: 14px;

            background: #2d6a4f;
            color: white;

            border: none;
            border-radius: 8px;

            font-weight: bold;
            font-size: 15px;

            cursor: pointer;
        }

        .register-btn:hover {
            background: #1b4332;
        }

        .login {
            text-align: center;
            margin-top: 22px;
            color: #777;
        }

        .login a {
            color: #2d6a4f;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            color: #842029;
            background: #f8d7da;

            padding: 10px;

            border-radius: 7px;

            margin-bottom: 15px;

            font-size: 13px;
        }
        
                .password-box {
            position: relative;
            width: 100%;
        }

        .password-box input {
            width: 100%;
            padding: 12px 45px 12px 12px;
            margin-bottom: 0;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);

            width: 35px;
            height: 35px;

            padding: 0;
            margin: 0;

            background: transparent;
            color: #555;

            border: none;
            cursor: pointer;

            font-size: 18px;
        }

        .toggle-password:hover {
            background: transparent;
            color: #2d6a4f;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <div class="logo">

            <h1>
                Product<span>Hub</span>
            </h1>

            <p>Create Admin Account</p>

        </div>


        @if($errors->any())

            <div class="error">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('register') }}"
        >

            @csrf


            <div class="input-group">

                <label>
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your name"
                    required
                >

            </div>


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


                <!-- Password -->
        <div class="input-group">

            <label>Password</label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword('password', this)"
                >
                    👁
                </button>

            </div>

        </div>


        <!-- Confirm Password -->
        <div class="input-group">

            <label>Confirm Password</label>

            <div class="password-box">

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm password"
                    required
                >

                <button
                    type="button"
                    class="toggle-password"
                    onclick="togglePassword('password_confirmation', this)"
                >
                    👁
                </button>

            </div>

        </div>


            <button
                type="submit"
                class="register-btn"
            >
                Create Account
            </button>

        </form>


        <div class="login">

            Already have an account?

            <a href="{{ route('login') }}">
                Login
            </a>

        </div>

    </div>

</div>

    <script>

function togglePassword(inputId, button) {

    const passwordInput = document.getElementById(inputId);

    if (passwordInput.type === "password") {

        passwordInput.type = "text";

        button.textContent = "🙈";

    } else {

        passwordInput.type = "password";

        button.textContent = "👁";

    }

}

</script>

</body>

</html>