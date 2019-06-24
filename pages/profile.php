<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Tampilan Utama Pictsgram</title>
		
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
					<div class="col-md-4">
						<img src="../images/avatar.jpg" class="img-circle foto_profil center-block">
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<h1>Pictsgram</h1>
							</div>
							<div class="col-md-8">
								<h1>
									<a href="edit_profile.php" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a>
									<a href="#" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-ok"></span> Follow</a>
									<a href="#" class="btn btn-danger" style="display:none;"><span class="glyphicon glyphicon-remove"></span> Unfollow</a>
								</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p><b>1</b> post</p>
							</div>
							<div class="col-sm-3">
								<p><b>1</b> follower</p>
							</div>
							<div class="col-sm-3">
								<p><b>1</b> following</p>
							</div>
						</div>
						<p><b>Monica Tifani Zahara</b></p>
						<p>INI BIO</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img  src="../images/avatar.jpg">
							</a>
						</div>
					</div>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img  src="../images/download.jpg">
							</a>
						</div>
					</div>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img  src="../images/avatar.jpg">
							</a>
						</div>
					</div>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img  src="../images/avatar.jpg">
							</a>
						</div>
					</div>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img  src="../images/avatar.jpg">
							</a>
						</div>
					</div>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php">
								<img src="../images/avatar.jpg">
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
	</div>
	<!-- akhir container -->
</body>
</html>