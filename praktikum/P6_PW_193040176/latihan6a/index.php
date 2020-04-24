<?php

require 'php/functions.php';

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
   <div class="container">
    <?php foreach ($elektronik as $barang) : ?>
        <p class="nama">
            <a href="php/detail.php/?tipe=<?= $barang['tipe'] ?>">
                <?= $barang['tipe']; ?>
            </a>
        </p>
    <?php endforeach; ?>
   </div>
    </table>
</body>
</html>