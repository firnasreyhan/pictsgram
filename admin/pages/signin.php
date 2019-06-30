<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../../config/koneksi.php');
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

if($username == "admin" && $password == "admin"){
	$_SESSION['status'] = "active";
	header("location:home.php");
}else{
	header("location:login.php");
}
?>