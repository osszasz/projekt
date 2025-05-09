<?php
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $salon = $_POST['salon'] ?? '';
    $service = $_POST['service'] ?? '';
    $barber = $_POST['barber'] ?? '';
    $datetime = $_POST['time'] ?? '';

    if ($name && $email && $salon && $service && $barber && $datetime) {
        $success = saveBooking($name, $email, $salon, $service, $barber, $datetime);

        if ($success) {
            // SendPulse vagy mail() alapú értesítés jöhet ide
            echo "<h2>Foglalás sikeres!</h2><p>Köszönjük, $name! A visszaigazolást elküldtük a(z) $email címre.</p>";
        } else {
            echo "<h2>Hiba!</h2><p>Nem sikerült menteni a foglalást. Kérlek, próbáld újra.</p>";
        }
    } else {
        echo "<h2>Hiányzó adatok!</h2><p>Kérlek, tölts ki minden mezőt!</p>";
    }
} else {
    echo "<h2>Érvénytelen kérés!</h2>";
}
?>
