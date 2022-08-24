<?php
// Panggil file config
include 'database/connection.php';
// Check apakah terdapat post Login
if (isset($_GET['search'])) {
	// nama vendor
	$vendor = $_GET['nama_vendor'];
	// lokasi
	$lokasi = $_GET['lokasi'];
	// adat
	$adat = $_GET['adat'];
    // jenis_layanan
	$jenis_layanan = $_GET['jenis_layanan'];


	// Test ECHO
	// echo $vendor;
	// echo $lokasi;
	// echo $adat;
	// echo $jenis_layanan;

  // IF NO INPUT
	if((!$_GET['nama_vendor']) && (!$_GET['lokasi']) && (!$_GET['adat']) && (!$_GET['jenis_layanan']))
	{
		echo "<script>document.location.href='index.php';</script>";
		return false;
	}

  // IF ONLY GET NAMA VENDOR
	if((!$_GET['lokasi']) && (!$_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA VENDOR & JENIS LAYANAN
	if((!$_GET['lokasi']) && (!$_GET['adat']) && ($_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA VENDOR & ADAT
	if((!$_GET['lokasi']) && ($_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND jenis_layanan.adat = '$adat'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA VENDOR & LOKASI
	if(($_GET['lokasi']) && (!$_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND vendor.kecamatan = '$lokasi'
    AND vendor.id = jenis_layanan.id_vendor");
	}

   // IF ONLY GET NAMA VENDOR & JENIS LAYANAN & ADAT
	if((!$_GET['lokasi']) && ($_GET['adat']) && ($_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND jenis_layanan.adat = '$adat' AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA VENDOR & JENIS LAYANAN & LOKASI
	if(($_GET['lokasi']) && (!$_GET['adat']) && ($_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND vendor.kecamatan = '$lokasi' AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA VENDOR & ADAT & LOKASI
	if(($_GET['lokasi']) && ($_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.nama LIKE '$vendor%' AND vendor.kecamatan = '$lokasi'
    AND jenis_layanan.adat = '$adat' AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET NAMA JENIS LAYANAN & LOKASI & ADAT
	if(($_GET['lokasi']) && ($_GET['adat']) && ($_GET['jenis_layanan']) && (!$_GET['nama_vendor']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.kecamatan = '$lokasi' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND jenis_layanan.adat = '$adat' AND vendor.id = jenis_layanan.id_vendor");
	}




  // IF ONLY GET LOKASI
	if((!$_GET['nama_vendor']) && (!$_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['lokasi']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.kecamatan = '$lokasi'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET LOKASI & JENIS LAYANAN
	if((!$_GET['nama_vendor']) && (!$_GET['adat']) && ($_GET['jenis_layanan']) && ($_GET['lokasi']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.kecamatan = '$lokasi' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  // IF ONLY GET LOKASI & ADAT
	if((!$_GET['nama_vendor']) && ($_GET['adat']) && (!$_GET['jenis_layanan']) && ($_GET['lokasi']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE vendor.kecamatan = '$lokasi' AND jenis_layanan.adat = '$adat'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  //IF ONLY GET ADAT
	if((!$_GET['nama_vendor']) && (!$_GET['lokasi']) && (!$_GET['jenis_layanan']) && ($_GET['adat']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id,vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE jenis_layanan.adat = '$adat'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  //IF ONLY GET ADAT & JENIS LAYANAN
	if((!$_GET['nama_vendor']) && (!$_GET['lokasi']) && ($_GET['jenis_layanan']) && ($_GET['adat']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    FROM vendor, jenis_layanan
		WHERE jenis_layanan.adat = '$adat' AND jenis_layanan.nama_layanan = '$jenis_layanan'
    AND vendor.id = jenis_layanan.id_vendor");
	}

  //IF ONLY GET JENIS LAYANAN
	if((!$_GET['nama_vendor']) && (!$_GET['lokasi']) && (!$_GET['adat']) && ($_GET['jenis_layanan']))
	{
		echo "<script>document.location.href='vendor/" . $jenis_layanan . ".php';</script>";
	// 	$sql = mysqli_query($koneksi,
	// 	"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
    // FROM vendor, jenis_layanan
	// 	WHERE jenis_layanan.nama_layanan = '$jenis_layanan'
    // AND vendor.id = jenis_layanan.id_vendor");
	}

  //IF GET ALL
	if(($_GET['nama_vendor']) && ($_GET['lokasi']) && ($_GET['adat']) && ($_GET['jenis_layanan']))
	{
		$sql = mysqli_query($koneksi,
		"SELECT DISTINCT vendor.id, vendor.nama, vendor.kecamatan, jenis_layanan.galeri, jenis_layanan.nama_layanan, jenis_layanan.id as id_jenis
		FROM vendor, jenis_layanan WHERE vendor.nama LIKE '$vendor%' AND vendor.kecamatan ='$lokasi'
		AND jenis_layanan.adat='$adat' AND jenis_layanan.nama_layanan='$jenis_layanan'
    AND vendor.id = jenis_layanan.id_vendor");

	}


}

?>




