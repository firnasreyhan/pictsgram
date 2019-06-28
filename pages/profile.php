<?php
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username = $_GET['username'];
	$username_me = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo $username; ?> | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.css">
		
</head>
<body style="background:#fafafa;">
	<?php
		include("navbar.php");
		$query_user = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'");
		while($data = mysqli_fetch_array($query_user)){
			$username = $data['USERNAME'];
			$fullname = $data['NAME'];
			$about = $data['ABOUT'];
			$image = $data['IMAGE'];
			$total_post = $data['TOTAL_POST'];
			$total_following = $data['TOTAL_FOLLOWING'];
			$total_followers = $data['TOTAL_FOLLOWERS'];
			$about = $data['ABOUT'];
		}
		
		$query_relationship = mysqli_query($mysqli, "SELECT * FROM relationship WHERE username_a = '$username_me' AND username_b = '$username'");
		$cek = mysqli_num_rows($query_relationship);
	?>
	<!-- ini container -->
	<div class="container" style="margin-top:75px;">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-4">
						<img src="../images/profile/<?php echo $image; ?>" class="img-circle foto_profil center-block">
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<h1>
									<?php echo $username; ?>
									<?php
										if($_SESSION['username'] == $username) {
									?>
									<a href="edit_profile.php?username=<?php echo $username; ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a>
									<?php
										} else {
									?>
									<form action="process/add_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_me; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username; ?>"/>
										</label>
										<button type="submit" class="btn btn-primary" <?php if($cek == 1) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-ok"></span> Follow</button>
									</form>
									<form action="process/remove_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_me; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username; ?>"/>
										</label>
										<button type="submit" class="btn btn-danger" <?php if($cek == 0) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-remove"></span> Unfollow</button>
									</form>
									<?php
										}
									?>
								</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p><b><?php echo $total_post; ?></b> post</p>
							</div>
							<div class="col-sm-3">
								<p><b><?php echo $total_followers; ?></b> followers</p>
							</div>
							<div class="col-sm-3">
								<p><b><?php echo $total_following; ?></b> following</p>
							</div>
						</div>
						<p><b><?php echo $fullname; ?></b></p>
						<p><?php echo $about; ?></p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<?php
						$query_post = mysqli_query($mysqli, "SELECT * FROM post WHERE username = '$username' ORDER BY time DESC");
						if (mysqli_num_rows($query_post) != 0) {
							while($data = mysqli_fetch_array($query_post)){
					?>
					<div class="col-md-4 jarak">
						<div class="center-crop">
							<a href="detail_post.php?id_post=<?php echo $data['ID_POST'];?>">
								<img  src="../images/post/<?php echo $data['IMAGE'];?>">
							</a>
						</div>
					</div>
					<?php
							}
						} else {
					?>
					<br/>
					<h1 class="text-center">~No Photos~</h1>
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