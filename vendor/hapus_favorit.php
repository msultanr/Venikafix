<?php

    session_start();

    include '../database/connection.php';

    $id_user = $_SESSION['id'];

    if(isset($_POST['submit'])){
        $id_vendor = $_POST['id_vendor'];
        $id_jenis = $_POST['id_jenis'];
        // echo $id_user;
        // echo $id_jenis;
        // echo $id_vendor;
        $sql = mysqli_query($koneksi,
        "DELETE FROM favorit WHERE id_vendor='$id_vendor' AND id_jenis='$id_jenis' AND id_user='$id_user'");
        if(mysqli_affected_rows($koneksi) > 0){
            echo "<script>alert('Berhasil dihapus dari favorit!');</script>";
            echo "<script>document.location.href='detail.php?" . $id_vendor . "?" . $id_jenis ."';</script>";
    }
        else{
            echo 'ERROR';
        }


    }

?>