<?php 
include_once ('../../config/koneksi.php');

$username_a = $_POST['username_a'];
$username_b = $_POST['username_b'];

date_default_timezone_set("Asia/Jakarta");
$time = date("Y-m-d h:i:s");
 
$query = mysqli_query($mysqli, "DELETE FROM relationship WHERE username_a = '$username_a' AND username_b = '$username_b'");
if($query) {
	//header("location:../profile.php?username=$username_b");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	header("location:../signup.php?message=duplicate");
	//echo mysqli_error($mysqli);
}
?>