<?php
$servername = "localhost";
$username = "ulmbiwfi_aspirasi_db"; // Ganti sesuai username MySQL
$password = "WN_sqthZu2M3_g7";     // Ganti jika ada password
$dbname = "ulmbiwfi_aspirasi_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
