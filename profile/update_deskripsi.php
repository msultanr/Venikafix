<?php

    include '../database/connection.php';

    session_start();

    if (isset($_POST['update'])){
        $deskripsi = $_POST['deskripsi'];
        $id_vendor = $_POST['id_vendor'];
        $id_jenis = $_POST['id_jenis'];

        $sql = mysqli_query($koneksi,
        "UPDATE jenis_layanan SET deskripsi = '$deskripsi' WHERE id_vendor='$id_vendor' AND id = $id_jenis");
        // echo mysqli_affected_rows($koneksi);
        if(mysqli_affected_rows($koneksi) > 0){
            echo "<script> alert('Data berhasil di-update!')";
            echo "<script>document.location.href='data_vendor.php?" . $id_vendor . "?" . $id_jenis . "';</script>";
        }
        echo "<script>document.location.href='data_vendor.php?" . $id_vendor . "?" . $id_jenis . "';</script>";
    }

?>