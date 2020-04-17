<?php

require 'php/functions.php';

$uye = query("SELECT * FROM elektronik");

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

        <?php foreach($uye as $array_barang) { ?>
        <tr>
            <td><?php echo $array_barang["no"]; ?></td>
            <td><?php echo '<img src="assets/img/'.$array_barang["produk"].'" width="100px" height="100px">'; ?></td>
            <td><?php echo $array_barang["kategori"]; ?></td>
            <td><?php echo $array_barang["merk"]; ?></td>
            <td><?php echo $array_barang["tipe"]; ?></td>
            <td><?php echo"Rp ".$array_barang["harga"].",-"; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>