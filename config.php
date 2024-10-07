<?php
$host = 'localhost';  // Sesuaikan dengan konfigurasi server Anda
$dbname = 'v3423085_Travel';
$username = 'root';   // Sesuaikan dengan user database Anda
$password = '';       // Sesuaikan dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>