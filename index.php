<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>BlackVault - Secret Await</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            max-width: 100vw;
            overflow-x: hidden;
        }
        body {
            min-height: 100vh;
            width: 100vw;
            background: url('images/slide01.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            color: #fff;
            margin: 0;
            overflow-x: hidden;
        }
        .navbar {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 2.5rem 1.5rem 2.5rem;
            box-sizing: border-box;
            background: rgba(34,34,34,0.22);
            border-radius: 0 0 24px 24px;
            box-shadow: 0 4px 24px 0 rgba(110,16,60,0.08);
            backdrop-filter: blur(8px);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .navbar .logo {
            font-size: 2.1rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.04em;
            text-shadow: 0 2px 12px rgba(0,0,0,0.18);
        }
        .navbar .nav-links {
            display: flex;
            gap: 1.2rem;
        }
        .navbar .nav-links a {
            background: #fff;
            color: #222;
            border-radius: 12px;
            padding: 0.7rem 1.7rem;
            font-size: 1.09rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, transform 0.1s;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.08);
        }
        .navbar .nav-links a:hover {
            background: #222;
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .main-content {
            max-width: 1100px;
            margin: 0 auto;
            margin-top: 3.5rem;
            background: none;
            border-radius: 24px;
            box-shadow: none;
            border: none;
            padding: 3.5rem 3rem 3rem 3rem;
            backdrop-filter: none;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            animation: fadeIn 0.7s cubic-bezier(.4,2,.6,1) 1;
            position: relative;
            z-index: 2;
            color: #fff;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(40px);}
            to { opacity: 1; transform: none;}
        }
        .main-content h1,
        .main-content h2,
        .main-content h3,
        .main-content h4 {
            color: #fff;
            text-shadow: 0 2px 24px #00000044;
        }
        .main-content h1 {
            font-size: 2.7rem;
            font-weight: 800;
            margin-bottom: 1.2rem;
            letter-spacing: 0.03em;
        }
        .main-content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            margin-top: 2.2rem;
        }
        .main-content p {
            color: #fff;
            font-size: 1.18rem;
            margin-bottom: 1.2rem;
            line-height: 1.7;
            max-width: 800px;
        }
        .features-list {
            display: flex;
            flex-wrap: wrap;
            gap: 2.5rem;
            margin-top: 2.5rem;
        }
        .feature-card {
            background: rgba(34,37,44,0.7);
            border-radius: 16px;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.08);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            width: 270px;
            color: #fff;
            text-align: left;
            transition: transform 0.15s, box-shadow 0.15s;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            backdrop-filter: blur(2px);
        }
        .feature-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);
        }
        .feature-card .icon {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: #fff;
        }
        .feature-card h3 {
            margin: 0 0 0.7rem 0;
            font-size: 1.18rem;
            color: #fff;
            font-weight: 700;
        }
        .feature-card p {
            font-size: 1.05rem;
            color: #fff;
            margin: 0;
        }
        .mystery-section {
            margin-top: 3.5rem;
            width: 100%;
            background: none;
            border-radius: 18px;
            box-shadow: none;
            padding: 2.2rem 1.5rem 2.5rem 1.5rem;
            color: #fff;
            position: relative;
            z-index: 2;
        }
        .mystery-section h2 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 1.2rem;
            font-weight: 800;
        }
        .mystery-section p {
            font-size: 1.18rem;
            color: #fff;
            margin-bottom: 1.2rem;
        }
        .mystery-boxes {
            display: flex;
            gap: 2.5rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }
        .mystery-box {
            background: rgba(34,37,44,0.7);
            border-radius: 18px;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.13);
            padding: 2.2rem 1.5rem 1.5rem 1.5rem;
            color: #fff;
            width: 220px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .mystery-box:hover {
            transform: scale(1.04) rotate(-2deg);
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.18);
        }
        .mystery-box .box-icon {
            font-size: 2.7rem;
            margin-bottom: 0.7rem;
            display: block;
            color: #fff;
        }
        .mystery-box h4 {
            color: #fff;
            font-size: 1.18rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        .mystery-box p {
            font-size: 1.05rem;
            color: #fff;
            margin: 0;
        }
        /* Responsive design pentru mobil */
        @media (max-width: 900px) {
            .main-content { padding: 2rem 0.7rem; }
            .features-list, .mystery-boxes { gap: 1.2rem; }
            .feature-card, .mystery-box { width: 100%; min-width: 220px; }
        }
        @media (max-width: 600px) {
            .navbar { flex-direction: column; gap: 1.2rem; padding: 1.2rem 0.5rem 1rem 0.5rem; }
            .main-content h1 { font-size: 1.2rem; }
            .main-content { margin-top: 1rem; padding: 1rem 0.2rem; min-width: 0; }
            .features-list, .mystery-boxes { flex-direction: column; gap: 0.7rem; }
            .feature-card, .mystery-box { width: 100%; min-width: 0; }
            .mystery-section { padding: 1.2rem 0.3rem 1.5rem 0.3rem; }
            .footer-contact { padding: 1.2rem 0 1rem 0; font-size: 0.98rem; }
        }
        /* Lupe zburătoare */
        .flying-loupe {
            position: fixed;
            top: 0;
            left: -100px;
            width: 60px;
            height: 60px;
            z-index: 1;
            opacity: 0.7;
            animation: flyLoupe linear infinite;
            pointer-events: none;
        }
        .flying-loupe.loupe1 { top: 12%; animation-duration: 13s; }
        .flying-loupe.loupe2 { top: 30%; animation-duration: 17s; animation-delay: 3s;}
        .flying-loupe.loupe3 { top: 55%; animation-duration: 21s; animation-delay: 7s;}
        .flying-loupe.loupe4 { top: 70%; animation-duration: 15s; animation-delay: 1s;}
        .flying-loupe.loupe5 { top: 85%; animation-duration: 19s; animation-delay: 5s;}
        .flying-loupe.loupe6 { top: 40%; animation-duration: 23s; animation-delay: 9s;}
        @keyframes flyLoupe {
            0% { left: -100px; transform: rotate(-10deg) scale(1);}
            90% { opacity: 0.7;}
            100% { left: 110vw; transform: rotate(20deg) scale(1.07); opacity: 0.1;}
        }
        /* Footer contact */
        .footer-contact {
            width: 100%;
            margin-top: 3rem;
            padding: 2rem 0 1.5rem 0;
            background: rgba(34,37,44,0.7);
            border-radius: 18px 18px 0 0;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.08);
            color: #fff;
            text-align: center;
        }
        .footer-contact a {
            color: #ffd700;
            text-decoration: underline;
            margin: 0 0.7em;
            font-weight: 500;
        }
        .footer-contact a:hover {
            color: #fff;
        }
    </style>
