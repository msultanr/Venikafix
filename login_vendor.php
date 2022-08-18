<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <!-- <script
      src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script> -->
    <script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>
    <title>Venika</title>
    <link rel="stylesheet" href="css/style.css">

      <!-- ICON LOGO WEB -->
     <link rel="icon" href="img/icon_venika.png" type="image/x-icon">

    <!--===== Boxicons CSS =====-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login/code_login_vendor.php" method="POST" class="sign-in-form">

                    <h2 class="title">Vendor Login</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text"
                        name="username"
                        placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password"
                        name="password"
                        placeholder="Password">
                    </div>

                    <input type="submit" name="login" value="login" class="btn solid">
                </form>

                <form action="login/register_vendor.php" method="POST" class="sign-up-form">
                    <h2 class="title">Vendor Register</h2>
                    <div class="input-field">
                        <i class="fas fa-solid fas fa-users"></i>
                        <input type="text" name="reg_nama" placeholder="Nama Vendor">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="reg_user" placeholder="Username">
                    </div>

                    <!-- <div class="item form-group select-menu">

                        <div class="col-md-6 col-sm-6 sel input-field">
                            <i class="fas fa-list"></i>
                            <select name="reg_layanan" class=" select-btn">
                                <i class="fas fa-list"></i>

                                <option value="">Pilih Jenis Layanan</option>
                                <option value="Dekorasi">Dekorasi</option>
                                <option value="Foto & Video">Foto & Video</option>
                                <option value="Gaun Pengantin">Gaun Pengantin</option>
                                <option value="Gedung">Gedung</option>
                                <option value="Katering">Katering</option>
                                <option value="Makeup">Makeup</option>
                                <option value="MC">MC</option>
                                <option value="Music Band">Music Band</option>
                                <option value="Sewa Mobil">Sewa Mobil</option>
                                <option value="Sound System">Sound System</option>
                            </select>
                        </div>
                    </div> -->

                    <!-- <script src="js/script.js"></script> -->

                    <!-- <div class="input-field">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="reg_kecamatan" placeholder="Kecamatan">
                    </div> -->
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="reg_email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="reg_pass" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="reg_pass2" placeholder="Konfirmasi Password">
                    </div>
                    <input type="submit" value="register" name="register" class="btn solid">

                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Belum Punya Akun ?</h3>
                        <p>Daftar, dan promosikan bisnis vendor anda sekarang...</p>
                     <button class="btn transparent" id="sign-up-btn" style="width:150px;">Register Vendor</button>

                     <p>
                         Login sebagai User ?
                         <a href="login.php" class="daftar_vendor"> Login User</a>
                    </p>
                    </div>

                    <img src="img/illustrasi_loginvendor.png" class="image_login_vendor" alt="">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Sudah Punya Akun ?</h3>
                        <p>Kembangkan bisnis vendor anda dan dapatkan klien lebih banyak dan cepat melalui Venika</p>
                        <button class="btn transparent" id="sign-in-btn">Login</button>
                    </div>
                    <img src="img/illustrasi_registervendor.png" class="image" alt="">
                </div>
            </div>
        </div>
        <script src="js/app.js"></script>

    </body>
</html>
