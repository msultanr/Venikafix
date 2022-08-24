<?php
session_start();

include '../database/connection.php';

$id = $_SESSION['id'];

if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login.php';</script>";
    die();
}

if ($_SESSION['tipe'] != "user"){
    echo "<script>document.location.href='../index.php';</script>";
}
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
		
    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard_vendor.css">

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
                <a href="dashboard_user.php" class="nav-link">
                    <i class="fa-solid fa-user icon"></i>
                    Profil
                </a>
            </li>
            <li>
                <a href="favorit.php" class="nav-link">
                    <i class="fa-solid fa-heart icon"></i>
                    Favorit Saya
                </a>
            </li>
            <li>
                <a href="pesanan_user.php" class="active">
                    <i class="fa-solid fa-cart-shopping icon"></i>
                    Pesanan Saya
                </a>
            </li>
            <li>
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
				<ul class="fast_link_footer">
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
                                                        "SELECT photo From user WHERE id = '$id'");
                                                        while ($cek = mysqli_fetch_assoc($sql)){
                                                            $photo = $cek['photo'];
															if ($photo == NULL){
																echo '<img src="img/circle-user-solid.svg" class="profile-pic-div" alt="User-Profile-Image">';
																}
																else{
																echo '<img src="../photo/' . $photo . '" class="profile-pic-div" alt="User-Profile-Image">'; }} ?>
                                                            <?php echo' <span>' . $_SESSION['username'] . '</span>';?>
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    </a>
                                                    <ul class="show-notification profile-notification">
                                                        <li class="dashboard_user.php">
                                                            <a href="">
                                                                <i class="fas fa-user"></i> Lihat Profil
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="../faq.php">
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
					<h1>Pesanan Saya</h1>
					<ul class="breadcrumb">
						<li>
							<a href="pesanan_user.php">Detail Pesanan</a>
						</li>
						<li>
					</ul>
				</div>
			</div>

			<!-- Tabel Data Pesanan -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Permintaan Pesanan</h3>
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
								
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($koneksi,
							"SELECT * FROM booking WHERE id_user = '$id' AND status = '0'");
							while ($cek = mysqli_fetch_assoc($sql)){
							$nama = $cek['nama'];
							$no_hp = $cek['no_hp'];
							$tanggal = $cek['tanggal'];
							$jenis_layanan = $cek['jenis_layanan'];
							$paket = $cek['paket'];
							$status = $cek['status'];
							$note = $cek['note'];


							?>
							<tr>
								<td>
									<?php echo '<p>' . $nama . '</p>'; ?>
								</td>
								<?php echo '<td>' . $no_hp . '</td>';
								echo '<td>' . $tanggal . '</td>';
								echo '<td>' . $jenis_layanan . '</td>';
								echo '<td>' . $paket . '</td>'; ?>
								<td>
									<?php
									switch($status){
										case "0":
											echo '<span class="status pending">Pending</span>';
											break;
									} ?>
								</td>
								<?php echo '<td>' . $note . '</td>'; ?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

            <!-- Tabel Data Pesanan -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Riwayat Pesanan</h3>
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
								<th>Rating</th>
								<th>Komentar</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($koneksi,
							"SELECT * FROM booking,note WHERE id_user = '$id' AND booking.id = note.id_booking AND (status = '1' or status = '2')");
							while ($cek = mysqli_fetch_assoc($sql)){
								$nama = $cek['nama'];
								$no_hp = $cek['no_hp'];
								$tanggal = $cek['tanggal'];
								$jenis_layanan = $cek['jenis_layanan'];
								$paket = $cek['paket'];
								$status = $cek['status'];
								$note = $cek['note'];
								$id_booking = $cek['id_booking'];
								$komentar = $cek['komentar'];
								$rating = $cek['rating']



								?>
								<tr>
									<td>
										<?php echo '<p>' . $nama . '</p>'; ?>
									</td>
									<?php echo '<td>' . $no_hp . '</td>';
									echo '<td>' . $tanggal . '</td>';
									echo '<td>' . $jenis_layanan . '</td>';
									echo '<td>' . $paket . '</td>';
									 ?>
									<td>
										<?php
										switch($status){
											case "1":
												echo '<span class="status proses">Process</span>';
												break;
											case "2":
												echo '<span class="status selesai">Completed</span>';
												break;
											case "3":
												echo '<span class="status ditolak">Ditolak</span>';
												break;
										} ?>
									</td>
									<td style="text-align:center";>
									<?php echo $rating;?>
									<?php if(!isset($rating) && $status == '2'){?>
									<button type="button" class="beri-rating btn btn-outline-warning btn-icon-text btn_ubah"
										data-bs-toggle="modal" data-bs-target="#beriRating" data-id="<?php echo($id_booking)?>">
										Beri Nilai
									</button>
									<?php }?>

									<?php echo '<td>' . $komentar . '</td>';?>
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Pesanan Ditolak</h3>
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
								<th>Catatan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($koneksi,
							"SELECT * FROM booking,note WHERE id_user = '$id' AND booking.id = note.id_booking AND status = '3'");
							while ($cek = mysqli_fetch_assoc($sql)){
								$nama = $cek['nama'];
								$no_hp = $cek['no_hp'];
								$tanggal = $cek['tanggal'];
								$jenis_layanan = $cek['jenis_layanan'];
								$paket = $cek['paket'];
								$status = $cek['status'];
								$note = $cek['note'];
								$id_booking = $cek['id_booking'];


								?>
								<tr>
									<td>
										<?php echo '<p>' . $nama . '</p>'; ?>
									</td>
									<?php echo '<td>' . $no_hp . '</td>';
									echo '<td>' . $tanggal . '</td>';
									echo '<td>' . $jenis_layanan . '</td>';
									echo '<td>' . $paket . '</td>';
									 ?>
									<td>
										<?php
										switch($status){
											case "1":
												echo '<span class="status proses">Process</span>';
												break;
											case "2":
												echo '<span class="status selesai">Completed</span>';
												break;
											case "3":
												echo '<span class="status ditolak">Ditolak</span>';
												break;
										} ?>
									</td>
									<?php echo '<td>' . $note . '</td>';?>
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>

			</div>

			<!-- FORM MODAL -->
			<div class="modal fade" id="beriRating" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form class="needs-validation" action="rating.php" method="POST">
							<div class="container">
							<div class="rating-wrap">
								<!-- <h2>Star Rating</h2> -->
								<div class="center">
									<fieldset class="rating">
										<input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
										<input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
										<input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
										<input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
										<input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>
									</fieldset>
								</div>

								<h4 id="rating-value"></h4> <br>
								<input type="hidden" name="id_book" id="id_book">
								<textarea class="form-control" id="message-text" name="komentar" placeholder="Tulis Komentar.." cols="30" rows="5"></textarea>
							</div>
						</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn_tutup" data-bs-dismiss="modal">Batal</button>
							<button type="submit" name="submit" class="btn_tambah">Kirim</button>
						</div>

					</div>
					</form>
				</div>
			</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="js/rating.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/dashboard_vendor.js"></script>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		$(document).on("click", ".beri-rating", function () {
			var myBookId = $(this).data('id');
			$(".modal-body #id_book").val( myBookId );
			// As pointed out in comments,
			// it is unnecessary to have to manually call the modal.
			// $('#addBookDialog').modal('show');
		});
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
