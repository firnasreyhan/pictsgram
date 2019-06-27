<?php
// Memanggil file koneksi.php
include_once("../../config/koneksi.php");

// Mendapatkan id dari URL
$username = $_GET['username'];

$sql = mysqli_query($mysqli, "SELECT * FROM post WHERE username='$username'");
while($post = mysqli_fetch_array($sql)){
    $id_post = $post['ID_POST'];
    mysqli_query($mysqli, "DELETE FROM comment WHERE id_post='$id_post'");
    mysqli_query($mysqli, "DELETE FROM love WHERE id_post='$id_post'");
    mysqli_query($mysqli, "DELETE FROM post WHERE id_post='$id_post'");

}
  mysqli_query($mysqli, "DELETE FROM relationship WHERE username_a='$username'");
  mysqli_query($mysqli, "DELETE FROM user WHERE username='$username'");

//  if(!$query2){
//     echo mysqli_error($mysqli);
//  }

// Alihkan halaman ke data_user.php
header("Location:data_user.php");



?>