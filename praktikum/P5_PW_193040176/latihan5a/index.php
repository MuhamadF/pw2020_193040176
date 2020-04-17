<?php
  $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");

  mysqli_select_db($conn, "tubes_193040176") or die("Database Salah!");

  $result = mysqli_query($conn, "SELECT * FROM elektronik");

    $nomor = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table cellpadding="5" border="1">
        <tr>
            <th>No.</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Tipe</th>
            <th>Harga</th>
        </tr>

        <?php while($array_barang = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $array_barang["no"]; ?></td>
            <td><?php echo '<img src="assets/img/'.$array_barang["produk"].'" width="150px" height="150px">'; ?></td>
            <td><?php echo $array_barang["kategori"]; ?></td>
            <td><?php echo $array_barang["merk"]; ?></td>
            <td><?php echo $array_barang["type"]; ?></td>
            <td><?php echo"Rp ".$array_barang["harga"].",-"; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>