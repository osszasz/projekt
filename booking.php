<?php

$config = require './config.php';

$conn = new mysqli($config['server_name'], $config['user_name'], $config['password'], $config['dbname']);

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