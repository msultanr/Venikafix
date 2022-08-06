<?php
session_start();

$id = $_SESSION['id'];

include '../database/connection.php';
if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login_vendor.php';</script>";
    die();
}

if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $kecamatan = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $instagram = mysqli_real_escape_string($koneksi, $_POST['instagram']);
    $website = mysqli_real_escape_string($koneksi, $_POST['website']);

    $sql = mysqli_query($koneksi, "SELECT username FROM vendor where username = '$username' and id !='$id'");
    if($cek = mysqli_num_rows($sql) > 0) {
        echo "<script>
                alert('Username sudah terpakai');
                </script>";
        echo "<script>document.location.href='pengaturan.php';</script>";}
    else{
        $sql = mysqli_query($koneksi, "SELECT nama FROM vendor where nama = '$nama' and id !='$id'");
        if($cek = mysqli_num_rows($sql) > 0) {
            echo "<script>
                    alert('Nama sudah terpakai');
                    </script>";
            echo "<script>document.location.href='pengaturan.php';</script>";}

        else{
            $sql = mysqli_query($koneksi, "SELECT email FROM vendor where email = '$email' and id !='$id'");
            if($cek = mysqli_num_rows($sql) > 0) {
                echo "<script>
                        alert('email sudah terpakai');
                        </script>";
                echo "<script>document.location.href='pengaturan.php';</script>";}

            else{
                $sql = mysqli_query($koneksi, "SELECT no_hp FROM vendor where no_hp = '$no_hp' and id !='$id'");
                if($cek = mysqli_num_rows($sql) > 0) {
                    echo "<script>
                            alert('Nomor Handphone sudah terpakai');
                            </script>";
                    echo "<script>document.location.href='pengaturan.php';</script>";}
                else{
                    $sql = mysqli_query($koneksi,
                    "UPDATE vendor SET username = '$username', nama = '$nama', email = '$email', no_hp = '$no_hp', alamat = '$alamat', deskripsi = '$deskripsi', kecamatan = '$kecamatan',
                    instagram = '$instagram', website = '$website'
                    WHERE id = '$id'");
                    $cek = mysqli_affected_rows($koneksi);
                    if ($cek > 0)
                    {
                        echo "<script>
                                alert('Data vendor berhasil diupdate');
                                </script>";
                        echo "<script>document.location.href='pengaturan.php';</script>";}
                    }
                }
            }
        }
    }
?>