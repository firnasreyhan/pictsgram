<?php
	include_once("../../config/koneksi.php");
	
	$id_post = $_POST['id_post'];
	$username = $_POST['username'];
	$location = $_POST['location'];

	date_default_timezone_set("Asia/Jakarta");
	$time = date("Y-m-d h:i:s");
	 
	$query = mysqli_query($mysqli, "INSERT INTO love VALUES ('', '$id_post', '$username', '$time')");
	if($query) {
		if($location == "home") {
			header("location:../home.php");
		} else if($location = "detail") {
			header("location:../detail_post.php?id_post=$id_post");	
		}
	} else {
		//header("location:../signup.php?message=duplicate");
		echo mysqli_error($mysqli);
	}
?>