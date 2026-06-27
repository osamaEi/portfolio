<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<div class="login-wrap">
    <div class="login-card">
        <h1>Welcome back 👋</h1>
        <p class="sub">Sign in to manage your portfolio.</p>

        <form method="POST" action="{{ route('admin.login.attempt') }}" class="form-grid">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="field-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin:0;">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" style="justify-content:center;">Sign in</button>
        </form>
    </div>
</div>
</body>
</html>
