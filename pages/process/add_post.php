<?php 
	include_once('../../config/koneksi.php');
		$ekstensi_diperbolehkan	= array('png','jpg');
		$username = $_POST['username'];
		$nama = $_FILES['file']['name'];
		$caption = $_POST['caption'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		list($width, $height, $type, $attr) = getimagesize($file_tmp); 
		
		date_default_timezone_set("Asia/Jakarta");
		$time = date("Y-m-d h:i:s");
 
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){		
				move_uploaded_file($file_tmp, '../../images/post/'.$nama);
				$query = mysqli_query($mysqli, "INSERT INTO post(USERNAME, IMAGE, CAPTION, WIDTH, HEIGHT, TIME) VALUES ('$username','$nama','$caption','$width','$height','$time')");
				if($query){
					header("location:../profile.php?username=$username");
				} else {
					header("location:../add_post.php?message=failed");
				}
			} else {
				header("location:../add_post.php?message=size");
			}
		} else {
			header("location:../add_post.php?message=extension");
		}
?>