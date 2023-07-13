<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Menghapus semua materi terkait dengan kursus yang akan dihapus
    $deleteMateri = "DELETE FROM materi WHERE idKursus = '$id'";
    mysqli_query($conn, $deleteMateri);

    // Menghapus kursus
    $deleteKursus = "DELETE FROM kursus WHERE idKursus = '$id'";
    if (mysqli_query($conn, $deleteKursus)) {
        echo "<script>alert('Kursus berhasil dihapus beserta materinya!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus kursus: " . mysqli_error($conn);
    }
} else {
    echo "Metode HTTP tidak valid!";
}
?>
