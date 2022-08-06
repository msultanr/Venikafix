<?php

include '../database/connection.php';
session_start();
$id = $_SESSION['id'];
    if(isset($_POST["proses"])){
    //   $id = $_POST["id"];
    //   $nama = $_POST["nama"];
    //   $email = $_POST["email"];
    //   $no_hp = $_POST["no_hp"];
    //   $username = $_POST["username"];
    //   $password = $_POST["password"];

      $direktori = "../photo/";
      $file_name = $_FILES['NamaFile']['name'];
      move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori.$file_name);

      $sql = mysqli_query($koneksi,
    "UPDATE user SET photo = '$file_name' WHERE id = '$id'");
    if ($cek = mysqli_affected_rows($koneksi) > 0){
    //   mysqli_query($koneksi, "update into user set photo='$file_name'");
    //   mysqli_query($koneksi, "update user set photo='$file_name' where id='$_SESSION['id']'");
      echo "<script>alert('File Berhasil Diupload');</script>";
      echo "<script>document.location.href='dashboard_user.php';</script>";
    }
    else{
        echo "<script>alert('Foto Berhasil Dihapus!');</script>";
        echo "<script>document.location.href='dashboard_user.php';</script>";
    }

    }
    ?>