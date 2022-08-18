<?php

    include '../database/connection.php';

    if($_POST['submit'] == 'terima'){
    $id_booking = $_POST['id_book'];
    $note = $_POST['note'];

    $sql = mysqli_query($koneksi,
    "UPDATE booking SET status = 1 where id = '$id_booking'");

    if(mysqli_affected_rows($koneksi) > 0){
        $sql = mysqli_query($koneksi,
        "INSERT INTO note(id_booking, note) values ('$id_booking', '$note')");
        $cek = mysqli_affected_rows($koneksi);
        if($cek > 0){
        echo '<script> alert(Data berhasil diterima!)';
        echo "<script>document.location.href='req_pesanan.php';</script>";
        }
    }

    else{
        echo "<script>document.location.href='req_pesanan.php';</script>";
    }
    echo "<script>document.location.href='req_pesanan.php';</script>";
}
    if($_POST['submit'] == 'tolak'){
        $id_booking = $_POST['id_book1'];
        $note = $_POST['note'];

        $sql = mysqli_query($koneksi,
        "UPDATE booking SET status = 3 where id = '$id_booking'");

    if(mysqli_affected_rows($koneksi) > 0){
        $sql = mysqli_query($koneksi,
        "INSERT INTO note(id_booking, note) values ('$id_booking', '$note')");
        $cek = mysqli_affected_rows($koneksi);
        if($cek > 0){
        echo '<script> alert(Data berhasil ditolak!)';
        echo "<script>document.location.href='req_pesanan.php';</script>";
        }
    }

    else{
        echo "<script>document.location.href='req_pesanan.php';</script>";
    }

    echo "<script>document.location.href='req_pesanan.php';</script>";
}
?>