<?php
	include_once("../../config/koneksi.php");
	
	$id_post = $_POST['id_post'];
	$username = $_POST['username'];
	$location = $_POST['location'];
	 
	$query = mysqli_query($mysqli, "DELETE FROM love WHERE id_post='$id_post' AND username='$username'");
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