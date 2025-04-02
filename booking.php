<?php

$config = require './config.php';

$dbConfig = $config['database'];

$conn = new mysqli($dbConfig['server_name'], $dbConfig['user_name'], $dbConfig['password'], $dbConfig['dbname']);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO foglalasok (nev, szolgaltatas, datum, ido) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $service, $date, $time);

    if ($stmt->execute()) {
        echo "Foglalás sikeresen rögzítve!";
    } else {
        echo "Hiba történt: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>