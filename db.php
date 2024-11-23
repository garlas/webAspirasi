<?php
$servername = "localhost";
$username = "root"; // atau username MySQL kamu
$password = ""; // atau password MySQL kamu
$dbname = "db_aspirasi"; // nama database yang kamu buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
