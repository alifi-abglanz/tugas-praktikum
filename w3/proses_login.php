<?php
session_start();

$validUsername = 'Alexander';
$validPassword = '123321';
$error = '';

if (!isset($_SESSION['username']) && isset($_COOKIE['remember_user'], $_COOKIE['remember_key'])) {
    $cookieUser = $_COOKIE['remember_user'];
    $cookieKey = $_COOKIE['remember_key'];

    if (hash('sha256', $cookieUser) === $cookieKey) {
        $_SESSION['username'] = $cookieUser;
    }
}

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember_me']);

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('remember_user', $username, time() + (3600), '/');
            setcookie('remember_key', hash('sha256', $username), time() + (3600), '/');
        } else {
            setcookie('remember_user', '', time() - 3600, '/');
            setcookie('remember_key', '', time() - 3600, '/');
        }

        header('Location: index.php');
        exit;
    }

    $error = 'Username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cibaduyut Shoes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
       
    </style>
</head>
<body>
    <nav>
        <div class="nav-title">Cibaduyut Shoes.
             <button id="btn-theme" class="btn-outline-light btn-sm">
                Mode Gelap
             </button>
        </div>
    </nav>

    <section class="hero" style="height: 35vh; margin-bottom: 32px;">
        <div class="hero-content">
            <h1>Selamat Datang</h1>
            <p>Masuk untuk melihat koleksi premium.</p>
        </div>
    </section>

    <div class="login-wrap">
        <div class="login-card">
            <h2>Login Akun</h2>
            <p>Gunakan akun Anda untuk melanjutkan.</p>

            <?php if ($error !== ''): ?>
                <div class="error-box"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="proses_login.php">
                <label class="input-label" for="username">Username</label>
                <input class="text-input" type="text" id="username" name="username" required>

                <label class="input-label" for="password">Password</label>
                <input class="text-input" type="password" id="password" name="password" required>

                <label class="remember-row">
                    <input type="checkbox" name="remember_me"> Remember me
                </label>

                <button class="btn-main login-btn" type="submit">Login</button>
            </form>

            <p style="margin-top:16px; margin-bottom:0; font-size:13px;">Akun demo: <code>Alexander</code> / <code>123321</code></p>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Cibaduyut Shoes.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
