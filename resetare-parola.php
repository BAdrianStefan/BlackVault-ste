<?php

// Completează cu datele tale de conectare la baza de date:
$host = "sql306.infinityfree.com"; // exemplu: sql303.epizy.com
$user = "if0_39043077";
$pass = "RAewEpVS6IIP";
$db = "if0_39043077_blackvault_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    header("Location: resetare-parole.html?error=Eroare conexiune DB!");
    exit;
}

$email = trim(strtolower($_POST['email'] ?? ''));
$cod_backup = strtoupper(trim($_POST['cod-backup'] ?? ''));
$parola_noua = $_POST['parola-noua'] ?? '';

if (!$email || !$cod_backup || !$parola_noua) {
    header("Location: resetare-parole.html?error=Completează toate câmpurile!");
    exit;
}
if (
    strlen($parola_noua) < 8 ||
    !preg_match('/[A-Z]/', $parola_noua) ||
    !preg_match('/[a-z]/', $parola_noua) ||
    !preg_match('/[0-9]/', $parola_noua) ||
    !preg_match('/[^A-Za-z0-9]/', $parola_noua)
) {
    header("Location: resetare-parole.html?error=Parola nu respectă cerințele de securitate!");
    exit;
}

$sql = "SELECT id FROM user WHERE email=? AND UPPER(cod_backup)=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $cod_backup);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    header("Location: resetare-parole.html?error=Email sau cod backup incorect!");
    exit;
}
$stmt->bind_result($id);
$stmt->fetch();
$stmt->close();

// Update parola
$parola_hash = password_hash($parola_noua, PASSWORD_DEFAULT);
$sql = "UPDATE user SET parola=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $parola_hash, $id);

if ($stmt->execute()) {
    header("Location: resetare-parole.html?success=Parola a fost resetată cu succes!");
    exit;
} else {
    header("Location: resetare-parole.html?error=Eroare la resetarea parolei!");
    exit;
}
$conn->close();
?>