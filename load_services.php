<?php
header('Content-Type: application/json');
require_once 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Adatbázis kapcsolódási hiba']);
    exit;
}

$sql = "SELECT * FROM services";
$result = $conn->query($sql);

$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

$conn->close();
echo json_encode($services);
