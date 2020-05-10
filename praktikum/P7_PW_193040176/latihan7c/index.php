<?php

require 'php/functions.php';


if(isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $elektronik = query("SELECT * FROM ELEKTRONIK WHERE
                            tipe LIKE '%$keyword%' ");
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

            <!-- TEMPORARY -->

<div class="container">
    <section>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Toko Ceritanya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
            <form class="form-inline form-search" method="get">
                <input class="input-search mr-2" type="search" name="keyword" placeholder="Cari barangmu disini.." style="width: 400px;">
                <button style="border: 0; background: none; cursor: pointer;" type="submit" name="cari"><img src="assets/icon/search_24px.png"></button>
            </form>

            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                
            </li>
            <li class="nav-item mr-1">
            <a href="php/login.php"><button type="button" class="btn btn-outline-secondary">Log in</button></a>
            </li>
            <li class="nav-item">
            <a href="php/login.php"><button type="button" class="btn btn-primary">Sign up</button></a>
            </li>
            </ul>
        </div>
        </nav>
    </section>

    <section>
        <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="assets/img/aqua_tv.png" alt="First slide" height="600px;">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        </div>
    </section>

    <section>
    <?php if(empty($elektronik)) : ?>
                <h1>Data tidak ditemukan</h1>
    <?php else : ?>
        <div class="card-columns">
    <?php foreach ($elektronik as $barang) : ?>
        <div class="card" style="width: 250px;">
        <img class="card-img-top" src="assets/img/<?= $barang['produk'] ?>" alt="ini gambar <?= $barang['tipe'] ?> "height="200px">
        <div class="card-body">
            <p class="card-text"><b><?= $barang['merk']?> <?= $barang['tipe'] ?></b></p>
            <p class="card-text harga"><b>Rp<?= $barang['harga'];?>,-</b></p>
            <a href="php/detail.php/?tipe=<?= $barang['tipe']; ?>" class="btn btn-primary">Selengkapnya</a>
        </div>
        </div>
    <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </section>
</body>
</html>