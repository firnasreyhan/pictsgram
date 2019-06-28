<?php 
include_once ('../../config/koneksi.php');

$username_a = $_POST['username_a'];
$username_b = $_POST['username_b'];

date_default_timezone_set("Asia/Jakarta");
$time = date("Y-m-d h:i:s");
 
$query = mysqli_query($mysqli, "INSERT INTO relationship VALUES ('', '$username_a', '$username_b', '$time')");
if($query) {
	header("location:../profile.php?username=$username_b");
} else {
	header("location:../signup.php?message=duplicate");
	//echo mysqli_error($mysqli);
}
?>