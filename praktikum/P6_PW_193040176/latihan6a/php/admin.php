<?php

require 'functions.php';

$elektronik = query("SELECT * FROM elektronik");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="13" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Opsi</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Harga</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($elektronik as $uye) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href=""><button>Ubah</button></a>
                    <a href=""><button>Hapus</button></a>
                </td>
                <td><img src="../assets/img/<?= $uye['produk']; ?>" alt="" height="100px" width="100px"></td>
                <td><?= $uye['kategori']; ?></td>
                <td><?= $uye['merk']; ?></td>
                <td><?= $uye['tipe']; ?></td>
                <td><?= $uye['harga']; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>