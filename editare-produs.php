<?php
// DEBUG: scoate linia asta după test!
$_SESSION['rol'] = 'admin';
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    die('Acces interzis!');
}

$host = "localhost";
$user = "blackvau_admin";
$pass = "MARIANAmama2000@";
$db   = "blackvau_Db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Eroare conexiune: " . $conn->connect_error); }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) { die("Produs invalid."); }

$mesaj = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pret = floatval($_POST['pret']);
    $pret_vechi = isset($_POST['pret_vechi']) ? floatval($_POST['pret_vechi']) : null;
    $sql = "UPDATE produse SET pret=?, pret_vechi=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddi", $pret, $pret_vechi, $id);
    if ($stmt->execute()) {
        $mesaj = "<div style='color:lime;font-weight:bold;'>Preț actualizat!</div>";
    } else {
        $mesaj = "<div style='color:red;'>Eroare la actualizare!</div>";
    }
    $stmt->close();
}

$produs = null;
$res = $conn->query("SELECT * FROM produse WHERE id=$id");
if ($res && $res->num_rows > 0) $produs = $res->fetch_assoc();
$conn->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Editare preț produs</title>
    <style>
        body { background: #222; color: #fff; font-family: 'Inter', Arial, sans-serif; }
        .container { max-width: 400px; margin: 3rem auto; background: #333a; border-radius: 16px; padding: 2rem; }
        label { display:block; margin-top:1rem; }
        input[type="number"] { width:100%; padding:0.5rem; border-radius:8px; border:none; margin-top:0.2rem; }
        .btn-save { background:#ffd700; color:#222; border-radius:8px; padding:0.5rem 1.1rem; font-size:1rem; font-weight:600; border:none; cursor:pointer; margin-top:1rem; }
        .btn-save:hover { background:#222; color:#ffd700; }
        a { color:#ffd700; text-decoration:none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Editare preț produs</h2>
    <?php if ($produs): ?>
        <?= $mesaj ?>
        <form method="post">
            <label>Nume: <?= htmlspecialchars($produs['nume']) ?></label>
            <label>Preț nou:
                <input type="number" step="0.01" name="pret" value="<?= htmlspecialchars($produs['pret']) ?>" required>
            </label>
            <label>Preț vechi:
                <input type="number" step="0.01" name="pret_vechi" value="<?= htmlspecialchars($produs['pret_vechi']) ?>">
            </label>
            <button class="btn-save" type="submit">Salvează</button>
        </form>
        <a href="produse.php">&larr; Înapoi la produse</a>
    <?php else: ?>
        <div style="color:#ffd700;">Produsul nu a fost găsit.</div>
        <a href="produse.php">&larr; Înapoi la produse</a>
    <?php endif; ?>
</div>
</body>
</html>