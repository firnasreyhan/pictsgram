<?php 
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username_session = $_SESSION['username'];
	$username_profil = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Followers | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
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
				<h1>Followers</h1>
				<div class="row">
					<?php
						$query_follower = mysqli_query($mysqli, "SELECT user.IMAGE, relationship.USERNAME_A FROM user, relationship WHERE user.USERNAME = relationship.USERNAME_A AND relationship.USERNAME_B = '$username_profil' ORDER BY relationship.TIME DESC");
						$cek_jumlah_follower = mysqli_num_rows($query_follower);
						if($cek_jumlah_follower > 1) {
							while($data = mysqli_fetch_array($query_follower)){
								$username_following = $data['USERNAME_A'];
								if($username_profil != $username_following) {
									$query_relationship = mysqli_query($mysqli, "SELECT * FROM relationship WHERE username_a = '$username_session' AND username_b = '$username_following'");
									$cek = mysqli_num_rows($query_relationship);
									if($username_session == $username_following) {
					?>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<div>
									<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;">
									<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_following ?>"><?php echo $username_following; ?></a></label>
								</div>
							</div>
						</div>
					</div>
					<?php
									} else {
					?>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<div>
									<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;">
									<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_following ?>"><?php echo $username_following; ?></a></label>
									<form action="process/add_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_session; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username_following; ?>"/>
										</label>
										<button type="submit" class="btn btn-sm btn-primary pull-right" <?php if($cek == 1) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-ok"></span> Follow</button>
									</form>
									<form action="process/remove_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_session; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username_following; ?>"/>
										</label>
										<button type="submit" class="btn btn-sm btn-danger pull-right" <?php if($cek == 0) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-remove"></span> Unfollow</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php
									}
								}
							}
						} else {
					?>
					<h1 class="text-center" style="margin-top:175px;">~No Followers~</h1>
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