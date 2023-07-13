<?php
require('conn.php');

// Query untuk mengambil data kursus dan materi dari database
$query = "SELECT m.idMateri, m.judulMateri, m.deskripsiMateri, m.linkMateri, k.judulKursus 
          FROM materi m
          JOIN kursus k ON m.idKursus = k.idKursus";
$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Mengambil data kursus dan materi dari hasil query dan menyimpannya dalam array
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
} else {
    echo "Terjadi kesalahan saat mengambil data materi: " . mysqli_error($conn);
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

    <title>SB Admin 2 - Tables</title>

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

        <h1 class="h3 mb-2 text-gray-800">Daftar Materi</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-group col-sm-6">
                    <a href="?url=tambahMateri" class="btn btn-success">Tambahkan Materi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Kursus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course) : ?>
                                <tr>
                                    <td><?php echo $course['idMateri']; ?></td>
                                    <td><?php echo $course['judulMateri']; ?></td>
                                    <td><?php echo $course['deskripsiMateri']; ?></td>
                                    <td><?php echo $course['linkMateri']; ?></td>
                                    <td><?php echo $course['judulKursus']; ?></td>
                                    <td>
                                    <div class="d-flex">
                                        <form action="deleteMateri.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $course['idMateri']; ?>">
                                            <button type="submit" class="btn btn-danger mr-2"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
