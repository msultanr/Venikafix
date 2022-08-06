<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Style CSS -->
  <link rel="stylesheet" href="css/style_nav_login.css">

  <!-- Style Responsive -->
  <!-- <link rel="stylesheet" href="css/responsive.css"> -->

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>

  <title>Venika</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light position-fixed w-100">
    <div class="container">
      <!-- Icon Navbar -->
      <a class="navbar-brand" href="#">
        <img src="../profile/img/venikasvgfix2.svg" alt="" width="30" height="24"
          class="d-inline-block align-text-top" me-3>Venika</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <!-- mx : margin pd sumbu x -->
          <li class="nav-item mx-3">
            <!-- nav menu yg aktif -->
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="#">Vendor</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
        </ul>
        <!-- Button -->
        <div>
          <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
              <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                  <div class="navbar-container container-fluid">
                    <!-- user profile drop down -->
                    <ul class="nav-right">
                      <li class="user-profile header-notification">
                        <a href="#!" class="arrowdown">
                          <img src="img/bg.jpg" class="img-radius" alt="User-Profile-Image">
                          <span>Rosma Asiyya</span>
                          <!-- <i class="fas fa-angle-down toggle"></i> -->
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
          <!-- JavaScript -->
          <script src="js/script.js"></script>
          <!-- Required Jquery -->
          <script type="text/javascript" src="js/jquery.min.js"></script>

          <!-- menu js -->
          <script src="js/pcoded.min.js"></script>
          <script src="js/vertical-layout.min.js"></script>
          <script type="text/javascript" src="js/user_profile.js"></script>

          <!-- Font Awesome -->
          <!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
          </script> -->
        </div>
      </div>
    </div>
  </nav>


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