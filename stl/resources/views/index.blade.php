<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STL</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
       @if(session('logged_in'))
        <script>
            window.location.href = "{{ route('dashboard') }}";
        </script>
    @endif
    <div class="login-container">
       <div class="login-box">
            <div class="image-container flex item-center justify-center ">
                <img src="{{ asset('image/ckcm.png') }}">
            </div>
            <span>Just Made v1.2025.07</span>
            <h2>Sign in to your Lotto</h2>
            <h1>Account...</h1>
            <div class="login-form-box">
                <form method="POST" action="{{ route('login.process') }}">
                    @csrf

                    @if(session('error'))
                        <div style="color: red;">{{ session('error') }}</div>
                    @endif

                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                     @error('username')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" placeholder="Password" required >
                    @error('password')
                    <small class="text-red-600">{{ $message }}</small>
                    @enderror

                    <div class="loginBtn">
                        <button type="submit">Sign in Now</button>
                    </div>
                    <div class="term-condition">
                        <p>By clicking “Sign in”, you agree to our Terms of Service and Privacy Statement. We’ll occasionally send you account related emails.</p>
                    </div>
                    <div class="footer">
                        <p>Lotto ni Choy is a Trademark of Hondrada John Mark.
                        Copyright © 2025-2027 LNC Technologies, LLC.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        html, body {
            background: url("{{ asset('image/background.png') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
</body>
</html>
