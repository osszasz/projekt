<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fodraszat";

// Kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
?>
