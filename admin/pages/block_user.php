<?php 
    include("../../config/koneksi.php");

    echo $username = $_GET['username'];

  //  $sql = mysqli_query($mysqli, "SELECT * FROM post WHERE username='$username'");

    // while($post = mysqli_fetch_array($sql)){
    // $id_post = $post['ID_POST'];
    mysqli_query($mysqli, "UPDATE USER SET STATUS='1' WHERE USERNAME='$username'");

        

//}
?>