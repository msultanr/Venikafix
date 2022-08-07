<?php
session_start();

include '../database/connection.php';

if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login_vendor.php';</script>";
    die();
}

if ($_SESSION['tipe'] != 'vendor'){
	echo "<script>document.location.href='../index.php';</script>";
}

$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

	<!-- CSS -->
	<link rel="stylesheet" href="css/dashboard_vendor1.css">
	<!-- <link rel="stylesheet" href="css/style_nav_login.css"> -->

	<!-- Font Google -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>

	<!-- ICON LOGO WEB -->
    <link rel="icon" href="../img/icon_venika.png" type="image/x-icon">

	<title>Venika</title>
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.php" class="brand">
		<i class="icon"><img src="img/venikasvgfix2.svg" width="30" height="30"class="" alt=""></i>
			Venika
		</a>
		<ul class="side-menu">
			<li>
				<a href="dashboard_vendor.php" class="active">
					<i class="fa-solid fa-house-chimney icon"></i>
					Dashboard
				</a>
			</li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#">
					<i class="fa-solid fa-folder-plus icon"></i>
					Data Vendor
					<i class="fa-solid fa-angle-right icon-right"></i>
				</a>
				<ul class="side-dropdown">
					<li><a href="kategori_layanan_vendor.php"><i class="fa-solid fa-eye icon"></i> Lihat Data</a></li>
					<li><a href="tambah_data_vendor.php"><i class="fa-solid fa-file-circle-plus icon"></i> Tambah
							Data</a></li>
				</ul>
			</li>
			<li>
				<a href="data_pesanan.php" class="nav-link">
					<i class="fa-solid fa-cart-shopping icon"></i>
					Pesanan
					<i class="fa-solid fa-angle-right icon-right"></i>
				</a>
				<ul class="side-dropdown">
					<li><a href="req_pesanan.php"><i class="fa-solid fa-user-clock icon"></i> Permintaan Pesanan</a>
					</li>
					<li><a href="data_pesanan.php"><i class="fa-solid fa-clipboard-list icon"></i> Data Pesanan</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="pengaturan.php" class="nav-link">
					<i class="fa-solid fa-gear icon"></i>
					Pengaturan
				</a>
			</li>
			<li>
				<a href="../login/logout.php" class="nav-link">
					<i class="fa-solid fa-right-from-bracket icon"></i>
					Keluar
				</a>
			</li>
		</ul>

		<!-- Footer -->
		<div class="ads">
			<div class="wrapper footer_dashboard_user">
				<ul class="fast_link">
                    <a href="../tentang_kami.php?#kategori" style="color: #fff;"><li>Kontak</li></a>
                    <a href="../#kategori" style="color: #fff;"><li>Vendor</li></a>
                    <a href="../tentang_kami.php" style="color: #fff;"><li>Tentang Kami</li></a>
                    <a href="../faq.php" style="color: #fff;"><li>FAQ</li></a>
				</ul>

				<p>Copyright &copy;2022 Venika | designed by <span>Venika</span></p>
			</div>
		</div>
	</section>

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<!-- <nav>
			<i class="fa-solid fa-bars toggle-sidebar"></i>

			<form action="#">

			</form>

			<span class="divider"></span>

			<div class="profile">
				<div>
				<a href="#!" class="profile-dropdown">
					<img src="img/bg.jpg" alt="">
					<span>Rosma Asiyya</span>
					<i class="fa-solid fa-angle-down icon"></i>
				</a>
			</div>

				<ul class="profile-link">
					<li><a href="#"><i class="fas fa-user"></i> Lihat Profil</a></li>
					<li><a href="#"><i class="fas fa-question"></i> FAQ</a></li>
					<li><a href="#"><i class="fas fa-arrow-right-from-bracket"></i> Keluar</a></li>
				</ul>
			</div>
		</nav> -->
		<!-- NAVBAR -->

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<i class="fa-solid fa-bars toggle-sidebar"></i>
			<div class="container">
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mx-auto">

					</ul>
					<div>
						<div id="pcoded" class="pcoded">
							<div class="pcoded-overlay-box"></div>
							<div class="pcoded-container navbar-wrapper">
								<nav class="navbar header-navbar pcoded-header">
									<div class="navbar-wrapper">

										<div class="navbar-container container-fluid">
											<ul class="nav-right">
												<li class="user-profile header-notification">
												<a href="#!" class="arrowdown">
                                                        <?php
                                                        $sql = mysqli_query($koneksi,
                                                        "SELECT photo From vendor WHERE id = '$id'");
                                                        while ($cek = mysqli_fetch_assoc($sql)){
                                                            $photo = $cek['photo'];

                                                            if ($photo == NULL){
                                                                echo '<img src="img/circle-user-solid.svg" class="img-radius">';
                                                            }
                                                            else{
                                                                echo '<img src="../photo/' . $photo . '" class="img-radius"
                                                            alt="User-Profile-Image">';}
                                                            }
                                                        ?>
                                                            <?php echo' <span>' . $_SESSION['username'] . '</span>';?>
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    </a>
                                                    <ul class="show-notification profile-notification">
                                                        <li class="">
                                                            <a href="#!">
                                                                <i class="fas fa-user"></i> Lihat Profil
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#">
                                                                <i class="fas fa-question"></i> FAQ
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="../login/logout.php">
                                                                <i class="fas fa-arrow-right-from-bracket"></i> Keluar
                                                            </a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</nav>
							</div>
						</div>
						<script src="js/script.js"></script>
						<script type="text/javascript" src="js/jquery.min.js"></script>

						<script src="js/pcoded.min.js"></script>
						<script src="js/vertical-layout.min.js"></script>
						<script type="text/javascript" src="js/user_profile.js"></script>
					</div>
				</div>
			</div>
		</nav>


		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class="fa-solid fa-angle-right"></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<?php
				$sql = mysqli_query($koneksi,
				"SELECT COUNT(DISTINCT id_user) AS jumlah FROM booking where id_vendor = '$id'");
				$cek = mysqli_fetch_assoc($sql);
			?>
			<ul class="box-info">
				<li>
					<i class="fa-solid fa-users"></i>
					<span class="text">
						<?php echo "<h3>" . $cek['jumlah'] . "</h3>"; ?>
						<p>Total Pelanggan</p>
					</span>
				</li>
				<?php
				$sql = mysqli_query($koneksi,
				"SELECT COUNT(id) AS jumlah2 FROM booking where id_vendor = '$id'");
				$cek = mysqli_fetch_assoc($sql);
				?>
				<li>
					<i class="fa-solid fa-calendar-check"></i>
					<span class="text">
						<?php echo "<h3>" . $cek['jumlah2'] . "</h3>" ?>
						<p>Total Pesanan</p>
					</span>
				</li>
				<li>
					<?php
					$sql = mysqli_query($koneksi,
					"SELECT COUNT(id) AS jumlah3 from booking where id_vendor = '$id' AND status = '0'");
					$cek = mysqli_fetch_assoc($sql);
					?>
					<i class="fa-solid fa-cart-arrow-down"></i>
					<span class="text">
						<?php echo '<h3>' . $cek['jumlah3'] . '</h3>'; ?>
						<p>Permintaan Pesanan</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Pesanan Terbaru</h3>
						<!-- <i class="fa-solid fa-magnifying-glass"></i> -->
					</div>
					<table>
						<thead>
							<tr>
								<th>Nama</th>
								<th>No. HP</th>
								<th>Tanggal Order</th>
								<th>Jenis Layanan</th>
								<th>Paket</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($koneksi,
							"SELECT * FROM booking WHERE id_vendor = '$id' ORDER BY tanggal LIMIT 5");
							while ($cek = mysqli_fetch_assoc($sql)){
								$nama = $cek["nama"];
								$no_hp = $cek['no_hp'];
								$tanggal = $cek["tanggal"];
								$jenis_layanan = $cek["jenis_layanan"];
								$paket = $cek["paket"];
								$status = $cek["status"];

							?>
							<tr>
								<td>
									<!-- <img src="img/people.png"> -->
									<?php echo "<p>". $nama . "</p>"; ?>
								</td>
								<?php echo "<td>" . $no_hp . "</td>"; ?>
								<?php echo "<td>" . $tanggal . "</td>"; ?>
								<?php echo "<td>" . $jenis_layanan . "</td>"; ?>
								<?php echo "<td>" . $paket . "</td>"; ?>
								<td>
								<?php switch($status){
									case "0":
										echo '<span class="status pending">Pending</span>';
										break;
									case "1":
										echo '<span class="status proses">Proses</span>';
										break;
									case "2":
										echo '<span class="status selesai">Selesai</span>';
										break;
									case "3":
										echo '<span class="status ditolak">Ditolak</span>';
								} ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class="fa-solid fa-plus"></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class="fa-solid fa-ellipsis"></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class="fa-solid fa-ellipsis"></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class="fa-solid fa-ellipsis"></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class="fa-solid fa-ellipsis"></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class="fa-solid fa-ellipsis"></i>
						</li>
					</ul>
				</div> -->
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/dashboard_vendor.js"></script>

</body>

</html>