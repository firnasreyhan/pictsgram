<!DOCTYPE html>
<?php 
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username = $_SESSION['username'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Popular Photos | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.css">
		
</head>
<body style="background:#fafafa;">
	<?php
		include("navbar.php");
	?>
	<!-- ini container -->
	<div class="container" style="margin-top:75px;">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="row">
					<?php 
						$query_top_post = mysqli_query($mysqli, "SELECT * FROM top_post");
						while($data = mysqli_fetch_array($query_top_post)){
					?>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php?id_post=<?php echo $data['ID_POST']; ?>">
								<img  src="../images/post/<?php echo $data['IMAGE']; ?>">
							</a>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
	</div>
	<!-- akhir container -->
</body>
</html>