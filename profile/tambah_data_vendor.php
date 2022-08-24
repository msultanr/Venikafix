<?php
session_start();

include '../database/connection.php';

$id = $_SESSION['id'];

if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login_vendor.php';</script>";
    die();
}

if ($_SESSION['tipe'] != "vendor"){
    echo "<script>document.location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->

	<!-- CSS -->
	<link rel="stylesheet" href="css/dashboard_vendor1.css">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>

	<!-- ICON LOGO WEB -->
    <link rel="icon" href="../img/icon_venika.png" type="image/x-icon">

	<!-- TinyMCE -->
	<script src="tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		const table = '<p>This table uses features of the non-editable plugin to make the text in the<br><strong>top row</strong> and <strong>left column</strong> uneditable.</p>' +
			'    <table style="width: 60%; border-collapse: collapse;" border="1"> ' +
			'        <caption class="mceNonEditable">Ephox Sales Analysis</caption> ' +
			'       <tbody> ' +
			'          <tr class="mceNonEditable"> ' +
			'                <th style="width: 40%;">&nbsp;</th><th style="width: 15%;">Q1</th> ' +
			'                <th style="width: 15%;">Q2</th><th style="width: 15%;">Q3</th> ' +
			'                <th style="width: 15%;">Q4</th> ' +
			'            </tr> ' +
			'            <tr> ' +
			'                <td class="mceNonEditable">East Region</td> ' +
			'                <td>100</td> <td>110</td> <td>115</td> <td>130</td> ' +
			'            </tr> ' +
			'            <tr> ' +
			'                <td class="mceNonEditable">Central Region</td> ' +
			'                <td>100</td> <td>110</td> <td>115</td> <td>130</td> ' +
			'            </tr> ' +
			'            <tr> ' +
			'                <td class="mceNonEditable">West Region</td> ' +
			'                <td>100</td> <td>110</td> <td>115</td> <td>130</td> ' +
			'            </tr> ' +
			'        </tbody> ' +
			'    </table>';

		const table2 = '<div> ' +
			'        <p>' +
			'            Templates are a great way to help content authors get started creating content.  You can define the HTML for the template and ' +
			'            then when the author inserts the template they have a great start towards creating content! ' +
			'        </p> ' +
			'        <p> ' +
			'            In this example we create a simple table for providing product details for a product page on your web site.  The headings are ' +
			'            made non-editable by loading the non-editable plugin and placing the correct class on the appropriate table cells. ' +
			'        </p> ' +
			'        <table style="width:90%; border-collapse: collapse;" border="1"> ' +
			'        <tbody> ' +
			'        <tr style="height: 30px;"> ' +
			'            <th class="mceNonEditable" style="width:40%; text-align: left;">Product Name:</td><td style="width:60%;">{insert name here}</td> ' +
			'        </tr> ' +
			'        <tr style="height: 30px;"> ' +
			'            <th class="mceNonEditable" style="width:40%; text-align: left;">Product Description:</td><td style="width:60%;">{insert description here}</td> ' +
			'        </tr> ' +
			'        <tr style="height: 30px;"> ' +
			'            <th class="mceNonEditable" style="width:40%; text-align: left;">Product Price:</td><td style="width:60%;">{insert price here}</td> ' +
			'        </tr> ' +
			'        </tbody> ' +
			'        </table> ' +
			'    </div> ';

		const demoBaseConfig = {
			selector: 'textarea#classic',
			resize: false,
			autosave_ask_before_unload: false,
			powerpaste_allow_local_images: true,
			plugins: [
				'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
				'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
				'searchreplace', 'table', 'template', 'tinymcespellchecker', 'visualblocks', 'wordcount'
			],
			templates: [
				{
					title: 'Non-editable Example',
					description: 'Non-editable example.',
					content: table
				},
				{
					title: 'Simple Table Example',
					description: 'Simple Table example.',
					content: table2
				}
			],
			toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
			spellchecker_dialog: true,
			spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
			tinydrive_demo_files_url: '../_images/tiny-drive-demo/demo_files.json',
			tinydrive_token_provider: (success, failure) => {
				success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
			},
			content_style: 'body { font-family:Poppins,Arial,sans-serif; font-size:16px }'
		};

		tinymce.init(demoBaseConfig);
	</script>

	<title>Venika</title>
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.php" class="brand">
		    <i class="icon"><img src="img/venikasvgfix2.svg" width="30" height="30" class="" alt=""></i>
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
				<a href="tambah_data_vendor.php" class="active">
					<i class="fa-solid fa-folder-plus icon"></i>
					Data Vendor
					<i class="fa-solid fa-angle-right icon-right"></i>
				</a>
				<ul class="side-dropdown">
					<li><a href="kategori_layanan_vendor.php" class="dropdown_a"><i class="fa-solid fa-eye icon"></i> Lihat
							Data</a></li>
					<li><a href="tambah_data_vendor.php" class="active dropdown_a"><i
								class="fa-solid fa-file-circle-plus icon"></i> Tambah Data</a></li>
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
			<div class="wrapper">
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
					<h1>Tambah Data Layanan Vendor</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Data Vendor</a>
						</li>
						<li><i class="fa-solid fa-angle-right"></i></li>
						<li>
							<a class="active" href="tambah_data_vendor.php">Tambah Data</a>
						</li>
					</ul>
				</div>
			</div>

			<section class="order" id="order">

				<div class="heading">
					<!-- <h2>Form Pemesanan</h2> -->
					<!-- <h3>fast home delivery</h3> -->
				</div>

				<form action="tambah_layanan.php" enctype="multipart/form-data" method="POST">
					<div class="box-container">
						<div class="box">

							<div class="mb-3 inputBox">
								<label for="" class="form-label">Pilih Gambar Thumbnail</label>
								<input name="thumbnail" class="form-control" type="file" accept="image/*" id="photo">
							</div>
						</div>
					</div>
					<div class="box-container">
						<div class="box">
							<div class="inputBox">
								<label for="">Jenis Layanan</label>
								<select name="jenis_layanan" class="form-select" aria-label="Default select example">
									<option value="">Pilih Jenis Layanan</option>
									<option value="dekorasi">Dekorasi</option>
									<option value="fotovideo">Foto & Video</option>
									<option value="gaunpengantin">Gaun Pengantin</option>
									<option value="gedung">Gedung</option>
									<option value="katering">Katering</option>
									<option value="makeup">Makeup</option>
									<option value="mc">MC</option>
									<option value="musicband">Music Band</option>
									<option value="sewamobil">Sewa Mobil</option>
									<option value="soundsystem">Sound System</option>
									<option value="weddingorganizer">Wedding Organizer</option>
								</select>
							</div>
							<div class="inputBox">
								<label for="">Tentang Layanan</label>
								<textarea name="deskripsi" placeholder="Jelaskan Detail Tentang Layanan Anda..." id="classic" cols="30"
									rows="10"></textarea>
							</div>
							<div class="inputBox">
								<label for="">Fasilitas</label>
								<textarea name="fasilitas" placeholder="Masukkan Fasilitas Yang Disediakan..." id="classic" cols="30"
									rows="10"></textarea>
							</div>
							<div class="inputBox">
								<label for="">Produk/Jasa</label>
								<textarea name="variasi" placeholder="Masukkan Variasi/Produk/Jasa/Paket/Menu Yang Tersedia..."
									id="classic" cols="30" rows="10"></textarea>
							</div>

							<div class="inputBox">
								<label for="">Adat</label>
								<select name="adat" class="form-select" id="inputGroupSelect01">
									<option selected class="option" value="">Adat</option>
									<option class="option" value="Bali">Bali</option>
									<option class="option" value="Batak">Batak</option>
									<option class="option" value="Betawi">Betawi</option>
									<option class="option" value="Eropa">Eropa</option>
									<option class="option" value="Jawa">Jawa</option>
									<option class="option" value="Melayu">Melayu</option>
									<option class="option" value="Sunda">Sunda</option>
									<option class="option" value="Nusantara">Nusantara</option>
								</select>
							</div>
							<div class="mb-3 inputBox">
								<label for="" class="form-label">Pilih Gambar Galeri</label>
								<input name="galeri[]" class="form-control" type="file" accept="image/*" multiple>
							</div>
						</div>
					</div>
					<input type="submit" name="tambah" value="Simpan" class="btn_simpan">
				</form>

			</section>



		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/dashboard_vendor.js"></script>


</body>

</html>
