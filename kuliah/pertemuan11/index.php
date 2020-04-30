<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="Cari mahasiswa disini.." autocomplete="off" autofocus>
    <button type="submit" name="cari">Search</button>
  </form>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="4">
          <p style="color: red; font-weight: bold;">data mahasiswa tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $m['id']; ?></td>
        <td><img width="100px" src="img/<?= $m['gambar']; ?>"></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>