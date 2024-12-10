<?php
include 'db.php'; // Koneksi ke database

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $kelas = $_POST['kelas'];
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $issue = $_POST['issue'];
    $anonim = isset($_POST['anonim']) ? 1 : 0; // Checkbox anonim

    // Query untuk memasukkan data aspirasi ke database
    $sql = "INSERT INTO aspirasi (nama_pengirim, kelas, kontak, isi_aspirasi, anonim) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $kelas, $contact, $issue, $anonim);

    // Eksekusi query untuk memasukkan data
    if ($stmt->execute()) {
        // Jika berhasil, perbarui jumlah aspirasi di tabel counter
        $updateCount = "UPDATE counter SET jumlah = jumlah + 1 WHERE id = 1";
        if ($conn->query($updateCount) === TRUE) {
            echo "<script>alert('Aspirasi berhasil dikirim!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui jumlah aspirasi!'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal mengirim aspirasi!'); window.location.href = 'index.php';</script>";
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
