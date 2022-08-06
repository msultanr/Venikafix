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
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login/code_login_user.php" method="POST" class="sign-in-form">
                    
                    <h2 class="title">User Login</h2>
                    
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

                    <p class="lupa_pass">Lupa Password ?</p>
                    
                    <input type="submit" name="login" value="login" class="btn solid">
                    
                </form>

                <form action="login/register_user.php" method="POST" class="sign-up-form">
                    <h2 class="title">User Register</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="reg_nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="reg_user" placeholder="Username">
                    </div>
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
                    <input type="submit" name="register" value="register" class="btn solid">

                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Belum Punya Akun ?</h3>
                        <p>Cari kebutuhan pernikahan lebih mudah dan cepat dengan venika</p>
                     <button class="btn transparent" id="sign-up-btn">Register</button>

                     <p>
                         Login Sebagai Vendor ? 
                         <a href="login_vendor.php" class="daftar_vendor"> Login Vendor</a>
                    </p>
                    </div>

                    <img src="img/illustrasi_login.png" class="image" alt="">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Sudah Punya Akun ?</h3>
                        <p>Eksplore berbagai vendor pernikahan terbaik melalui Venika..</p>
                        <button class="btn transparent" id="sign-in-btn">Login</button>
                    </div>
                    <img src="img/illustrasi_register.png" class="image" alt="">
                </div>
            </div>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>