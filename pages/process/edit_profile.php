<?php 
	session_start();
	$username_old = $_SESSION['username'];
	
	include_once('../../config/koneksi.php');
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];

	$name = $_POST['name'];
	$username = $_POST['username'];
	$website = $_POST['website'];
	$about = $_POST['about'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	
	$_SESSION['username'] = $username;
 
	if($nama != ""){
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){	
				move_uploaded_file($file_tmp, '../../images/profile/'.$nama);
				$query = mysqli_query($mysqli, "UPDATE user SET USERNAME='$username',NAME='$name',IMAGE='$nama',GENDER='$gender',ABOUT='$about',EMAIL='$email',PHONE='$phone',WEBSITE='$website' WHERE username='$username_old'");
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
	} else {
		$query = mysqli_query($mysqli, "UPDATE user SET USERNAME='$username',NAME='$name',GENDER='$gender',ABOUT='$about',EMAIL='$email',PHONE='$phone',WEBSITE='$website' WHERE username='$username_old'");
		if($query){
			header("location:../profile.php?username=$username");
		}
	}
?>