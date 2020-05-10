<?php 
    session_start();
    require 'functions.php';

    if(isset($_SESSION['username'])) {
        header("Location: admin.php");
        exit;
    }

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($cek_user) > 0) {
            $row = mysqli_fetch_assoc($cek_user);
            if($password == $row['password']) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['hash'] = $row['id'];
            }
            if($row['id'] == $_SESSION['hash']) {
                header("Location: admin.php");
                die;
            }
            header("Location: ../index.php");
            die;
        }
        $error = true;
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
    <form action="" method="post" class="form-group">
        <?php if(isset($error)) : ?>
        <p style="color: red; font-style: italic;">Usename atau password salah</p>
        <?php endif; ?>

        <div class="container">
        <h3>LOGIN</h3>
        <table>
            <tr>
                <td><input class="form-control mb-1" type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input class="form-control mt-1 mb-2" type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remember"> <label for="remember">Ingat saya</label></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary mt-4" type="submit" name="submit">Login</button></td>
            </tr>
        </table>
        </div>
    </form>
    
</body>
</html>