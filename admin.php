<?php
require_once 'config.php';

// Időpont törlése
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM appointments WHERE id = $id");
    header("Location: admin.php");
    exit();
}

// Időpontok lekérdezése kapcsolt felhasználó- és szolgáltatásadatokkal
$sql = "
    SELECT a.id, u.name AS user_name, s.name AS service_name, a.date_time, a.status 
    FROM appointments a
    JOIN users u ON a.user_id = u.id
    JOIN services s ON a.service_id = s.id
    ORDER BY a.date_time ASC
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin felület - Időpontok</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; }
        a.delete { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Időpontok kezelése</h1>
    <table>
        <tr>
            <th>Felhasználó</th>
            <th>Szolgáltatás</th>
            <th>Időpont</th>
            <th>Státusz</th>
            <th>Művelet</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['user_name']) ?></td>
            <td><?= htmlspecialchars($row['service_name']) ?></td>
            <td><?= date('Y.m.d H:i', strtotime($row['date_time'])) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><a class="delete" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Biztosan törlöd az időpontot?');">Törlés</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
