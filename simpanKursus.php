<?php
require('conn.php');

$judul = $_POST['judul'];
$deskripsi = $_POST['desc'];
$durasi = $_POST['durasi'];

$sql = "INSERT INTO kursus (judulKursus, deskripsiKursus, durasiKursus) VALUES ('$judul', '$deskripsi', '$durasi')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Kursus berhasil ditambahkan!');</script>";
    echo "<script>window.location.href = 'index.php?url=tambahKursus';</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menambahkan kursus: " . mysqli_error($conn);
}
?>
