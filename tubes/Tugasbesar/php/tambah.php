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

    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body style="background: #e6e6e6;">

    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand ml-5" href="#"><h1><span style="color: goldenrod;">ELECTRO</span>nics</h1></a>
                <div class="dropdown ml-auto">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['username']; ?>
                </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
            </div>
        </nav>

    </section>

    <div class="container bg-light mt-2" style="padding: 10px; border-radius: 10px;">
        <h4>TAMBAH DATA BARANG</h4>
        <hr>

    <div class="row">
        <div class="col-4">
                    <img class="img-preview mt-5 ml-5 mb-3" src="../assets/img/no_photo.jpg" width="300px" style="box-shadow: 1px 1px rgba(60,60,60, 0.3);">
        </div>

        <div class="col mr-2">
                <h4>Info Dasar</h4>
                <hr>
                <form method="post" enctype ="multipart/form-data">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="Merk">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input class="gambar" id="gambar" type="file" name="gambar" onchange="previewImage()">        
                    </div>
                    
                    <button class="btn btn-outline-dark" type="submit" name="tambah">Tambah</button>
                    <a href="admin.php" class="btn btn-outline-danger">Batal</a>
        </div>
    </div>

    <script src="../js/preview.js"></script>
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