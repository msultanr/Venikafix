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
        "INSERT INTO favorit(id_vendor, id_jenis, id_user) values ('$id_vendor', '$id_jenis', '$id_user')");
        if(mysqli_affected_rows($koneksi) > 0){
            echo "<script>alert('Berhasil ditambahkan ke favorit!');</script>";
            echo "<script>document.location.href='detail.php?" . $id_vendor . "?" . $id_jenis ."';</script>";
    }
        else{
            echo 'ERROR';
        }


    }

?>
