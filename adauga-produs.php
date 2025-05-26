<?php
$host = "localhost";
$user = "blackvau_admin";
$pass = "MARIANAmama2000@";
$db   = "blackvau_Db";

// Conectare la baza de date
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Eroare conexiune: " . $conn->connect_error);
}

// Preluare date din formular
$nume = $_POST['nume'];
$pret = $_POST['pret'];
$descriere = $_POST['descriere'];
$poza = $_POST['poza'];

// Inserare în tabelul produse
$stmt = $conn->prepare("INSERT INTO produse (nume, pret, descriere, poza) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdss", $nume, $pret, $descriere, $poza);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Produs adăugat cu succes! <a href='adauga-produs.html'>Adaugă alt produs</a> | <a href='produse.php'>Vezi produse</a>";
} else {
    echo "Eroare la adăugare produs!";
}

$stmt->close();
$conn->close();
?>