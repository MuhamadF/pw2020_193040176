<?php
require '../php/functions.php';
$elektronik = cari($_GET['keyword']);
?>

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
            <a href="php/detail.php/?tipe=<?= $barang['tipe']; ?>" class="btn btn-outline-dark">Selengkapnya</a>
        </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>