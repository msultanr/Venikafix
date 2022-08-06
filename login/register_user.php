<?php 
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

// Check apakah terdapat post register
if (isset($_POST['register'])) {
	if(empty($_POST["reg_nama"]) && empty($_POST["reg_user"]) && empty($_POST["reg_email"]) && empty($_POST["reg_pass"]) && empty($_POST["reg_pass2"]))
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

		$result = mysqli_query($koneksi, "SELECT username FROM user where username = '$user'");
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
			$result = mysqli_query($koneksi, "SELECT email FROM user where email = '$email'");
			if(mysqli_num_rows($result) > 0) {
				echo "<script>
						alert('Email sudah terdaftar!');
						</script>";
				return false;
		}
			else{
		// sql query 
			$pass = md5($pass);
			$sql = "INSERT INTO user(nama,email,username,password) values ('$nama','$email','$user','$pass')";
			mysqli_query($koneksi, $sql);
			if(mysqli_affected_rows($koneksi) > 0){
				// buat session login
				$_SESSION['is_login'] = true;

				// beri pesan dan dialihkan ke halaman admin
				echo "<script>alert('Registrasi Berhasil!');
				</script>";
				echo "<script>document.location.href='../index.php';</script>";
				}
			else{
					// beri pesan dan dialihkan ke halaman login
					echo "error";
					echo "<script>document.location.href='../index.php';</script>";
				}
			}
				}
			}
		}
else{
	echo "<script>alert('masukkan data!'); </script>";
}
?>