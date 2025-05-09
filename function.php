<?php
function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fodraszat";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kapcsolódási hiba: " . $conn->connect_error);
    }
    return $conn;
}

function saveBooking($name, $email, $salon, $service, $barber, $datetime) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO foglalasok (nev, email, szalon, szolgaltatas, borbely, datumido) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) return false;
    $stmt->bind_param("ssssss", $name, $email, $salon, $service, $barber, $datetime);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}

function getServices() {
    $conn = getConnection();
    $services = [];
    $result = $conn->query("SELECT id, name FROM services");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    }
    $conn->close();
    return $services;
}
