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

function saveBooking($name, $service, $date, $time) {
    $conn = getConnection();
    $sql = "INSERT INTO foglalasok (nev, szolgaltatas, datum, ido) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $service, $date, $time);
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
?>