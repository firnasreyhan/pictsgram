<?php 
    include("../../config/koneksi.php");

    echo $username = $_GET['username'];
    mysqli_query($mysqli, "UPDATE USER SET STATUS='blokir' WHERE USERNAME='$username'");
    header("Location:data_user.php");

?>  
?>