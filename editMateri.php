<?php
require('conn.php');

// Mengambil ID materi dari parameter URL
$idMateri = $_GET['id'];

// Query untuk mengambil data materi berdasarkan ID
$query = "SELECT * FROM materi WHERE idMateri = '$idMateri'";
$result = mysqli_query($conn, $query);
$materi = mysqli_fetch_assoc($result);

// Memeriksa apakah materi ditemukan
if (!$materi) {
    echo "Materi tidak ditemukan.";
    exit;
}

// Memproses form jika ada data yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $judulMateri = $_POST['judul'];
    $deskripsiMateri = $_POST['deskripsi'];
    $linkMateri = $_POST['link'];

    // Query untuk mengupdate data materi
    $query = "UPDATE materi SET judulMateri = '$judulMateri', deskripsiMateri = '$deskripsiMateri', linkMateri = '$linkMateri' WHERE idMateri = '$idMateri'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah update berhasil
    if ($result) {
        // Redirect ke halaman detail materi
        header("Location: index.php?url=lihatMateri");
        exit;
    } else {
        echo "Terjadi kesalahan saat mengupdate materi.";
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
  <title>SB Admin 2 - Edit Materi</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mt-3">Edit Materi</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="judul">Judul Materi:</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $materi['judulMateri']; ?>" required>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi Materi:</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $materi['deskripsiMateri']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="link">Link Materi:</label>
        <input type="text" class="form-control" id="link" name="link" value="<?php echo $materi['linkMateri']; ?>" required>
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
