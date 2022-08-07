<?php
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

// Check apakah terdapat post Login
if (isset($_POST['login'])) {
	// username
	$user = $_POST['username'];
	// password
	$pass = $_POST['password'];
	$hashpass = md5($pass);
	// sql query
	$sql = mysqli_query($koneksi, "SELECT id, username FROM vendor WHERE username ='$user' AND password='$hashpass'");
	$cek = mysqli_num_rows($sql);
	$cek2 = mysqli_fetch_assoc($sql);
	// echo $cek2['id'];
	// apakah user tersebut ada
	if ($cek > 0) {
		// buat session login
		$_SESSION['is_login'] = true;
		$_SESSION['username'] = $user;
		$_SESSION['id'] = $cek2['id'];
		$_SESSION['tipe'] = 'vendor';
		// echo $_SESSION['id'];
		// beri pesan dan dialihkan ke halaman admin
		// echo "berhasil login";
		echo "<script>document.location.href='../profile/dashboard_vendor.php';</script>";
	}
	else{
		// beri pesan dan dialihkan ke halaman login
		echo "<script> alert('username atau password salah!');</script>";
		echo "<script>document.location.href='../login.php';</script>";
	}
}
else {
	echo "<script> alert('ERROR!);</script>";
}

?>