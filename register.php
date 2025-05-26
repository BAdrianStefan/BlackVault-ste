<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$host = "sql306.infinityfree.com";
$user = "if0_39043077";
$pass = "RAewEpVS6IIP";
$db = "if0_39043077_blackvault_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

$nume = $_POST['nume'] ?? '';
$email = $_POST['email'] ?? '';
$parola = $_POST['parola'] ?? '';

if (!$nume || !$email || !$parola) {
    header("Location: register_form.php?error=Completează toate câmpurile!");
    exit;
}

$stmt = $conn->prepare("SELECT id FROM user WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header("Location: register_form.php?error=Email deja folosit!");
    exit;
}
$stmt->close();

$parola_hash = password_hash($parola, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO user (nume, email, parola) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nume, $email, $parola_hash);
if ($stmt->execute()) {
    header("Location: login_form.php?success=Cont creat cu succes! Te poți autentifica.");
    exit;
} else {
    header("Location: register_form.php?error=Eroare la crearea contului!");
    exit;
}
$stmt->close();
$conn->close();
?>