<?php
require 'db.php'; // Verbindung zur DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO patients (name, gender, birthdate, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['gender'],
        $_POST['birthdate'],
        $_POST['email']
    ]);

    // Zurück zur Liste (später index.php)
    echo("Patient erfolgreich hinzugefügt");
    header("Location: patients.php");
    exit;
}
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Patient hinzufügen</title>
</head>
<body>
    <h1> Neuen Patienten hinzufügen </h1>
  <form action="add.php" method="post">

    <label>Name:</label><br> <input type="text" name="name" required><br><br>

        <label>Geschlecht:</label><br>
    <select name="gender" required>
      <option value="">--Bitte wählen--</option>
      <option value="m">Männlich</option>
      <option value="w">Weiblich</option>
      <option value="d">Divers</option>
     <option value="no">keine Angabe</option>
    </select><br><br>


    <label>Email:</label><br>
<input type="text" name="email" required><br><br>

    <label>Geburtsdatum:</label><br>
<input type="date" name="birthdate" required><br><br>
    <input type="submit" value="Hinzufügen">
</form>
<p><a href="patients.php">Zurück zur Patientenliste</a></p> 
</body>