<?php 
if(isset($_GET['url'])){
    $url = $_GET['url'];

    switch($url){
        case 'lihatKursus':
            include 'lihatKursus.php';
            break;
    
        case 'lihatMateri':
            include 'lihatMateri.php';
            break;

        case 'tambahKursus':
            include 'tambahKursus.php';
            break;

        case 'tambahMateri':
            include 'tambahMateri.php';
            break;

        case 'detailKursus':
            include 'detailKursus.php';
            break;
    }
} else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Administrasi Surat P3M</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fc;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mt-3">Admin Page</h1>
                <p class="text-center">Selamat datang!</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
    <?php }
?>