<?php

session_start();

include '../database/connection.php';

if(isset($_POST['submit']) & isset($_POST['rating'])){
    $id_book = $_POST['id_book'];
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];

    $sql = mysqli_query($koneksi,
    "UPDATE booking SET rating = '$rating', komentar = '$komentar' where id = '$id_book'");
    $cek = mysqli_affected_rows($koneksi);
    if ($cek > 0){
        echo '<script>alert(Berhasil memberi rating!);</script>';
        echo "<script> document.location.href='pesanan_user.php';</script>";
    }
    echo '<script> alert(Gagal memberi rating!);</script>';
    echo "<script> document.location.href='pesanan_user.php';</script>";

}
else {
    echo "<script> document.location.href='pesanan_user.php';</script>";
}

?>