<?php 
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

// Check apakah terdapat post register
if (isset($_POST['register'])) {
	if(empty($_POST["reg_nama"]) && empty($_POST["reg_user"]) && empty($_POST["reg_layanan"]) && empty($_POST["reg_email"]) && empty($_POST["reg_pass"]) && empty($_POST["reg_pass2"]))
	{
		echo '<script>alert("Isi Semua Form!")</script>';
		return false;
	}
	else{
		// nama lengkap
		$nama = mysqli_real_escape_string($koneksi, $_POST["reg_nama"]);
		// username 
		$user = mysqli_real_escape_string($koneksi, $_POST["reg_user"]);
		//email
		$email = mysqli_real_escape_string($koneksi, $_POST["reg_email"]);
		// password
		$pass = mysqli_real_escape_string($koneksi, $_POST["reg_pass"]);
		// konfirmasi password
		$pass2 = mysqli_real_escape_string($koneksi, $_POST["reg_pass2"]);

		$result = mysqli_query($koneksi, "SELECT username FROM vendor where username = '$user'");
		if(mysqli_num_rows($result) > 0) {
			echo "<script>
					alert('Username sudah terdaftar');
					</script>";
			return false;
		}

		if ($pass !== $pass2 ) {
			echo "<script>
					alert('Password tidak sama!');
					</script>";
			return false;
		}
		else{
		// sql query 
			$pass = md5($pass);
			$sql = "INSERT INTO vendor(username, password, nama, email) values ('$user','$pass','$nama','$email')";
			mysqli_query($koneksi, $sql);
            // $query = "
            // INSERT INTO vendor(username, password, nama, status) values ('$user','$pass','$nama','0');
            // INSERT INTO jenis_layanan(nama_layanan) values ('$layanan');
            // INSERT INTO login(username, password, tipe) values ('$user', '$pass', 'vendor');            
            // ";
            // $result = $koneksi->multi_query($query);
			// $sql = mysqli_query($koneksi, "INSERT INTO vendor(username, password, nama, status) values ('$user','$pass','$nama','0')");
            // $sql2 = mysqli_query($koneksi, "INSERT INTO jenis_layanan(nama_layanan) values ('$layanan')");
            // $sql3 = mysqli_query($koneksi, "INSERT INTO login(username, password, tipe) values ('$user', '$pass', 'vendor')");
			if(mysqli_affected_rows($koneksi) > 0){
				// buat session login
				// $_SESSION['is_login'] = true;

				// beri pesan dan dialihkan ke halaman admin
				echo "<script>alert('Registrasi Berhasil!');
				</script>";
				echo "<script>document.location.href='../index.php';</script>";
				}
			else{
					// beri pesan dan dialihkan ke halaman login
					echo "<script>alert('error');</script>";
					echo "<script>document.location.href='../index.php';</script>";
				}
			}
				}
		}
else{
	echo "<script>alert('masukkan data!'); </script>";
}
?>