</head>
<nav class="navbar">
    <div class="logo">BlackVault</div>
    <div class="nav-links" id="nav-links"></div>
</nav>
<body>
    <!-- Lupe zburătoare pentru efect vizual -->
    <svg class="flying-loupe loupe1" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe2" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe3" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe4" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe5" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <svg class="flying-loupe loupe6" viewBox="0 0 60 60"><circle cx="25" cy="25" r="18" stroke="#fff" stroke-width="4" fill="none"/><rect x="38" y="38" width="14" height="6" rx="3" fill="#fff" transform="rotate(45 45 41)"/></svg>
    <nav class="navbar">
        <div class="logo">BlackVault</div>
        <div class="nav-links" id="nav-links">
            <!-- Link-urile vor fi generate dinamic -->
        </div>
    </nav>
    <div class="main-content">
        <h1>Only one step stands between you and the mistery</h1>
        <p>
             Behind every clue lies an untold story. Acces the classified files,examine the evidence,and uncover the truth - if you dare to seek it.
        </p>
        <h2>Ce te așteaptă la BlackVault?</h2>
        <div class="features-list">
            <div class="feature-card">
                <div class="icon">🕵️‍♂️</div>
                <h3>Jocuri de investigație</h3>
                <p>Descoperă jocuri unde vei analiza indicii, vei interoga suspecți și vei dezlega cazuri complexe ca un adevărat detectiv.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🔍</div>
                <h3>Mystery Box-uri tematice</h3>
                <p>Primești cutii surpriză cu accesorii, gadgeturi și provocări inspirate din universul detectivilor.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🧩</div>
                <h3>Enigme și puzzle-uri</h3>
                <p>Testează-ți logica și atenția la detalii cu puzzle-uri și mistere create special pentru pasionații de investigații.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🎲</div>
                <h3>Experiențe interactive</h3>
                <p>Participă la jocuri live, escape room-uri virtuale și provocări cu prietenii tăi detectivi.</p>
            </div>
            <div class="feature-card">
                <div class="icon">📦</div>
                <h3>Livrare rapidă</h3>
                <p>Primești cutiile și materialele de joc direct la ușă, gata de investigație!</p>
            </div>
            <div class="feature-card">
                <div class="icon">💬</div>
                <h3>Comunitate de detectivi</h3>
                <p>Alătură-te unei comunități de pasionați, schimbă idei și rezolvă mistere împreună cu alți detectivi.</p>
            </div>
        </div>
        <div class="mystery-section">
            <h2>🕵️ Ce este un BlackVault Case File?</h2>
            <p>
                  Un Mystery BlackVault Case File este un dosar interactiv de investigatie creat special pentru pasionatii de mistere,crime nerezolvate si enigme intunecate. Fiecare dosar contine o poveste captivanta,inspirata din cazuri fictive,dar tulburator de reale,si un set de indicii fizice - scrisori,fotografii,obiecte,documente clasificate - care te pun in rolul unui detectiv.
            </p>
            <div class="mystery-boxes">
                <div class="mystery-box">
                    <span class="box-icon">🗝️</span>
                    <h4>Cutia Enigmelor</h4>
                    <p>Conține puzzle-uri, coduri secrete și indicii pentru minți agere.</p>
                </div>
                <div class="mystery-box">
                    <span class="box-icon">🕵️‍♀️</span>
                    <h4>Detectiv Starter</h4>
                    <p>Tot ce ai nevoie pentru a începe aventura: lupă, carnețel, pix și provocări introductive.</p>
                </div>
                <div class="mystery-box">
                    <span class="box-icon">📜</span>
                    <h4>Cazul Secret</h4>
                    <p>Primești un dosar misterios cu poveste, suspecți și probe de analizat.</p>
                </div>
            </div>
        </div>
        <h2>Despre BlackVault</h2>
        <p>
            BlackVault este universul dedicat detectivilor moderni! Fie că ești pasionat de jocuri de investigație, escape room-uri sau vrei să-ți testezi abilitățile de deducție, aici găsești tot ce ai nevoie pentru a-ți pune mintea la încercare.
        </p>
        <p>
            <strong>Devino detectiv cu BlackVault și rezolvă mistere la fiecare pas!</strong>
        </p>
    </div>
    <!-- Footer cu informații de contact și social media -->
    <footer class="footer-contact">
        <div style="font-size:1.15rem;margin-bottom:1rem;">
            Ne puteți găsi pe:
            <a href="https://instagram.com/blackvault" target="_blank">Instagram</a>
            <a href="https://facebook.com/blackvault" target="_blank">Facebook</a>
            <a href="https://tiktok.com/@blackvault" target="_blank">TikTok</a>
        </div>
        <div style="font-size:1.08rem;">
            Pentru orice nelămurire, ne puteți scrie pe mail la
            <a href="mailto:support@blackvault.ro">s.blackvault@yahoo.com</a>
        </div>
    </footer>
    <script>
        // Navbar dinamic: ascunde/afișează login/register dacă ești logat
        function renderNavLinks() {
            const nav = document.getElementById('nav-links');
            const user = localStorage.getItem('user_curent');
            let html = `
                <a href="index.php">Acasă</a>
                <a href="produse.html">Jocuri</a>
                <a href="cos.html">Coș</a>
            `;
            if (user) {
                html += `
                    <a href="cont.html">Contul meu</a>
                    <a href="#" id="logout-link" style="background:#fff;color:#222;">Deconectare</a>
                `;
            } else {
                html += `
    <a href="login_form.php">Login</a>
    <a href="register_form.php"">Înregistrare</a>
`;
            }
            nav.innerHTML = html;
            // Delogare rapidă
            setTimeout(() => {
                const logout = document.getElementById('logout-link');
                if (logout) logout.onclick = function(e) {
                    e.preventDefault();
                    localStorage.removeItem('user_curent');
                    window.location.href = "login_form.php";
                };
            }, 100);
        }
        renderNavLinks();
    </script>
</body>
</html>