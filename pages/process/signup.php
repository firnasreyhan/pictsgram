<?php 
include_once ('../../config/koneksi.php');

$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];

date_default_timezone_set("Asia/Jakarta");
$time = date("Y-m-d h:i:s");
 
$query_user = mysqli_query($mysqli, "INSERT INTO user(EMAIL, NAME, USERNAME, PASSWORD, STATUS, TIME) VALUES ('$email', '$fullname', '$username', '$password', 'User', '$time')");
$query_relationship = mysqli_query($mysqli, "INSERT INTO relationship VALUES ('', '$username', '$username', '$time')");
if($query_user) {
	header("location:../signin.php");
} else {
	header("location:../signup.php?message=duplicate");
	//echo mysqli_error($mysqli);
}
?>