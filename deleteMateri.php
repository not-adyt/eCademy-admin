<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Menghapus materi
    $deleteMateri = "DELETE FROM materi WHERE idMateri = '$id'";
    if (mysqli_query($conn, $deleteMateri)) {
        echo "<script>alert('Materi berhasil dihapus!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus materi: " . mysqli_error($conn);
    }
} else {
    echo "Metode HTTP tidak valid!";
}
?>
