<?php

    function koneksi() {
        $conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal");
        mysqli_select_db($conn, "tubes_193040176") or die("Database Salah!");

        return $conn;
    }

    function query($sql) {
        $conn = koneksi();
        $result = mysqli_query($conn, "$sql");

        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data)
    {
        $conn = koneksi();

        $ktgr = htmlspecialchars($data['kategori']);
        $merk = htmlspecialchars($data['merk']);
        $tipe = htmlspecialchars($data['tipe']);
        $harga = htmlspecialchars($data['harga']);
        $gmbr = htmlspecialchars($data['gambar']);

        $query = "INSERT INTO elektronik
                        VALUES
                        ('', '$gmbr', '$ktgr', '$merk', '$tipe', '$harga')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($id)
    {
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM elektronik WHERE no = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        $conn = koneksi();

        $id = htmlspecialchars($data['no']);
        $ktgr = htmlspecialchars($data['kategori']);
        $merk = htmlspecialchars($data['merk']);
        $tipe = htmlspecialchars($data['tipe']);
        $harga = htmlspecialchars($data['harga']);
        $img = htmlspecialchars($data['produk']);

        $query = "UPDATE elektronik SET
                    produk = '$img',
                    kategori = '$ktgr',
                    merk = '$merk',
                    tipe = '$tipe',
                    harga = '$harga'
                    WHERE no = $id
                    ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function registrasi($data) {
        $conn = koneksi();
        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);

        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('username sudah digunakan');
                    </script>";
                    return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query_tambah = "INSERT INTO user VALUES('', '$username', '$password')";
        mysqli_query($conn, $query_tambah);

        return mysqli_affected_rows($conn);
    }

    ?>