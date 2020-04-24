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
</head>
<body>
  
    <div class="container">
        <div class="gambar">
            <img src="../../assets/img/<?=$barang['produk']; ?>" alt="aaa" width="500px" height="500px">
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