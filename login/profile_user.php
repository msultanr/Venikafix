<?php 
// Mulai session
session_start();
$_SESSION["id"] = 1; // User's session
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $sessionId"));

// Panggil file config
include '../database/connection.php';

?>