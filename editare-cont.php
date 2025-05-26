<?php
session_start();
$host = "localhost";
$user = "blackvau_admin";
$pass = "MARIANAmama2000@";
$db   = "blackvau_Db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Eroare conexiune: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'] ?? 0;

// Preluare detalii user
$user_details = null;
if ($user_id) {
    $sql = "SELECT id, nume, email, tip, data_inregistrare, avatar FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $rez = $stmt->get_result();
    $user_details = $rez->fetch_assoc();
    $stmt->close();
}

// Procesare formular
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user_details) {
    $nume = trim($_POST['nume']);
    $email = trim($_POST['email']);
    $avatar = $user_details['avatar'] ?? null;

    // Procesare upload imagine
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($ext, $allowed)) {
            $newname = 'uploads/avatar_' . $user_id . '_' . time() . '.' . $ext;
            if (!is_dir('uploads')) mkdir('uploads');
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $newname)) {
                $avatar = $newname;
            } else {
                $msg = "Eroare la încărcarea imaginii.";
            }
        } else {
            $msg = "Format imagine invalid. Folosește jpg, jpeg, png sau gif.";
        }
    }

    // Update user
    if (!$msg) {
        $sql = "UPDATE user SET nume=?, email=?, avatar=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nume, $email, $avatar, $user_id);
        if ($stmt->execute()) {
            $msg = "Datele au fost actualizate!";
            // Refresh date
            $user_details['nume'] = $nume;
            $user_details['email'] = $email;
            $user_details['avatar'] = $avatar;
        } else {
            $msg = "Eroare la actualizare.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Editare profil - BlackVault</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: url('images/slide01.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            color: #fff;
            margin: 0;
            overflow-x: hidden;
        }
        .main-content {
            max-width: 420px;
            margin: 3.5rem auto 0 auto;
            background: rgba(255,255,255,0.13);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            border: 1.5px solid rgba(255,255,255,0.18);
            padding: 2.5rem 2rem 2rem 2rem;
            backdrop-filter: blur(16px);
            min-height: 350px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            animation: fadeIn 0.7s cubic-bezier(.4,2,.6,1) 1;
            position: relative;
            z-index: 2;
        }
        .main-content h1 {
            color: #fff;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2rem;
            letter-spacing: 0.03em;
            text-shadow: 0 2px 24px #00000044;
        }
        .avatar-preview {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg,#ffd700 60%,#232526 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.7rem;
            font-weight: 800;
            color: #232526;
            margin-bottom: 1.2rem;
            box-shadow: 0 2px 12px #ffd70044;
            overflow: hidden;
        }
        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .form-group {
            margin-bottom: 1.3rem;
            width: 100%;
        }
        label {
            color: #ffd700;
            font-weight: 600;
            font-size: 1.08rem;
            display: block;
            margin-bottom: 0.4rem;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 0.7rem 1rem;
            border-radius: 10px;
            border: none;
            font-size: 1.08rem;
            margin-bottom: 0.2rem;
            background: #fff;
            color: #232526;
            font-weight: 600;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.08);
        }
        input[type="file"] {
            margin-top: 0.5rem;
            color: #fff;
        }
        .btn {
            background: #ffd700;
            color: #232526;
            border-radius: 10px;
            padding: 0.7rem 1.5rem;
            font-size: 1.08rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.1s;
            margin-top: 1rem;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.08);
        }
        .btn:hover { background: #232526; color: #ffd700; transform: scale(1.06);}
        .msg {
            margin-bottom: 1.2rem;
            background: #232526;
            color: #ffd700;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-size: 1.08rem;
            font-weight: 600;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.13);
        }
        .back-link {
            color: #ffd700;
            font-weight: 600;
            text-decoration: underline;
            font-size: 1.08rem;
            margin-top: 1.5rem;
            display: inline-block;
        }
        .back-link:hover { color: #fff; }
    </style>
</head>
<body>
    <div class="main-content">
        <h1>Editare profil</h1>
        <?php if ($msg): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>
        <?php if ($user_details): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="avatar-preview">
                <?php if (!empty($user_details['avatar']) && file_exists($user_details['avatar'])): ?>
                    <img src="<?= htmlspecialchars($user_details['avatar']) ?>" alt="Avatar">
                <?php else: ?>
                    <?= strtoupper(mb_substr($user_details['nume'],0,1)) ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" name="nume" id="nume" value="<?= htmlspecialchars($user_details['nume']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user_details['email']) ?>" required>
            </div>
            <div class="form-group">
                <label for="avatar">Imagine profil (jpg, png, gif)</label>
                <input type="file" name="avatar" id="avatar" accept="image/*">
            </div>
            <button class="btn" type="submit">Salvează modificările</button>
        </form>
        <a href="cont.php" class="back-link">&larr; Înapoi la cont</a>
        <?php else: ?>
            <p>Trebuie să fii autentificat pentru a edita profilul.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>