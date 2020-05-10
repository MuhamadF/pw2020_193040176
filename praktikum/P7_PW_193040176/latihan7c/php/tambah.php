<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit;
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
    <h3>FORM tambah data Elektronik</h3>
    <form action="" method="post">
        <ul>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar" required> <br> <br>
            </li>
            <li>
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" required> <br> <br>
            </li>
            <li>
                <label for="merk">Merk</label>
                <input type="text" name="merk" id="merk" required> <br> <br>
            </li>
            <li>
                <label for="tipe">Tipe</label>
                <input type="text" name="tipe" id="tipe" required> <br> <br>
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" required> <br> <br>
            </li>
        </ul>
        <br>
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit"><a href="../index.php">Kembali</a></button>
    </form> 
</body>
</html>

<?php

    require 'functions.php';

    if(isset($_POST['tambah'])) {
        if(tambah($_POST) > 0) {
            echo "<script>
                        alert('Data Berhasil ditambahkan!');
                        document.localtion.href = 'admin.php'
                        </script>";
        } else {
            echo "<script>
                        alert('Data Gagal ditambahkan!');
                        document.location.href = 'admin.php;
                        </script>";
        }
    }
    ?>