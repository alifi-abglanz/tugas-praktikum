
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cibaduyut Shoes</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    <nav>
        <div class="nav-title">Cibaduyut Shoes.
             <button id="btn-theme" class="btn-outline-light btn-sm">
                Mode Gelap
             </button>
        </div>
        
    </nav>

    <section class="hero" style="height: 35vh; margin-bottom: 32px; background-image: url('{{ asset('assets/background.jpg') }}'); background-size: cover; background-position: center;">
        <div class="hero-content">
            <h1>Selamat Datang</h1>
            <p>Masuk untuk melihat koleksi premium.</p>
        </div>   
    </section>

    <div class="login-wrap">
        <div class="login-card">
            <h2>Login Akun</h2>
            <p>Gunakan akun Anda untuk melanjutkan.</p>

            @if(session('error'))
                <div class="error-box">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label class="input-label" for="username">Username</label>
                <input class="text-input" type="text" id="username" name="username" value="{{ old('username') }}" required>

                <label class="input-label" for="password">Password</label>
                <input class="text-input" type="password" id="password" name="password" required>

                <label class="remember-row">
                    <input type="checkbox" name="remember_me"> Remember me
                </label>

                <button class="btn-main login-btn" type="submit">Login</button>
            </form>

            <p style="margin-top:16px; margin-bottom:0; font-size:13px;">Akun demo: <code>admin</code> / <code>123</code></p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Cibaduyut Shoes.</p>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
