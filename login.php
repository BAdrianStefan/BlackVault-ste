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

$login_user = $_POST['login_user'] ?? '';
$login_pass = $_POST['login_pass'] ?? '';

if (!$login_user || !$login_pass) {
    header("Location: login_form.php?error=Completează toate câmpurile!");
    exit;
}

$sql = "SELECT * FROM user WHERE email=?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Eroare la pregătirea interogării: " . $conn->error);
}
$stmt->bind_param("s", $login_user);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($login_pass, $user['parola'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nume'] = $user['nume'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php?success=Autentificare reușită!");
        exit;
    }
}

header("Location: login_form.php?error=Date incorecte!");
exit;
$conn->close();
?>