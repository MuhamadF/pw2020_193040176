<?php

if(!isset($_GET['tipe'])) {
    header("location: ../index.php");
    exit;
}

require 'functions.php';

$id = $_GET['tipe'];
$barang = query("SELECT * FROM elektronik WHERE tipe = '$id'")[0];

// random 5 (rekomendasi ceritanya)
$lainnya  = query("SELECT * FROM elektronik ORDER BY RAND() LIMIT 5");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <style>
        .list {
            color: gray;
            font-weight: bold;

        }

        .harga {
            font-weight: bolder;
        }
    </style>
</head>
<body>


        <!-- TEMPORARY  -->

  
        <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark mb-1">
        <a class="navbar-brand ml-5" href="#"><h1 style="color:white;"><span style="color: goldenrod;">ELECTRO</span>nics</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="z-index: 9999">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2 mr-5">
                        <a class="nav-link" href="../../index.php" style="color:white; font-weight: bold;">HOME</a>
                    </li>
                    <li class="nav-item mt-2 mr-5">
                        <a class="nav-link" href="../../index.php#produk" style="color:white; font-weight: bold;">PRODUK</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../login.php"><button class="btn btn-outline-light mr-5">Masuk</button></a>
                    </li>
                </ul>
            </div>
    </nav>
    </section>

    <div class="container mt-5">

        <div class="row">

        <div class="col">
            <img src="../../assets/img/<?=$barang['produk']; ?>" alt="aaa" width="400px" height="400px">
        </div>

        <div class="col mt-4">
        <h1><?= $barang['merk']; ?> <?= $barang['tipe']; ?></h1>
        <hr>

            <table cellpadding=7>
                <tr>
                    <td><p class="list">KATEGORI</p></td>
                    <td>:</td>
                    <td><p><?= $barang['kategori']; ?></p></td>
                </tr>
                <tr>
                    <td><p class="list">MERK</p></td>
                    <td>:</td>
                    <td><p><?= $barang['merk']; ?></p></td>
                </tr>
                <tr>
                    <td><p class="list">HARGA</p></td>
                    <td>:</td>
                    <td><p class="harga">Rp <?= $barang['harga']; ?>,-</p></td>
                </tr>
                <tr>
                    <td><a href="../../index.php">Cari Produk lain?</a></td> 
                </tr>

            </table>
        </div>
        </div>
    </div>

    <section>
    <div class="container">
        <h5 class="mt-4 mb-4">Rekomendasi untukmu</h5>
    
        <div class="card-deck">
    <?php foreach ($lainnya as $barang) : ?>
        <div class="card" style="width: 250px;">
        <img class="card-img-top" src="../../assets/img/<?= $barang['produk'] ?>" alt="ini gambar <?= $barang['tipe'] ?> "height="200px">
        <div class="card-body">
            <p class="card-text"><b><?= $barang['merk']?> <?= $barang['tipe'] ?></b></p>
            <p class="card-text harga">Rp<?= $barang['harga'];?>,-</p>
            <a href="?tipe=<?= $barang['tipe']; ?>" class="btn btn-outline-dark">Selengkapnya</a>
        </div>
        </div>
    <?php endforeach; ?>
    </div>

    </section>

    <section>
        <div class="row m-0 mt-5 bg-dark" style="padding: 50px">
          <div class="col">
          <h1 style="color:white;"><span style="color: goldenrod;">ELECTRO</span>nics</h1>
          </div>
          <div class="col">
              <h2 style="color:goldenrod;">Helpful Links</h2>
                    <a href="../../index.php#produk" class="nav-link" style="color:white;">PRODUK</a>
                    <a href="../../index.php" class="nav-link" style="color:white;">HOME</a>


          </div>
        </div>
        <div class="footer" style="color:white; text-align: center; background: rgb(30,30,30);"> &copy; Muhamad Fawwazt 2020.</div>
    </section>
</body>
</html>