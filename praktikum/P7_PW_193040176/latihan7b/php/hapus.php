<?php
    require 'functions.php';

    $id = $_GET['no'];

    if(hapus($id) > 0) {
        echo "<script>
                    alert('Data Berhasil dihapus!')
                    document.location.href = 'admin.php';
                </script>";
            } else {
        echo "<script>
                    alert('Data gagal dihapus!')
                    document.location.href = 'admin.php';
                    </script>";
            }

?>