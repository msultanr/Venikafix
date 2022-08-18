<?php
    include '../database/connection.php';
    session_start();

    // $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // $id = parse_url($actual_link, PHP_URL_QUERY);
    // echo $id;
    // $query = mysqli_query($koneksi,
    // "SELECT * FROM vendor where id = '$id'");
    // $cek = mysqli_fetch_assoc($query);
    // $id_vendor = $cek['id'];
    // echo $id_vendor;

    $id_user = $_SESSION['id'];
    if(!isset($_SESSION['username'])){
        echo "<script> alert('Maaf anda harus Login Terlebih Dahulu!')";
        echo "<script>document.location.href='http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';</script>";
    }

    else{
        if(isset($_POST['booking'])){
            // nama lengkap
            $nama = $_POST["nama"];
            // no hp
            $no_hp = $_POST["no_hp"];
            // tanggal
            $tanggal = $_POST["tanggal"];
            // jenis_layanan
            $jenis_layanan = $_POST["jenis_layanan"];
            // paket
            $paket = $_POST["paket"];

            $id_vendor = $_POST['id'];

            $sql = mysqli_query($koneksi,
            "INSERT INTO booking(id_vendor, id_user, nama, no_hp, tanggal, jenis_layanan, paket, status)
            VALUES ('$id_vendor','$id_user','$nama','$no_hp','$tanggal','$jenis_layanan','$paket', '0')");

            if(mysqli_affected_rows($koneksi) > 0){
				// beri pesan jika booking berhasil dan dialihkan ke halaman admin
				echo "<script>alert('Booking Berhasil!');
				</script>";
				echo "<script>document.location.href='../';</script>";
				}
			else{
					// beri pesan dan dialihkan ke halaman login
					echo "<script>alert('GAGAL BOOKING!');</script>";
					echo "<script>document.location.href='../';</script>";
				}
        }
    }


?>
