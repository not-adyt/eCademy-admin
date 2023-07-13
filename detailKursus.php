<?php
require('conn.php');

// Memeriksa apakah parameter id kursus telah diterima
if (isset($_GET['id'])) {
    // Mengambil id kursus dari parameter
    $idKursus = $_GET['id'];

    // Query untuk mengambil data kursus berdasarkan id
    $queryKursus = "SELECT * FROM kursus WHERE idKursus = $idKursus";
    $resultKursus = mysqli_query($conn, $queryKursus);

    // Memeriksa apakah kursus ditemukan
    if (mysqli_num_rows($resultKursus) > 0) {
        // Mengambil data kursus
        $kursus = mysqli_fetch_assoc($resultKursus);

        // Query untuk mengambil data materi berdasarkan id kursus
        $queryMateri = "SELECT * FROM materi WHERE idKursus = $idKursus";
        $resultMateri = mysqli_query($conn, $queryMateri);

        // Mengambil data materi dan menyimpannya dalam array
        $materi = [];
        while ($rowMateri = mysqli_fetch_assoc($resultMateri)) {
            $materi[] = $rowMateri;
        }
    } else {
        // Kursus tidak ditemukan, redirect ke halaman daftar kursus
        header("Location: daftarKursus.php");
        exit();
    }
} else {
    // Parameter id kursus tidak diterima, redirect ke halaman daftar kursus
    header("Location: daftarKursus.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail Kursus</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 mb-2 text-gray-800">Detail Kursus: <?php echo $kursus['judulKursus']; ?></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Materi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Materi</th>
                                <th>Judul Materi</th>
                                <th>Deskripsi Materi</th>
                                <th>Link Materi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materi as $materiItem) : ?>
                                <tr>
                                    <td><?php echo $materiItem['idMateri']; ?></td>
                                    <td><?php echo $materiItem['judulMateri']; ?></td>
                                    <td><?php echo $materiItem['deskripsiMateri']; ?></td>
                                    <td><?php echo $materiItem['linkMateri']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-left mt-4">
                        <a href="index.php?url=lihatKursus" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
