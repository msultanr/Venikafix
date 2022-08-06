<?php
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

$id = $_SESSION['id'];

// Check apakah terdapat post register
if (isset($_POST['tambah'])) {
	if(empty($_POST["thumbnail"]) && empty($_POST["jenis_layanan"])
     && empty($_POST["deskripsi"]) && empty($_POST["fasilitas"])
     && empty($_POST["variasi"]) && empty($_POST["no_hp"])
     && empty($_POST["instagram"]) && empty($_POST["facebook"])
     && empty($_POST["twitter"]) && empty($_POST["website"]) && empty($_POST["galeri"]))
	{
        echo "<script>alert('Isi semua form!');</script>";
		echo "<script>document.location.href='tambah_data_vendor.php';</script>";
		return false;
	}
	else{

		// Thumbnail
		$direktori = "../thumbnail/";
		$file_name = $_FILES['thumbnail']['name'];
		move_uploaded_file($_FILES['thumbnail']['tmp_name'], $direktori.$file_name);

		// Jenis Layanan
		$jenis_layanan = mysqli_real_escape_string($koneksi, $_POST["jenis_layanan"]);
		// Deskripsi
		$deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);
		// Fasilitas
		$fasilitas = mysqli_real_escape_string($koneksi, $_POST["fasilitas"]);
        // Variasi
		$variasi = mysqli_real_escape_string($koneksi, $_POST["variasi"]);
		// Adat
		$adat = mysqli_real_escape_string($koneksi, $_POST["adat"]);

		$sql = mysqli_query($koneksi,
        "INSERT INTO jenis_layanan(id_vendor, nama_layanan, deskripsi, fasilitas, variasi, galeri, adat)
        values ('$id', '$jenis_layanan', '$deskripsi', '$fasilitas', '$variasi', '$file_name', '$adat')");
		if(mysqli_affected_rows($koneksi) > 0) {

			$folderUpload = "../galeri/";
			$files = $_FILES;
			$jumlahFile = count($files['galeri']['name']);

			for ($i = 0; $i < $jumlahFile; $i++) {
				$namaFile = $files['galeri']['name'][$i];
				$lokasiTmp = $files['galeri']['tmp_name'][$i];
				$prosesUpload = move_uploaded_file($lokasiTmp, $folderUpload.$namaFile);

			$sql2 = mysqli_query($koneksi, "INSERT INTO galeri_jenis_layanan(id_vendor, id_jenis, galeri)
			values ('$id', (SELECT id FROM jenis_layanan order by id desc limit 1), '$namaFile')");
			if(mysqli_affected_rows($koneksi) > 0) {
                    // beri pesan dan dialihkan ke halaman admin
                    echo "<script>alert('Tambah Layanan Berhasil!');
                    </script>";
                    echo "<script>document.location.href='kategori_layanan_vendor.php';</script>";
				}
			else{
				echo "<script>alert('ERROR!');</script>";
				echo "<script>document.location.href='kategori_layanan_vendor.php';</script>";
				}
			}
				}
			}
		}
else{
	echo "<script>alert('masukkan data!'); </script>";
}
?>