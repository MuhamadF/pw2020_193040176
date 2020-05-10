<?php 

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

     require 'functions.php';

     $id = $_GET['no'];
     $uye = query("SELECT * FROM elektronik WHERE no = $id")[0];

    if(isset($_POST['ubah'])) {
        if(ubah($_POST) > 0) {
            echo "<script>
                        alert('Data Berhasil diubah!');
                        document.localtion.href = 'admin.php'
                        </script>";
        } else {
            echo "<script>
                        alert('Data Gagal diubah!');
                        document.location.href = 'admin.php;
                        </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>FORM Ubah data Elektronik</h3>
    <form action="" method="post">
    <input type="hidden" name="no" id="no" value="<?= $uye['no']; ?>">
        <ul>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="produk" id="produk" required value="<?= $uye['produk']; ?>"> <br> <br>
            </li>
            <li>
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" required value="<?= $uye['kategori']; ?>"> <br> <br>
            </li>
            <li>
                <label for="merk">Merk</label>
                <input type="text" name="merk" id="merk" required value="<?= $uye['merk']; ?>"> <br> <br>
            </li>
            <li>
                <label for="tipe">Tipe</label>
                <input type="text" name="tipe" id="tipe" required value="<?= $uye['tipe']; ?>"> <br> <br>
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" required value="<?= $uye['harga']; ?>"> <br> <br>
            </li>
        </ul>
        <br>
        <button type="submit" name="ubah">Ubah</button>
        <button type="submit"><a href="admin.php">Kembali</a></button>
    </form> 
</body>
</html>