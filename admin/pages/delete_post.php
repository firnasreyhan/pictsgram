<?php
include_once("koneksi.php");

$idp = $_GET['ID_POST'];

mysqli_query($mysqli, "DELETE FROM POST WHERE ID_POST=$idp");

header("Location:data_photo.php");

?>