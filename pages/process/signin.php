<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../../config/koneksi.php');
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$sql = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' AND password='$password'");
while($data = mysqli_fetch_array($sql)){
	$status = $data['STATUS'];
}
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "active";
	if($status == "Block") {
		header("location:../signin.php?message=block");
	} else {
		header("location:../home.php");	
	}
}else{
	header("location:../signin.php?message=error");
}
?>