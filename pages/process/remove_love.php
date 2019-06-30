<?php
	include_once("../../config/koneksi.php");
	
	$id_post = $_POST['id_post'];
	$username = $_POST['username'];
	 
	$query = mysqli_query($mysqli, "DELETE FROM love WHERE id_post='$id_post' AND username='$username'");
	if($query) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		//header("location:../signup.php?message=duplicate");
		echo mysqli_error($mysqli);
	}
?>