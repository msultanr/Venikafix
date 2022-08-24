<?php
  session_start();

  include '../database/connection.php';
  if (!isset($_SESSION['is_login'])) {
    echo "<script> alert('Login Terlebih Dahulu!')</script>";
    echo "<script>document.location.href='../login.php';</script>";
    die();
}
$id = $_SESSION['id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/list_vendor.css">
    <link rel="stylesheet" href="css/style_nav_login.css">

    <!-- ICON LOGO WEB -->
    <link rel="icon" href="img/icon_venika.png" type="image/x-icon">

    <!-- Style Responsive -->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <script
      src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>

    <!-- Swiper CSS -->
    <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css"> -->

    <!-- Style Swiper CSS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <title>Venika</title>
  </head>
  <?php
if (isset($_SESSION['username'])){
?>
  <body>
  <!-- Navbar Login -->
  <nav class="navbar navbar-expand-lg bg-transparent navbar-light position-fixed w-100">
    <div class="container">
    <a class="navbar-brand" href="../index.php" style="color: #FF7171;">
        <img src="../profile/img/venikasvgfix2.svg" alt="" width="30" height="30"
          class="d-inline-block align-text-top" me-3>Venika</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="../">Beranda</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="../#kategori">Vendor</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="../tentang_kami.php">Tentang Kami</a>
          </li>
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
                        <ul class="show-notification profile-notification">
                          <li class="">
                            <?php
                            if($_SESSION['tipe'] == "user"){
                            ?>
                            <a href="../profile/dashboard_user.php">
                              <i class="fas fa-user"></i> Lihat Profil
                            </a>
                            <?php }
                            else{?>
                            <a href="../profile/dashboard_vendor.php">
                              <i class="fas fa-user"></i> Lihat Profil
                            </a>
                            <?php }?>
                          </li>
                          <li class="">
                            <a href="../faq.php">
                              <i class="fas fa-question"></i> FAQ
                            </a>
                          </li>
                          <li class="">
                            <a href="../logout.php">
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

          <script type="text/javascript" src="js/jquery.min.js"></script>


          <script src="js/pcoded.min.js"></script>
          <script src="js/vertical-layout.min.js"></script>
          <script type="text/javascript" src="js/user_profile.js"></script>

        </div>
      </div>
    </div>
  </nav>
  <?php }
  else {
  ?>
  <body>
  <!-- Navbar sebelum Login -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent position-fixed w-100">
    <div class="container">

    <a class="navbar-brand" href="../index.php" style="color: #FF7171;">
        <img src="../profile/img/venikasvgfix2.svg" alt="" width="30" height="30"
          class="d-inline-block align-text-top" me-3>Venika</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

          <li class="nav-item mx-3">

            <a class="nav-link active" aria-current="page" href="../">Beranda</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="katering.php">Vendor</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="../tentang_kami.php">Tentang Kami</a>
          </li>
        </ul>

        <div>

        <a href="login.php"><button class="btn_register">Register</button></a>
          <a href="login.php"><button class="btn_login">Login</button></a>
        </div>
      </div>
    </div>
  </nav>

<?php
  }
?>

    <!-- HERO SECTION -->
    <section id="hero">
        <!-- h-100 : height agar memenuhi layar -->
        <div class="container" h-100>
            <div class="row" h-100>
                <div class="col-md-6 hero-tagline my-auto">
                    <img src="img/bg_mc.jpg" alt="" class="position-absolute end-0 bottom-0 img-hero">
                    <h1>Master Of Ceremony Untuk Hari Spesial</h1>
                    <p>Temukan MC terbaik disini...</p>
                    <button class="btn_cari_sekarang">Cari sekarang...</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->

  <section id="search">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>VENDOR</h2>
        </div>
      </div>

      <form action="../hasil.php" method="GET">
      <div class="col-10 mx-auto rectangle">
        <div class="row">
          <div class="col-auto">
            <input value="" type="text" class="form-control" name="nama_vendor" placeholder="Cari vendor..." aria-label="Cari vendor">
          </div>

          <!-- <div class="col-auto">
                <button class="btn_dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Dekorasi</a></li>
                  <li><a class="dropdown-item" href="#">Katering</a></li>
                  <li><a class="dropdown-item" href="#">Makeup</a></li>
                  <li><a class="dropdown-item" href="#">Sound System</a></li>
                  <li><a class="dropdown-item" href="#">Gedung</a></li>
                  <li><a class="dropdown-item" href="#">Foto & Video</a></li>
                  <li><a class="dropdown-item" href="#">Sewa Mobil</a></li>
                  <li><a class="dropdown-item" href="#">Gaun Pengantin</a></li>
                </ul>
              </div> -->

          <!-- Filter Jenis Layanan -->
          <div class="col-auto filter_jenis layanan">
            <select name="jenis_layanan" class="form-select" id="inputGroupSelect01">
              <option selected class="option" value="">Jenis Layanan</option>
              <option class="option" value="dekorasi">Dekorasi</option>
              <option class="option" value="katering">Katering</option>
              <option class="option" value="makeup">Makeup</option>
              <option class="option" value="soundsystem">Sound System</option>
              <option class="option" value="musicband">Music Band</option>
              <option class="option" value="gedung">Gedung</option>
              <option class="option" value="fotoVideo">Foto & Video</option>
              <option class="option" value="sewaMobil">Sewa Mobil</option>
              <option class="option" value="gaunpengantin">Gaun Pengantin</option>
              <option class="option" value="mc">MC</option>
              <option class="option" value="weddingorganizer">Wedding Organizer</option>
            </select>
          </div>

          <!-- Filter Lokasi -->
          <div class="col-auto ">
            <select name="lokasi" class="form-select" id="inputGroupSelect01">
              <option selected class="option" value="">Lokasi</option>
              <option class="option" value="Banyumanik">Banyumanik</option>
              <option class="option" value="Candisari">Candisari</option>
              <option class="option" value="Gajahmungkur">Gajahmungkur</option>
              <option class="option" value="Gayamsari">Gayamsari</option>
              <option class="option" value="Genuk">Genuk</option>
              <option class="option" value="Gunungpati">Gunungpati</option>
              <option class="option" value="Mijen">Mijen</option>
              <option class="option" value="Ngaliyan">Ngaliyan</option>
              <option class="option" value="Pedurungan">Pedurungan</option>
              <option class="option" value="SemarangBarat">Semarang Barat</option>
              <option class="option" value="SemarangSelatan">Semarang Selatan</option>
              <option class="option" value="Semarang Tengah">Semarang Tengah</option>
              <option class="option" value="SemarangUtara">Semarang Utara</option>
              <option class="option" value="Tembalang">Tembalang</option>
              <option class="option" value="Tugu">Tugu</option>
<option class="option" value="Ambarawa">Ambarawa</option>
<option class="option" value="Bancak">Bancak</option>
<option class="option" value="Bandungan">Bandungan</option>
<option class="option" value="Banyubiru">Banyubiru</option>
<option class="option" value="Bawen">Bawen</option>
<option class="option" value="Bergas">Bergas</option>
<option class="option" value="Bringin">Bringin</option>
<option class="option" value="Getasan">Getasan</option>
<option class="option" value="Jambu">Jambu</option>
<option class="option" value="Kaliwungu">Kaliwungu</option>
<option class="option" value="Pabelan">Pabelan</option>
<option class="option" value="Pringapus">Pringapus</option>
<option class="option" value="Suruh">Suruh</option>
<option class="option" value="Susukan">Susukan</option>
<option class="option" value="Sumowono">Sumowono</option>
<option class="option" value="Tengaran">Tengaran</option>
<option class="option" value="Tuntang">Tuntang</option>
<option class="option" value="UngaranBarat">Ungaran Barat</option>
<option class="option" value="UngaranTimur">Ungaran Timur</option>
            </select>
          </div>

          <!-- Filter Adat -->
          <div class="col-auto filter_adat">
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

          <!-- Button Cari -->
          <div class="col-auto">
            <button name="search" class="btn_search" type="submit" id="button-addon2">Cari</button>
          </div>
        </div>
      </div>
      </form>

    </div>
  </section>

    <!-- MC SECTION -->
    <section id="MC">
          <div class="container">
              <div class="row">
                <?php
                  $sql = mysqli_query($koneksi,
                  "SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
                  FROM vendor, jenis_layanan WHERE jenis_layanan.nama_layanan = 'mc'
                  AND vendor.id = jenis_layanan.id_vendor");
                  while ($cek = mysqli_fetch_assoc($sql)){
                    $nama = $cek["nama"];
                    $kecamatan = $cek["kecamatan"];
                    $jenis_layanan = $cek["nama_layanan"];
                    $id = $cek["id"];
                    $galeri = $cek["galeri"];
                    $id_jenis = $cek["id_jenis"];
                    $kecamatan = preg_replace('/(?<!\ )[A-Z]/', ' $0', $kecamatan);

                  ?>
                    <div class="col-4">
                        <div class="card">
                        <?php echo '<img src="../thumbnail/' . $galeri . '"alt="" id="photo">' ?>
                            <div class="card-body">
                                <?php echo '<h4>'. $nama .'</h4>';
                                echo '<p>' . $kecamatan . ', Semarang</p>';?>
                                <!-- <img src="img/love.png" alt=""> -->
                                <?php 
                $sql2 = mysqli_query($koneksi,
                "SELECT FORMAT(avg(rating),1) as rating, FORMAT(count(rating)/2,0) as jumlah_rating FROM booking, jenis_layanan
                WHERE rating IS NOT NULL AND booking.id_vendor = '$id' AND booking.jenis_layanan = jenis_layanan.nama_layanan AND booking.jenis_layanan = 'mc'");
                $cekk = mysqli_fetch_assoc($sql2);
                $rating = $cekk['rating'];
                $jumlah_rating = $cekk['jumlah_rating'];
                if(isset($rating)){
                  switch($rating){
                    case '0.1':
                    case '0.2':
                    case '0.3':
                    case '0.4':
                        ?>
                      <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                      </div>
                    <?php
                      break;
                    case '0.5':
                    case '0.6':
                    case '0.7':
                    case '0.8':
                    case '0.9':
                        ?>
                      <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                      <i class = "fas fa-star-half-alt checked"></i>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <span class = "fas fa-star"></span>
                      <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                      </div>
                    <?php
                      break;
                    case '1':
                    case '1.1':
                    case '1.2':
                    case '1.3':
                    case '1.4':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '1.5':
                  case '1.6':
                  case '1.7':
                  case '1.8':
                  case '1.9':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star-halt-alt checked"></i>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                    case '2':
                    case '2.1':
                    case '2.2':
                    case '2.3':
                    case '2.4':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '2.5':
                  case '2.6':
                  case '2.7':
                  case '2.8':
                  case '2.9':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star-half-alt checked"></i>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '3':
                  case '3.1':
                  case '3.2':
                  case '3.3':
                  case '3.4':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <span class = "fas fa-star"></span>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '3.5':
                  case '3.6':
                  case '3.7':
                  case '3.8':
                  case '3.9':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star-half-alt checked"></i>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '4':
                  case '4.1':
                  case '4.2':
                  case '4.3':
                  case '4.4':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '4.5':
                  case '4.6':
                  case '4.7':
                  case '4.8':
                  case '4.9':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star-half-alt checked"></i>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case '5':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <i class = "fas fa-star checked"></i>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  case 'NULL':
                      ?>
                    <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <i class = "fas fa-star"></i>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                  <?php
                    break;
                  }
                }
                else{ ?>
                  <div class = "detail-rating product-rating" data-bs-toggle="modal" data-bs-target="#lihatRating" data-id="<?php echo($id_vendor)?>" data-id2="<?php echo($id_jenis)?>">
                  <span class = "fas fa-star"></span>
                  <span class = "fas fa-star"></span>
                  <span class = "fas fa-star"></span>
                  <span class = "fas fa-star"></span>
                  <span class = "fas fa-star"></span>
                    <?php echo '<span>' . $rating . '(' . $jumlah_rating . ')</span>'; ?>
                    </div>
                <?php }
                  ?>
                                <!-- <img src="img/love.png" alt=""> -->

                                <?php echo'<a href="detail.php?' . $id .'?' . $id_jenis . '" class="stretched-link"></a>';?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
              </div>
          </div>
      </section>



    <!-- FOOTER SECTION -->
    <footer class="bg">
        <div class="footer-content">
            <h3>Venika</h3>
            <p>Venika adalah platform digital yang menyediakan layanan informasi vendor kebutuhan di daerah Semarang dan
                sekitarnya.</p>
            <ul class="fast_link">
              <a href="../tentang_kami.php?#kategori" style="color: #fff;"><li>Kontak</li></a>
              <a href="../#kategori" style="color: #fff;"><li>Vendor</li></a>
              <a href="../tentang_kami.php" style="color: #fff;"><li>Tentang Kami</li></a>
              <a href="../faq.php" style="color: #fff;"><li>FAQ</li></a>
            </ul>
            <ul class="sosmed">
                <li><a href="#"><img src="img/facebook-circle-fill.png"></a></li>
                <li><a href="https://www.instagram.com/venika.id/"><img src="img/instagram-fill.png"></a></li>
                <li><a href="#"><img src="img/twitter-fill.png"></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;2022 Venika | designed by <span>Venika</span></p>
        </div>
    </footer>
    <!-- JavaScript -->
    <script src="js/script.js"></script>

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
