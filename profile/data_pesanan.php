<?php
session_start();

include '../database/connection.php';

$id = $_SESSION['id'];
echo $id;

if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login_vendor.php';</script>";
    die();
}
$user = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font Google -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


	<!-- CSS -->
	<link rel="stylesheet" href="css/dashboard_vendor1.css">

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
				<a href="dashboard_vendor.php" class="nav-link">
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
				<a href="data_pesanan.php" class="active">
					<i class="fa-solid fa-cart-shopping icon"></i>
					Pesanan
					<i class="fa-solid fa-angle-right icon-right"></i>
				</a>
				<ul class="side-dropdown">
					<li><a href="req_pesanan.php"><i class="fa-solid fa-user-clock icon"></i> Permintaan Pesanan</a>
					</li>
					<li><a href="data_pesanan.php" class="active"><i class="fa-solid fa-clipboard-list icon"></i> Data Pesanan</a>
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

		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<i class="fa-solid fa-bars toggle-sidebar bar"></i>
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
											<ul class="nav-rightt">
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
					<h1>Data Pesanan</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Pesanan</a>
						</li>
						<li><i class="fa-solid fa-angle-right"></i></li>
						<li>
							<a class="active" href="data_pesanan.php">Data Pesanan</a>
						</li>
					</ul>
				</div>

				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<!-- Tabel Data Pesanan -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Pesanan</h3>
						<!-- <i class="fa-solid fa-magnifying-glass"></i> -->
					</div>
					<table>
						<thead>
							<tr>
								<th>Nama</th>
								<th>Telephone</th>
								<th>Tgl Booking</th>
								<th>Layanan</th>
								<th>Produk/Jasa</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<form action="update_status.php" method="POST">
						<?php
							// $id = $_SESSION['id'];
							$sql = mysqli_query($koneksi,
							"SELECT * FROM booking WHERE id_vendor = '$id' and (status='1' or status='2') order by status asc");
							while ($cek = mysqli_fetch_assoc($sql)){
								$nama = $cek["nama"];
								$no_hp = $cek["no_hp"];
								$tanggal = $cek["tanggal"];
								$jenis_layanan = $cek["jenis_layanan"];
								$paket = $cek["paket"];
								$id_booking = $cek["id"];
								$id_user = $cek["id_user"];
								$id_vendor = $cek["id_vendor"];
								$status = $cek["status"];
							?>
							<tr>
								<td>
									<!-- <img src="img/people.png"> -->
									<?php
								echo "<p name='id_booking' value=" . $id_booking .">" . $id_booking ."</p>";
								echo "<p name='nama' value=" . $nama .">" . $nama ."</p>";
								echo "</td>";
								echo "<td name='no_hp' value=" . $no_hp .">" . $no_hp . "</td>";
								echo "<td name='tanggal' value=" . $tanggal .">" . $tanggal . "</td>";
								echo "<td name='jenis_layanan' value=" . $jenis_layanan .">" . $jenis_layanan . "</td>";
								echo "<td name='paket' value=" . $paket .">" . $paket . "</td>";
								echo "<td>";

								switch($status){
									case "1":
										echo '<span class="status proses">Proses</span>';
										break;
									case "2":
										echo '<span class="status selesai">Selesai</span>';
										break;
								}
								echo '</td>';
								echo '<input type="hidden" name="id_booking" value=' . $id_booking . ' class="btn solid">';
								?>
								<td>
									<button type="button" class="ubah-status btn btn-outline-warning btn-icon-text btn_ubah"
										data-bs-toggle="modal" data-bs-target="#ubahStatus" data-id="<?php echo($id_booking)?>">
										<i class="fa-solid fa-pen-to-square"></i> Ubah
									</button>
								</td>
							</tr>
							<?php } ?>
							</form>
						</tbody>
					</table>
				</div>

			</div>

			<!-- FORM MODAL -->
			<div class="modal fade" id="ubahStatus" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status Pesanan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form class="needs-validation" action="update_status.php" method="POST">
								<div class="mb-3">
									<input type="hidden" name="id_book" id="id_book">
									<label for="recipient-name" class="col-form-label">Status</label>
									<select name="status" class="form-select" aria-label="Default select example"
										id="validationDefault03" required>
										<!-- <option value="">---Status---</option> -->
										<option value="1">Proses</option>
										<option value="2">Selesai</option>
									</select>
								</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn_tutup" data-bs-dismiss="modal">Batal</button>
							<button type="submit" name="submit" class="btn_tambah"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
						</div>

					</div>
					</form>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/dashboard_vendor.js"></script>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		$(document).on("click", ".ubah-status", function () {
			var myBookId = $(this).data('id');
			$(".modal-body #id_book").val( myBookId );
			// As pointed out in comments,
			// it is unnecessary to have to manually call the modal.
			// $('#addBookDialog').modal('show');
		});
	</script>
</body>

</html>