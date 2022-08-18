<?php

    include '../database/connection.php';

    session_start();

    if(isset($_POST['image'])){
        $galeri = $_POST['galeri'];
        $id_vendor = $_POST['id_vendor'];
        $id_jenis = $_POST['id_jenis'];

        $sql = mysqli_query($koneksi,
        "DELETE FROM galeri_jenis_layanan WHERE galeri = '$galeri' AND id_vendor = '$id_vendor' AND id_jenis = '$id_jenis'");
        $cek = mysqli_affected_rows($koneksi);
        if ($cek > 0){
            echo "<script>
            alert('Foto Berhasil Dihapus!');
            </script>";
            echo "<script>document.location.href='data_vendor.php?" . $id_vendor . "?" . $id_jenis . "';</script>";
        }
    }
?>