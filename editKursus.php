<?php
require('conn.php');

// Mengambil ID kursus dari parameter URL
$idKursus = $_GET['id'];

// Query untuk mengambil data kursus berdasarkan ID
$query = "SELECT * FROM kursus WHERE idKursus = '$idKursus'";
$result = mysqli_query($conn, $query);
$course = mysqli_fetch_assoc($result);

// Memeriksa apakah kursus ditemukan
if (!$course) {
    echo "Kursus tidak ditemukan.";
    exit;
}

// Memproses form jika ada data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $judulKursus = $_POST['judul'];
    $deskripsiKursus = $_POST['deskripsi'];
    $durasiKursus = $_POST['durasi'];

    // Query untuk mengupdate data kursus
    $query = "UPDATE kursus SET judulKursus = '$judulKursus', deskripsiKursus = '$deskripsiKursus', durasiKursus = '$durasiKursus' WHERE idKursus = '$idKursus'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah update berhasil
    if ($result) {
        // Redirect ke halaman detail kursus
        header("Location: index.php?url=lihatKursus");
        exit;
    } else {
        echo "Terjadi kesalahan saat mengupdate kursus.";
    }
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
  <title>SB Admin 2 - Edit Kursus</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mt-3">Edit Kursus</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="judul">Judul Kursus:</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $course['judulKursus']; ?>" required>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi Kursus:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $course['deskripsiKursus']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="durasi">Durasi Kursus:</label>
        <input type="text" class="form-control" id="durasi" name="durasi" value="<?php echo $course['durasiKursus']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
