<?php

require 'php/functions.php';


if(isset($_GET['cari'])) {
  
    $elektronik = cari($_GET['keyword']);
} else {
    $elektronik = query("SELECT * FROM elektronik");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
   
</head>
<body>

    <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark mb-1">
        <a class="navbar-brand ml-5" href="#"><h1 style="color:white;"><span style="color: goldenrod;">ELECTRO</span>nics</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="z-index: 9999">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2 mr-5">
                        <a class="nav-link" href="#" style="color:white; font-weight: bold;">HOME</a>
                    </li>
                    <li class="nav-item mt-2 mr-5">
                        <a class="nav-link" href="#produk" style="color:white; font-weight: bold;">PRODUK</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="php/login.php"><button class="btn btn-outline-light mr-5">Masuk</button></a>
                    </li>
                </ul>
            </div>
    </nav>
    </section>

    <section>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
            <img class="d-block" height="400px" width="100%" src="assets/img/banner-ps.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Wujudkan Gamemu!</h3>
                <a href="php/detail.php/?tipe=Playstation%204" class="btn btn-outline-warning">Selengkapnya</a>
        </div>
        </div>
        <div class="carousel-item">
            <img class="d-block" height="400px" width="100%" src="assets/img/banner-soundbar.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Hidupkan rumahmu!</h3>
                <a href="php/detail.php/?tipe=Soundbar%20Speaker%20HWN300" class="btn btn-outline-warning">Selengkapnya</a>
        </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </section>

    <section id="produk">
    <div class="container mt-5">
    <form class="form-inline justify-content-center mb-5">
            <input class="form-control mr-sm-2 keyword" type="search" name="keyword" placeholder="Cari barangmu disini" autocomplete="off" autofocus aria-label="Search" style="width: 450px; border: 1px solid darkgray;">
            <button class="btn btn-outline-dark my-2 my-sm-0 tombol-cari" name="cari" onclick="myFunction();" type="submit">Cari</button>
        </form>

    <?php if(empty($elektronik)) : ?>
                <h1>Data tidak ditemukan</h1>
    <?php else : ?>
        <div class="card-columns ml-5">
    <?php foreach ($elektronik as $barang) : ?>
        <div class="card" style="width: 250px;">
        <img class="card-img-top" src="assets/img/<?= $barang['produk'] ?>" alt="ini gambar <?= $barang['tipe'] ?> "height="200px">
        <div class="card-body">
            <p class="card-text"><b><?= $barang['merk']?> <?= $barang['tipe'] ?></b></p>
            <p class="card-text harga">Rp<?= $barang['harga'];?>,-</p>
            <a href="php/detail.php/?tipe=<?= $barang['tipe']; ?>" class="btn btn-outline-dark">Selengkapnya</a>
        </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
    </section>

    <section>
        <div class="row m-0 mt-5 bg-dark" style="padding: 50px">
          <div class="col">
          <h1 style="color:white;"><span style="color: goldenrod;">ELECTRO</span>nics</h1>
          </div>
          <div class="col">
              <h2 style="color:goldenrod;">Helpful Links</h2>
                    <a href="#produk" class="nav-link" style="color:white;">PRODUK</a>
                    <a href="#" class="nav-link" style="color:white;">HOME</a>


          </div>
        </div>
        <div class="footer" style="color:white; text-align: center; background: rgb(30,30,30);"> &copy; Muhamad Fawwazt 2020.</div>
    </section>

    <script src="js/livesearch.js"></script>

</body>
</html>