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
    <link rel="stylesheet" href="css/dashboard_vendor.css">

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
                <a href="pengaturan.php" class="active">
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
  <body>
        <!-- MAIN -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Profil</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Profil</a>
                        </li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li>
                            <a class="active" href="dashboard_user.php">Edit Profil</a>
                        </li>
                    </ul>
                </div>
            </div>

            <form class="edit_foto" enctype="multipart/form-data" method="POST">
                <h3 class="head_profile">Pilih Foto Profil</h3>
            <div class="profile-pic-div" >
                <?php
                if ($photo == NULL) {
                    echo '<img src="img/circle-user-solid.svg" id="photo">';
                }
                else{
                echo '<img src="../photo/' . $photo . '" class="profile-pic-div"
                                                            alt="User-Profile-Image">'; }?>
                <input type="file" id="file" accept="image/*" id="photo" name="NamaFile">
                <label for="file" id="uploadBtn">
                    <i class="fa-solid fa-camera icon_btn"></i> <br>
                    Pilih Foto</label>
              </div>
              <input type="submit" value="Simpan" name="proses" class="btn_simpan">
</form>


    <?php
    if(isset($_POST["proses"])){
      $direktori = "../photo/";
      $file_name = $_FILES['NamaFile']['name'];
      move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori.$file_name);

      $sql = mysqli_query($koneksi,
    "UPDATE vendor SET photo = '$file_name' WHERE id = '$id'");
    if ($cek = mysqli_affected_rows($koneksi) > 0){
    //   mysqli_query($koneksi, "update into user set photo='$file_name'");
    //   mysqli_query($koneksi, "update user set photo='$file_name' where id='$_SESSION['id']'");
      echo "<b>File Berhasil Diupload";
      echo "<script>document.location.href='pengaturan.php';</script>";
    }
    else{
        echo "<b>ERROR!";
    }

    }
    ?>


              <script src="js/profil.js"></script>


            <!-- Form Edit -->

            <section class="order" id="order">

                <div class="heading">
                    <!-- <h2>Edit Profile</h2> -->
                    <!-- <h3>fast home delivery</h3> -->
                </div>

                <h3 class="head_profile">Informasi Akun</h3>

                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id = '$id'");
                $cek = mysqli_fetch_assoc($sql);
                $nama = $cek['nama'];
                $user = $cek['username'];
                $email = $cek['email'];
                $no_hp = $cek['no_hp'];
                $alamat = $cek['alamat'];
                $lokasi = $cek['kecamatan'];
                $deskripsi = $cek['deskripsi'];
                $instagram = $cek['instagram'];
                $website = $cek['website'];
                // $pass = $cek['password'];

                ?>
                <form action="update_vendor.php" method="POST">
                    <div class="box-container">
                        <div class="box">
                            <div class="inputBox">
                                <label for="validationCustom01">Nama Vendor</label>
                                <?php echo '<input type="text" name="nama" placeholder="" value="' . $nama . '" id="validationDefault01" required>'; ?>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom01">Username</label>
                                <?php echo '<input type="text" name="username" placeholder="" value="' . $user . '" id="validationDefault01" required>'; ?>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom01">Email</label>
                                <?php echo '<input type="text" name="email" placeholder="" value="' . $email . '"  id="validationDefault01" required>'; ?>
                            </div>
                            <div class="inputBox">
								<label for="">Tentang Vendor</label>
								<?php echo '<textarea name="deskripsi" value="" placeholder="Jelaskan Detail Tentang Vendor Anda..." id="" cols="30" rows="10">' . $deskripsi .'</textarea>'; ?>
								<div style="margin-top: -20px;">* Maksimal 500 Karakter</div>
							</div>


                        </div>
                        <div class="box">
                            <div class="inputBox">
                                <label for="validationCustom02">Nomor Telephone</label>
                                <?php echo '<input type="text" name="no_hp" placeholder="Nomor Telephone Kosong" value="' . $no_hp .'" id="validationDefault02" required>'; ?>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom02">Alamat</label>
                                <?php echo '<input type="text" name="alamat" placeholder="Alamat Kosong" value="' . $alamat . '" id="validationDefault02" required>'; ?>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom02">Lokasi</label>
                                <select name="lokasi" class="form-select" id="inputGroupSelect01">
                                <?php echo '<option selected class="option" value="'. $lokasi . '">'. $lokasi . '</option>'; ?>
                                <option class="option" value="Banyumanik">Banyumanik</option>
                                <option class="option" value="Candisari">Candisari</option>
                                <option class="option" value="Gajahmungkur">Gajahmungkur</option>
                                <option class="option" value="Gayamsari">Gayamsari</option>
                                <option class="option" value="Genuk">Genuk</option>
                                <option class="option" value="Gunung pati">Gunungpati</option>
                                <option class="option" value="Mijen">Mijen</option>
                                <option class="option" value="Ngaliyan">Ngaliyan</option>
                                <option class="option" value="Pedurungan">Pedurungan</option>
                                <option class="option" value="Semarang Barat">Semarang Barat</option>
                                <option class="option" value="Semarang Selatan">Semarang Selatan</option>
                                <option class="option" value="Semarang Tengah">Semarang Tengah</option>
                                <option class="option" value="Semarang Utara">Semarang Utara</option>
                                <option class="option" value="Tembalang">Tembalang</option>
                                <option class="option" value="Tugu">Tugu</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom02">Instagram</label>
                                <?php echo '<input type="text" name="instagram" placeholder="Akun Instagram" value="' . $instagram . '" id="validationDefault02" >'; ?>
                            </div>
                            <div class="inputBox">
                                <label for="validationCustom02">Website</label>
                                <?php echo '<input type="text" name="website" placeholder="Link Website" value="' . $website . '" id="validationDefault02" >'; ?>
                            </div>
                            <!-- <div class="inputBox">
                                <label for="validationCustom02">Password</label>
                                 echo '<input type="password" placeholder="" value=' . $pass' id="validationDefault02" required>';  -->
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Simpan" class="btn_simpan">
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