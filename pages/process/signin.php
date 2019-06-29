<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../../config/koneksi.php');
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' AND password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "active";
	header("location:../home.php");
}else{
	header("location:../signin.php?message=error");
}
?>