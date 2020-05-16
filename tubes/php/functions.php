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
        //$gmbr = htmlspecialchars($data['gambar']);
        $gmbr = upload();

        if(!$gmbr) {
            return false;
        }

        $query = "INSERT INTO elektronik
                        VALUES
                        ('', '$gmbr', '$ktgr', '$merk', '$tipe', '$harga')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($id)
    {
        $conn = koneksi();

        // somehow query gagal (undefined index produk)
        $hapus = query("SELECT * FROM elektronik WHERE no = $id");
        if($hapus['produk'] != 'no_photo.jpg') {
            unlink('../assets/img/'. $hapus['produk']);
        }

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
        $img_old = htmlspecialchars($data['gambar_lama']);

        $img = upload();

        if(!$img) {
            return false;
        }

        if($img == 'no_photo.jpg') {
            $img = $img_old;
        }

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

        $result = mysqli_query($conn, "SELECT user_uname FROM user WHERE username = '$username' ");
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

    function upload() {
        $file = $_FILES['gambar']['name'];
        $tipe = $_FILES['gambar']['type'];
        $ukuran = $_FILES['gambar']['size'];
        $err = $_FILES['gambar']['error'];
        $tmp = $_FILES['gambar']['tmp_name'];

        if($err == 4) {
            return 'no_photo.jpg';
        }

        $daftar_ext = ['jpg', 'jpeg', 'png'];
        $ext = explode('.', $file);
        $ext = strtolower(end($ext));

            if(!in_array($ext, $daftar_ext)) {
                echo "<script> alert('yang anda pilih bukan gambar');
                </script>";
                return false;
            }

            if($tipe != 'image/jpeg' && $tipe != 'image/png') {
                echo "<script> alert('Yang');
                </script>";
                return false;
            }

            if($ukuran > 5000000) {
                echo "<script> alert('ukuran file terlalu besar');
                </script>";
                return false;
            }

            $file_baru = uniqid();
            $file_baru .= '.';
            $file_baru .= $ext;
            move_uploaded_file($tmp, '../assets/img/' . $file_baru);

            return $file_baru;
        }

        //comot
        function cari($keyword) {
            $conn = koneksi();

            $query = "SELECT * FROM elektronik
                        WHERE tipe LIKE '%$keyword%' OR
                        merk LIKE '%$keyword%' OR
                        kategori LIKE '%$keyword%'";

            $result = mysqli_query($conn, $query);

            $rows = [];

            while ($row = mysqli_fetch_array($result)) {
                $rows[] = $row;
            }

            return $rows;
        }

    ?>