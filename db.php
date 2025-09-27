<?php
$host = 'localhost';
$db   = 'patientdb';
$user = 'root';
$pass = ''; // Standard XAMPP Passwort leer
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    echo "DB-Verbindung fehlgeschlagen: " . $e->getMessage();
    exit;
}
?>
