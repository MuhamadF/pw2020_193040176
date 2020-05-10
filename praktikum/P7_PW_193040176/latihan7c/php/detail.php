<?php

if(!isset($_GET['tipe'])) {
    header("location: ../index.php");
    exit;
}

require 'functions.php';

$id = $_GET['tipe'];
$barang = query("SELECT * FROM elektronik WHERE tipe = '$id'")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/style_detail.css">
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="../../css/style.css">
</head>
<body>


        <!-- TEMPORARY  -->

  
<section>
    <div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Toko Ceritanya</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
    <form class="form-inline form-search" method="get">
        <input class="input-search mr-2" type="search" name="keyword" placeholder="Cari barangmu disini.." style="width: 400px;">
        <button style="border: 0; background: none; cursor: pointer;" type="submit" name="cari"><img src="../../assets/icon/search_24px.png"></button>
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
</div>
</section>

    <div class="con">

        <div class="gambar">
            <img src="../../assets/img/<?=$barang['produk']; ?>" alt="aaa" width="400px" height="400px">
        </div>
        <div class="keterangan">
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
</body>
</html>