<!-- Simpan dalam format .php -->
<?php
// koneksi ke server
$db = new mysqli("localhost", "root", "", "db_dokumen");
$id = $_GET['id'];
$query = "SELECT isi_keyword FROM keyword WHERE id=" . $id;
$result = $db->query($query);
$result = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fef9209b86.js" crossorigin="anonymous"></script>

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Keyword</title>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent border-bottom" data-aos="fade-right" data-aos-duration="2000">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-search"></i>&nbsp;searching NFA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span role="button" class="nav-link" onclick="document.location='index.php'">Home</span>
                    </li>
                    <li class="nav-item active">
                        <span role="button" class="nav-link" onclick="document.location='keyword.php'">Keyword</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Jumbotron -->
    <div class=" container-fluid jumbotron jumbotron-fluid search-wrapper bg-dark">
        <div class="text-center" style="margin-top: 10px;" data-aos="fade-up" data-aos-duration="2000">
            <h5 class="text-white mr-3">Keyword Dokumen : <?= $result['isi_keyword'] ?></h5>
        </div>
        <div class="d-flex justify-content-center mt-3" data-aos="fade-up" data-aos-duration="2000">
            <form class="form-inline" action="">
                <input class="form-control mr-2 rounded" style="width: 60% !important;" type="text" name="keyword" placeholder="Update Keyword" required>
                <a href="" class="btn btn-warning"><i class="far fa-thumbs-up"></i>&nbsp;Submit</a>
            </form>
        </div>
    </div>
    <!-- End Jumbotron -->

    <!-- Start Footer -->
    <div class="footer">
        <p class="text-secondary">&copy; 2020 - All Rights Reserved by Kelompok 2 TBO</p>
    </div>
    <!-- End Footer -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


    <script>
        AOS.init();
    </script>
</body>

</html>
