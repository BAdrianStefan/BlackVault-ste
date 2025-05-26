
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Autentificare - BlackVault</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/slide01.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            min-height: 100vh;
        }
        .flying-loupe {
            position: absolute;
            opacity: 0.18;
            pointer-events: none;
            animation: fly 18s linear infinite;
        }
        .loupe1 { top: 10%; left: 5%; width: 60px; animation-delay: 0s;}
        .loupe2 { top: 30%; left: 80%; width: 50px; animation-delay: 3s;}
        .loupe3 { top: 60%; left: 15%; width: 40px; animation-delay: 6s;}
        .loupe4 { top: 80%; left: 60%; width: 55px; animation-delay: 9s;}
        .loupe5 { top: 50%; left: 40%; width: 45px; animation-delay: 12s;}
        .loupe6 { top: 20%; left: 70%; width: 35px; animation-delay: 15s;}
        @keyframes fly {
            0% { transform: translateY(0) scale(1);}
            50% { transform: translateY(-40px) scale(1.1);}
            100% { transform: translateY(0) scale(1);}
        }
        .login-container {
            background: rgba(30,30,30,0.92);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px #0004;
            width: 350px;
            margin: 80px auto 0 auto;
        }
        h2 { text-align: center; }
        .input-group { margin-bottom: 1rem; }
        .input-group label { display: block; margin-bottom: 0.3rem; }
        .input-group input { width: 100%; padding: 0.5rem; border-radius: 6px; border: none; }
        .btn-login { width: 100%; padding: 0.7rem; border: none; border-radius: 8px; background: #ffd700; color: #222; font-weight: bold; cursor: pointer; }
        .btn-login:hover { background: #fff; }
        .msg { text-align: center; margin-top: 1rem; min-height: 1.2em; }
        .links { text-align: center; margin-top: 1.2rem; }
        a { color: #ffd700; text-decoration: underline; }
    </style>
</head>
<body>
    <!-- SVG-uri pentru efectul de lupe zburătoare -->
    <svg class="flying-loupe loupe1" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe2" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe3" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe4" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe5" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe6" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>

    <div class="login-container">
        <h2>Autentificare</h2>
        <form method="POST" action="login.php" autocomplete="off">
            <div class="input-group">
                <label for="login-user">Email</label>
                <input type="email" id="login-user" name="login_user" required>
            </div>
            <div class="input-group">
                <label for="login-pass">Parolă</label>
                <input type="password" id="login-pass" name="login_pass" required>
            </div>
            <button type="submit" class="btn-login">Autentificare</button>
        </form>
        <div class="msg" id="login-msg">
            <?php
            if (isset($_GET['error'])) {
                echo '<span style="color:#c92727;">' . htmlspecialchars($_GET['error']) . '</span>';
            }
            if (isset($_GET['success'])) {
                echo '<span style="color:#27c940;">' . htmlspecialchars($_GET['success']) . '</span>';
            }
            ?>
        </div>
        <div class="links">
            <a href="register_form.php">Nu ai cont? Înregistrează-te</a>
        </div>
    </div>
</body>
</html>