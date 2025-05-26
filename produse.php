<?php
header('Content-Type: application/json');

// Completează cu datele tale de conectare la baza de date:
$host = "sql306.infinityfree.com"; // exemplu: sql303.epizy.com
$user = "if0_39043077";
$pass = "RAewEpVS6IIP";
$db = "if0_39043077_blackvault_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Conexiune eșuată"]);
    exit;
}

$sql = "SELECT id, nume, pret, pretVechi, descriere, poza, dataAdaugare FROM produse";
$result = $conn->query($sql);

$produse = [];
while ($row = $result && $result->fetch_assoc()) {
    $produse[] = $row;
}
echo json_encode($produse);
$conn->close();
?>