<?php
require 'db.php'; // Verbindung zur DB

// Alle Patienten aus der Tabelle holen
$stmt = $pdo->query("SELECT * FROM patients ORDER BY id ASC");
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Patientenliste</title>
</head>
<body>
  <h1>Patientenliste</h1>

  <p><a href="add.php">Neuen Patienten hinzufügen</a></p>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Geburtsdatum</th>
      <th>Email</th>
      <th>Aktionen</th> 
    </tr>
    <?php foreach ($patients as $patient): ?>
    <tr>
      <td><?php echo htmlspecialchars($patient['id']); ?></td>
      <td><?php echo htmlspecialchars($patient['name']); ?></td>
      <td><?php echo htmlspecialchars($patient['gender']); ?></td>
      <td><?php echo htmlspecialchars($patient['birthdate']); ?></td>
      <td><?php echo htmlspecialchars($patient['email']); ?></td>
    <td><a href="delete.php?id=<?= $patient['id'] ?>" onclick="return confirm('Patient wirklich löschen?');">Löschen</a></td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>
