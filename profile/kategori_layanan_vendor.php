<?php
session_start();

include '../database/connection.php';

if (!isset($_SESSION['is_login'])) {
    echo "<script>document.location.href='../login_vendor.php';</script>";
    die();
}

if ($_SESSION['tipe'] != "vendor"){
    echo "<script>document.location.href='../index.php';</script>";
}

$id = $_SESSION['id'];

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
    <link rel="stylesheet" href="css/dashboard_vendor.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3709d60cb3.js" crossorigin="anonymous"></script>

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
        <a href="dashboard_vendor.php" class="brand">
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
                <a href="data_vendor.php" class="active">
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


        <!-- GALLERY -->
        <!-- gallery section starts  -->


        <!-- gallery section ends -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Data Vendor</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Data Vendor</a>
                        </li>
                        <li><i class="fa-solid fa-angle-right"></i></li>
                        <li>
                            <a class="active" href="kategori_layanan_vendor.php">Lihat Data</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- <section id="jenis">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Katering</h4>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Dekorasi</h4>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Dekorasi</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <!-- <div class="row jenis">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Katering</h3>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title">Katering</h3>
                      </div>
                    </div>
                  </div>
              </div> -->

            <div class="">
                <div class="layanan">
                    <div class="head">
                        <h3>Layanan Vendor Anda</h3>
                    </div>

                    <div class="layanan-container">
                    <?php
                        $sql = mysqli_query($koneksi,
                        "SELECT vendor.id, jenis_layanan.id as id_jenis, nama_layanan from vendor, jenis_layanan
                        where vendor.id = '$id' and jenis_layanan.id_vendor = vendor.id");
                        while ($cek = mysqli_fetch_assoc($sql)){
                            $nama_layanan = $cek['nama_layanan'];
                            $id_jenis = $cek['id_jenis'];
                            $id_vendor = $cek['id'];

                    ?>

                        <?php echo '<a href="data_vendor.php?' . $id_vendor . '?' . $id_jenis . '" class="card">'; ?>
                            <?php echo '<h3>'. $nama_layanan . '</h3>'; ?>
                        </a>
                        <?php } ?>


                    </div>

                </div>
            </div>


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