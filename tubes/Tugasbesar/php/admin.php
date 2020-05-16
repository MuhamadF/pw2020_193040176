<?php

session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


if(isset($_GET['cari'])) {
    $elektronik = $elektronik = cari($_GET['keyword']);
} else {
    $elektronik = query("SELECT * FROM elektronik");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background: #e6e6e6;">

    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-5" href="#"><h1 style='color:white;'><span style="color: goldenrod;">ELECTRO</span>nics</h1></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="z-index: 9999">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2 mr-5">
                        <a class="nav-link" href="../index.php" style="color:white; font-weight: bold;">HOME</a>
                    </li>
                    <li class="nav-item active  mt-2 mr-5">
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION["username"]; ?>
                        </button>
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-5" href="#"><h2>Halaman admin</h2></a>

            <form class="form-inline" method="get">
                <input style="width: 400px;" class="form-control mr-sm-2 keyword" type="search" name="keyword" placeholder="Cari barang disini ... " autocomplete="off" autofocus aria-label="Search">
                <button class="btn btn-outline-dark my-2 my-sm-0 cari" type="submit" name="cari">Search</button>
            </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item active">
               <a class="nav-link" href="tambah.php"><button class="btn btn-outline-dark">Tambah data</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registrasi.php"><button class="btn btn-outline-dark">Tambah User</button></a>
            </li>
            <li class="nav-item dropdown">
            </li>
            </ul>
        </div>
    </nav>
    </div>
    </section>

    <section>
    <div class="container bg-light mt-3" style="padding: 10px; border-radius: 5px;">
    <?php if(empty($elektronik)) : ?>  
                <h1 style="text-align: center; margin-top: 200px;">OOPS?!</h1>
                <h1 style="text-align: center; ">Data tidak ditemukan</h1>
        <?php else : ?>
    <div class="container">
    <table class="table table-bordered">
        <thead align="center">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Produk</th>
            <th scope="col">Merk</th>
            <th scope="col">Tipe</th>
            <th scope="col">Harga</th>
            <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($elektronik as $uye) : ?>
            <tr>
                <th scope="row"><?= $uye['no']; ?></th>
                <td><?= $uye['kategori']; ?></td>
                <td><img src="../assets/img/<?= $uye['produk']; ?>" alt="" height="100px" width="100px"></td>
                <td><?= $uye['merk']; ?></td>
                <td><?= $uye['tipe']; ?></td>
                <td><b>Rp. <?= $uye['harga']; ?>,-</b></td>
                <td align="center">
                    <a href="ubah.php?no=<?= $uye['no']; ?>"><button class="btn btn-warning btn-sm">Ubah</button></a>
                    <a href="hapus.php?no=<?= $uye['no']; ?>" onclick="return confirm('Data tidak bisa dikembalikan, yakin ingin menghapus data?');" >
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    </section>

</body>
</html>