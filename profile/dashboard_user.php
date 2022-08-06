<?php
// Mulai session
session_start();

// Panggil file config
include '../database/connection.php';

if(isset($_SESSION['username'])){
$id = $_SESSION['id'];
}
if ($_SESSION['tipe'] != "user"){
    echo "<script>document.location.href='../index.php';</script>";
}
// $_SESSION["id"] = 1; // User's session
// $sessionId = $_SESSION["id"];
// $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard_vendor1.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>

    <title>Venika</title>
</head>
<?php
if (isset($_SESSION['username'])){
?>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="../index.php" class="brand">
            <i class="fa-brands fa-slack icon"></i>
            Venika
        </a>
        <ul class="side-menu">
            <li>
                <a href="dashboard_user.php" class="active">
                    <i class="fa-solid fa-user icon"></i>
                    Profil
                </a>
            </li>
            <li>
                <a href="favorit.php">
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
				<ul class="fast_link">
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

                                                        ?>
                                                        <?php
                                                        if ($photo == NULL){
                                                            echo '<img src="img/circle-user-solid.svg" class="img-radius"
                                                            alt="User-Profile-Image">';
                                                        }
                                                        else{
                                                        echo '<img src="../photo/' . $photo . '" class="img-radius"
                                                            alt="User-Profile-Image">';}} ?>
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
        <?php }
  else {
  ?>
  <body>
  <?php
  }
?>

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
                // $id = $user["id"];
                // $nama = $user["nama"];
                // $email = $user["email"];
                // $no_hp = $user["no_hp"];
                // $username = $user["username"];
                // $password = $user["password"];
                // $photo = $user["photo"];
            ?>
                <?php
                if ($photo == NULL){
                echo '<img src="img/circle-user-solid.svg" class="profile-pic-div"
                                                            alt="User-Profile-Image">';
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
    //   $id = $_POST["id"];
    //   $nama = $_POST["nama"];
    //   $email = $_POST["email"];
    //   $no_hp = $_POST["no_hp"];
    //   $username = $_POST["username"];
    //   $password = $_POST["password"];

      $direktori = "../photo/";
      $file_name = $_FILES['NamaFile']['name'];
      move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori.$file_name);

      $sql = mysqli_query($koneksi,
    "UPDATE user SET photo = '$file_name' WHERE id = '$id'");
    if ($cek = mysqli_affected_rows($koneksi) > 0){
    //   mysqli_query($koneksi, "update into user set photo='$file_name'");
    //   mysqli_query($koneksi, "update user set photo='$file_name' where id='$_SESSION['id']'");
      echo "<b>File Berhasil Diupload";
      echo "<script>document.location.href='dashboard_user.php';</script>";
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
                $sql = mysqli_query($koneksi,
                "SELECT * FROM user where id = '$id'");
                $cek = mysqli_fetch_assoc($sql);
                $nama = $cek['nama'];
                $user = $cek['username'];
                $email = $cek['email'];
                $no_hp = $cek['no_hp'];
                ?>
                <form action="update_user.php" method="POST">
                    <div class="box-container">
                        <div class="box">
                            <div class="inputBox">
                                <label for="validationCustom01">Nama Lengkap</label>
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

                        </div>
                        <div class="box">
                            <div class="inputBox">
                                <label for="validationCustom02">Nomor Telephone</label>
                                <?php echo '<input type="text" name="no_hp" placeholder="" value="' . $no_hp .'" id="validationDefault02" required>'; ?>
                            </div>
                            <!-- <div class="inputBox">
                                <label for="validationCustom02">Password</label>
                                <input type="password" placeholder="" value="asiyya123" id="validationDefault02" required>
                            </div> -->
                        </div>
                    </div>
                    <input type="submit" value="Simpan" name ="submit" class="btn_simpan">
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