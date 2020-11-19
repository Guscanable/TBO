<!-- Simpan dalam format .php -->
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

    <title>Searching</title>
</head>

<?php
//koneksi database
require('koneksi.php');
?>

<!-- start body -->

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
                    <li class="nav-item active">
                        <span role="button" class="nav-link" onclick="document.location='index.php'">Home</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Start Jumbotron -->
    <div class="jumbotron jumbotron-fluid search-wrapper bg-dark">
        <div class="container d-flex justify-content-center" data-aos="fade-down" data-aos-duration="2000">
            <form class=" form-inline" action="search.php" method="get">
                <input class="form-control mr-2 mb-2 rounded-pill" style="width: 80% !important;" type="text" name="search" placeholder="Cari Dokumen" aria-label="Search">
                <input class="form-control mr-2 rounded-pill" style="width: 70% !important;" type="text" name="bagilaman" placeholder="Jumlah Dokumen" required>
                <button class="btn btn-warning my-2 my-sm-0 rounded-pill" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- End Jumbotron -->

    <div class="container" style="margin-top: 10px;" data-aos="fade-up" data-aos-duration="2000">
        <div class="card border-dark mt-3" style="max-width: 20rem;">
            <button href="#" style="border-radius: 0px !important;" class="btn btn-warning rounded"><i class="fab fa-quora"></i>&nbsp;Quintuple</button>
            <div class="card-header bg-transparent border-dark">Input :
                <?php for ($i = 0; $i < strlen($t); $i++) : ?>
                    <?= $t[$i] ?>
                <?php endfor; ?>
            </div>
            <div class="card-body">
                <div class="quintuple">
                    State :
                    <?php for ($i = 0; $i <= $totalState; $i++) : ?>
                        q<?= $i ?>,
                    <?php endfor; ?>
                    <br>
                    Initial State : q0
                    <br>
                    Final State :
                    <?php for ($i = 1; $i < count($finalState); $i++) : ?>
                        <?php $finalState[$i] = $finalState[$i - 1] + $finalState[$i] ?>
                    <?php endfor; ?>
                    <?php for ($i = 0; $i < count($finalState); $i++) : ?>
                        q<?= $finalState[$i] ?>,
                    <?php endfor; ?>
                    <br>
                    Fungsi Transisi (δ) : <br>
                    <?php $temps = 0;
                    for ($i = 0; $i < count($search); $i++) {
                        for ($j = 0; $j < strlen($search[$i]); $j++) {
                            if ($i > 0)
                                if ($temps == $finalState[$i - 1])
                                    echo "δ(q0," . $search[$i][$j] . ") = q" . ++$temps . "<br>";
                                else
                                    echo "δ(q" . $temps . ", " . $search[$i][$j] . ") = q" . ++$temps . "<br>";
                            else
                                echo "δ(q" . $temps . ", " . $search[$i][$j] . ") = q" . ++$temps . "<br>";
                        }
                    } ?>
                </div>
            </div>
        </div>

        <h5 class="text-muted ml-1 mt-4">Ditemukan <?= $total ?> dari <?= $bagilaman ?> dokumen</h5>

        <?php for ($i = 0; $i < $total; $i++) : ?>
            <div class="card border-dark mb-3">
                <div class="card-header bg-lavender border-dark">
                    <h5><?= $judul[$i] ?></h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Dokumen <?= $dokumen[$i] ?>.</h6>
                    <p class="card-text"><?= $deskripsi[$i] ?></p>
                    <a href="keyword.php?id=<?= $dokumen[$i] ?>" class="badge badge-warning p-2"><i class="fas fa-key"></i>&nbsp;Keyword</a>
                    <a href="detail.php?id=<?= $dokumen[$i] ?>" class="badge badge-info p-2"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $(".quintuple").hide();
            var click = 1;
            $(".quintuplen").click(function() {
                if (click == 1) {
                    $(".quintuple").show(300);
                    click++;
                } else {
                    $(".quintuple").hide(300);
                    click = 1
                }
            })
        });
    </script>

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
<!-- end body -->

</html>
