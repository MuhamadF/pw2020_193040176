<?php

require 'php/functions.php';


if(isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $elektronik = query("SELECT * FROM ELEKTRONIK WHERE
                            tipe LIKE '%$keyword%' ");
} else {
    $elektronik = query("SELECT * FROM elektronik");
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
   <div class="container">
    
    <form action="" method="get">
        <input type="text" name="keyword" autofocus placeholder="cari barang disini..">
        <button type="submit" name="cari">Search</button>
    </form>


    <?php if(empty($elektronik)) : ?>
        <tr>
            <td colspan="7">
                <h1>Data tidak ditemukan</h1>
            </td>
        </tr>
    <?php else : ?>
    <?php foreach ($elektronik as $barang) : ?>
        <p class="nama">
            <a href="php/detail.php/?tipe=<?= $barang['tipe'] ?>">
                <?= $barang['tipe']; ?>
            </a>
        </p>
    <?php endforeach; ?>
   </div>
    </table>
    <?php endif; ?>
    <a href="php/admin.php"><button>HALAMAN ADMIN</button></a>
</body>
</html>