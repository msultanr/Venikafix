<?php

session_start();

include '../database/connection.php';

if(isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
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

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard_vendor2.css">
    <!-- <link rel="stylesheet" href="css/list_vendor.css"> -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>


    <title>Venika</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../" class="brand">
            <i class="fa-brands fa-slack icon"></i>
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
                <a href="favorit.php" class="active">
                    <i class="fa-solid fa-heart icon"></i>
                    Favorit Saya
                </a>
            </li>
            <li>
                <a href="pesanan_user.php" class="nav-link">
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
					<li>Kontak</li>
					<li>Vendor</li>
					<li>Tentang Kami</li>
					<li>FAQ</li>
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
                                                            if($_SESSION['tipe'] == 'user'){
                                                                $sql = mysqli_query($koneksi,
                                                                "SELECT photo From user WHERE id = '$id'");
                                                                while ($cek = mysqli_fetch_assoc($sql)){
                                                                    $photo = $cek['photo'];
                                                                    if ($photo == NULL){
                                                                        echo '<img src="img/circle-user-solid.svg" class="profile-pic-div" alt="User-Profile-Image">';
                                                                        }
                                                                        else{
                                                                        echo '<img src="../photo/' . $photo . '" class="profile-pic-div" alt="User-Profile-Image">'; }}}
                                                            if($_SESSION['tipe'] == 'vendor'){
                                                            $sql = mysqli_query($koneksi,
                                                                "SELECT photo From vendor WHERE id = '$id'");
                                                                while ($cek = mysqli_fetch_assoc($sql)){
                                                                    $photo = $cek['photo'];
                                                                    if ($photo == NULL){
                                                                        echo '<img src="img/circle-user-solid.svg" class="profile-pic-div" alt="User-Profile-Image">';
                                                                        }
                                                                        else{
                                                                        echo '<img src="../photo/' . $photo . '" class="profile-pic-div" alt="User-Profile-Image">'; }}
                                                            } ?>
                                                            <?php echo' <span>' . $_SESSION['username'] . '</span> ';?>
                                                            <i class="fas fa-angle-down toggle"></i>
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
                    <h1>Favorit Saya</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Produk Favorit Saya</a>
                        </li>
                    </ul>
                </div>
            </div>



            <!-- KATERING SECTION -->
            <section id="katering">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                    <div class="row">
                    <?php
                  $sql = mysqli_query($koneksi,
                  "SELECT distinct vendor.nama, vendor.id, jenis_layanan.id as id_jenis, vendor.kecamatan, jenis_layanan.nama_layanan, jenis_layanan.galeri
                  from vendor, favorit, jenis_layanan where favorit.id_user = '$id' and favorit.id_vendor = vendor.id
                  and favorit.id_jenis = jenis_layanan.id");
                  while ($cek = mysqli_fetch_assoc($sql)){
                    $nama = $cek["nama"];
                    $kecamatan = $cek["kecamatan"];
                    $jenis_layanan = $cek["nama_layanan"];
                    $id = $cek["id"];
                    $galeri = $cek["galeri"];
                    $id_jenis = $cek["id_jenis"];

                  ?>

                        <div class="col-4">
                            <div class="card">
                                <?php echo '<img src="../thumbnail/' . $galeri . '" alt="">'; ?>
                                <div class="card-body">
                                    <?php echo '<h4>' . $nama . '</h4>'; ?>
                                    <?php echo '<p>' . $kecamatan . ', Semarang';?> <br> <span class="text-danger"> </span></p>
                                    <i class="fas fa-heart love"></i>
                                    <?php echo '<a href="../vendor/detail.php?' . $id . '?' . $id_jenis . '" class="stretched-link"></a>'; ?>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    </div>
                </div>
            </section>



        </main>
        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->


    <!-- <script src="js/gallery.js"></script> -->
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
</body>

</html>