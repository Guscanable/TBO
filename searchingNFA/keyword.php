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

    <div class="jumbotron jumbotron-fluid search-wrapper bg-dark">
        <h1 class="display-4 text-center text-white" data-aos="fade-down" data-aos-duration="2000">Inputkan Keyword</h1>
    </div>

    <!-- Start Form -->
    <div class="container mb-5" data-aos="fade-up" data-aos-duration="2000">
        <form action="#" id="keyword">
            <input type="hidden" name="submit">
            <div class="form-group">
                <input type="keyword" class="form-control" name="keyword" id="keyword" placeholder="Masukkan keyword" autocomplete="off">
                <button type="submit" name="submit" id="btn-update" class="btn btn-success btn-md mt-3 rounded">Submit</button>
            </div>

        </form>
    </div>
    <!-- End Form -->

    <!-- Start Footer -->
    <div class="footer">
        <p class="text-secondary">&copy; 2020 - All Rights Reserved by Kelompok 2 TBO Team</p>
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