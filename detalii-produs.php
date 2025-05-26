<?php
$host = "localhost";
$user = "blackvau_admin";
$pass = "MARIANAmama2000@";
$db   = "blackvau_Db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Eroare conexiune: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produs = null;
if ($id > 0) {
    $sql = "SELECT * FROM produse WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $produs = $result->fetch_assoc();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Detalii produs</title>
    <style>
        body { background: #222; color: #fff; font-family: 'Inter', Arial, sans-serif; margin: 0; }
        .container { max-width: 600px; margin: 3rem auto; background: #333a; border-radius: 16px; padding: 2rem; }
        .produs-img { max-width: 220px; border-radius: 12px; border: 2px solid #fff; background: #fff; margin-bottom: 1rem; }
        .produs-nume { font-size: 2rem; font-weight: 700; margin-bottom: 1rem; }
        .produs-pret { font-size: 1.3rem; margin-bottom: 1rem; }
        .produs-desc { font-size: 1.1rem; margin-bottom: 1.5rem; }
        .btn-back { background: #ffd700; color: #222; border-radius: 8px; padding: 0.5rem 1.1rem; font-size: 1rem; font-weight: 600; text-decoration: none; border: none; cursor: pointer; }
        .btn-back:hover { background: #222; color: #ffd700; }
        .pret-vechi { color: #bbb; text-decoration: line-through; margin-right: 0.5rem; }
        .pret-nou { color: #ff3b3b; font-weight: 800; }
        .badge-reducere { background: #ff3b3b; color: #fff; border-radius: 8px; padding: 0.2rem 0.8rem; font-weight: 700; font-size: 1rem; margin-right: 0.7rem; }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($produs): ?>
            <?php if ($produs['poza']): ?>
                <img class="produs-img" src="<?= htmlspecialchars($produs['poza']) ?>" alt="poza produs">
            <?php endif; ?>
            <div class="produs-nume"><?= htmlspecialchars($produs['nume']) ?></div>
            <div class="produs-pret">
                <?php
                $pretNou = floatval($produs['pret']);
                $pretVechi = isset($produs['pret_vechi']) ? floatval($produs['pret_vechi']) : null;
                if ($pretVechi && $pretNou < $pretVechi) {
                    $reducere = round(100 - ($pretNou / $pretVechi) * 100);
                    echo "<span class='badge-reducere'>-{$reducere}%</span> <span class='pret-vechi'>{$pretVechi} RON</span> <span class='pret-nou'>{$pretNou} RON</span>";
                } else {
                    echo "<span class='pret-nou'>{$pretNou} RON</span>";
                }
                ?>
            </div>
            <div class="produs-desc"><?= htmlspecialchars($produs['descriere'] ?? 'Fără descriere.') ?></div>
            <a class="btn-back" href="produse.php">&larr; Înapoi la produse</a>
        <?php else: ?>
            <div style="color:#ffd700;font-size:1.2rem;">Produsul nu a fost găsit.</div>
            <a class="btn-back" href="produse.php">&larr; Înapoi la produse</a>
        <?php endif; ?>
    </div>
</body>
</html>