<?php
require('conn.php');

$judul = $_POST['judul'];
$deskripsi = $_POST['desc'];
$link = $_POST['link'];
$idKursus = $_POST['kursus'];

$sql = "INSERT INTO materi (judulMateri, deskripsiMateri, linkMateri, idKursus) VALUES ('$judul', '$deskripsi', '$link', '$idKursus')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Materi berhasil ditambahkan!');</script>";
    echo "<script>window.location.href = 'index.php?url=lihatMateri.php';</script>";
    exit();
} else {
    echo "Terjadi kesalahan saat menambahkan materi: " . mysqli_error($conn);
}
?>
