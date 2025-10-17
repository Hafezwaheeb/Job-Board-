<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Login - Job Board</title>
</head>

<body>
    <div class="auth-page">
        <div class="auth-card">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Sign in to your account</p>

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-checkbox-label">
                        <input type="checkbox" name="remember" class="form-checkbox">
                        Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-full">Sign In</button>
            </form>
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <div class="auth-footer">
                <p>Don't have an account? <a href="/signup" class="auth-link">Sign up</a></p>
            </div>
        </div>
    </div>
</body>

</html>
