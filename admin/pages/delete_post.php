<?php
// Memanggil file koneksi.php
    include_once("../../config/koneksi.php");

// Mendapatkan id dari URL
    $id_post = $_GET['id_post'];

    $sql = mysqli_query($mysqli, "DELETE FROM post WHERE id_post='$id_post'");

// Alihkan halaman ke data_photo.php
header("Location:data_photo.php");

?>