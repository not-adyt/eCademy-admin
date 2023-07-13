<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    
    <div class="card shadow">
        <div class="card-header">
            Tambahkan Kursus
        </div>
        <div class="card-body">
            <form action="simpanKursus.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group cols-sm-6">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group cols-sm-6">
                    <label for="">Deskripsi</label>
                    <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group cols-sm-6">
                    <label for="">Durasi</label>
                    <input type="text" name="durasi" class="form-control">
                </div>
                <div class="form-group cols-sm-6">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <input type="reset" value="Kosongkan" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>