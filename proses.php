<?php
include 'db.php'; // Menghubungkan dengan file koneksi database

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil jumlah aspirasi yang ada sebelumnya
    $sql = "SELECT jumlah FROM aspirasi WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data jumlah yang ada
        $row = $result->fetch_assoc();
        $jumlah = $row['jumlah'];

        // Tambahkan 1 ke jumlah aspirasi
        $jumlah++;

        // Update jumlah aspirasi di database
        $updateSql = "UPDATE aspirasi SET jumlah = $jumlah WHERE id = 1";
        if ($conn->query($updateSql) === TRUE) {
            echo "Aspirasi berhasil dikirim. Jumlah aspirasi saat ini: $jumlah";
        } else {
            echo "Terjadi kesalahan saat mengupdate jumlah aspirasi: " . $conn->error;
        }
    } else {
        echo "Data aspirasi tidak ditemukan.";
    }
} else {
    echo "Form tidak disubmit.";
}

$conn->close();
?>
