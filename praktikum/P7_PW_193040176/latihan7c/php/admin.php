<?php

session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


if(isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $elektronik = query("SELECT * FROM ELEKTRONIK WHERE
                            merk LIKE '%$keyword%' OR
                            tipe LIKE '%$keyword%' OR
                            kategori LIKE '%$keyword' ");
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
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <a href="tambah.php"><button>Tambah data</button></a>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>

    <form action="" method="get">
        <input type="text" name="keyword" autofocus>
        <button type="submit" name="cari">Search</button>
    </form>

    <table border="1" cellpadding="13" cellspacing="0">
    <?php if(empty($elektronik)) : ?>
        <tr>
            <td colspan="7">
                <h1>Data tidak ditemukan</h1>
            </td>
        </tr>
        <?php else : ?>
        <tr>
            <th>#</th>
            <th>Opsi</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Harga</th>
        </tr>
        <?php foreach($elektronik as $uye) : ?>
            <tr>
                <td><?= $uye['no']; ?></td>
                <td>
                    <a href="ubah.php?no=<?= $uye['no']; ?>"><button>Ubah</button></a>
                    <a href="hapus.php?no=<?= $uye['no']; ?>" onclick="return confirm('Hapus data?');"><button>Hapus</button></a>
                </td>
                <td><img src="../assets/img/<?= $uye['produk']; ?>" alt="" height="100px" width="100px"></td>
                <td><?= $uye['kategori']; ?></td>
                <td><?= $uye['merk']; ?></td>
                <td><?= $uye['tipe']; ?></td>
                <td><?= $uye['harga']; ?></td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>