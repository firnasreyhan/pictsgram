<?php
	include_once("../../config/koneksi.php");
	
	$id_post = $_POST['id_post'];
	$username = $_POST['username'];

	date_default_timezone_set("Asia/Jakarta");
	$time = date("Y-m-d h:i:s");
	 
	$query = mysqli_query($mysqli, "INSERT INTO love VALUES ('', '$id_post', '$username', '$time')");
	if($query) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		//header("location:../signup.php?message=duplicate");
		echo mysqli_error($mysqli);
	}
?>