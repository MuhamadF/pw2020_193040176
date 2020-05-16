<?php
session_start();
require 'functions.php';

if (isset($_SESSION['username'])) {
  header('Location: admin.php');
  exit;
}
// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);

      // jika remember me dicentang
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }

      if (hash('sha256', $row['id']) == $_SESSION['hash']) {
        header("Location: admin.php");
        die;
      }
      header("Location: ../index.php");
    }
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
        <div class="container">
        <h3>LOGIN</h3>
        <table>
        <form action="" method="post" class="form-group">
        <?php if(isset($error)) : ?>
        <tr>
          <td>
            <p style="color: red; font-style: italic;">Usename atau password salah</p>
          </td>
        </tr>
        <?php endif; ?>
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
                <td><button class="btn btn-warning mt-4 mb-3" type="submit" name="submit"><b>Login</b></button></td>
            </tr>
            <tr>
                <td> <p>Bukan member ? Registrasi <a href="registrasi.php">disini!</a></p></td>
            </tr>
        </table>
        </div>
    </form>
    
</body>
</html>