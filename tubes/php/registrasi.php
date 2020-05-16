<?php
    require 'functions.php';

    if(isset($_POST["register"])) {
        if(registrasi($_POST) > 0) {
            echo "<script>
                    alert('registrasi Berhasil'); document.location.href = 'login.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Registrasi gagal');
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
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/style_log.css">
</head>
<body>
        <div class="container">
        <h3>REGISTRASI</h3>
        <form action="" method="post">
        <table>
            <tr>
                <td><input class="form-control mb-1" type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input class="form-control mt-1 mb-2" type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><button class="btn btn-warning mt-4 mb-3" type="submit" name="register"><b>Registrasi<b></button></td>
            </tr>
        </table>
        </div>
    </form>
</body>
</html>