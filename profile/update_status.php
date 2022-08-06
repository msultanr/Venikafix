<?php

session_start();

include '../database/connection.php';

if(isset($_POST['submit'])){
    $id_book = $_POST['id_book'];
    $status = $_POST['status'];
    // echo $id_book;
    // echo $status;

    $sql = mysqli_query($koneksi,
    "UPDATE booking SET status = '$status' where id = '$id_book'");
    $cek = mysqli_affected_rows($koneksi);
    if ($cek > 0){
        echo '<script> alert(Status berhasil diubah!)';
        echo "<script> document.location.href='data_pesanan.php'; </script>";
    }
    echo "<script> document.location.href='data_pesanan.php'; </script>";
}

?>