<?php 
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username_session = $_SESSION['username'];
	$param = $_GET['param'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Search | Pictsgram</title>
		
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
				<h1>Search</h1>
				<div class="row">
					<?php
						$query_search = mysqli_query($mysqli, "SELECT * FROM user WHERE username LIKE '%$param%' OR name LIKE '%$param%' OR email LIKE '%$param%'");
						$cek_jumlah_follower = mysqli_num_rows($query_search);
						if($cek_jumlah_follower > 0) {
							while($data = mysqli_fetch_array($query_search)){
								$username_search = $data['USERNAME'];
									$query_relationship = mysqli_query($mysqli, "SELECT * FROM relationship WHERE username_a = '$username_session' AND username_b = '$username_search'");
									$cek = mysqli_num_rows($query_relationship);
									if($username_session == $username_search) {
					?>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<div>
									<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;">
									<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_search; ?>"><?php echo $username_search; ?></a></label>
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
									<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_search ?>"><?php echo $username_search; ?></a></label>
									<form action="process/add_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_session; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username_search; ?>"/>
										</label>
										<button type="submit" class="btn btn-sm btn-primary pull-right" <?php if($cek == 1) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-ok"></span> Follow</button>
									</form>
									<form action="process/remove_relationship.php" method="post" style="display:inline;">
										<label hidden>
											<input name="username_a" class="form-control" type="text" value="<?php echo $username_session; ?>"/>
											<input name="username_b" class="form-control" type="text" value="<?php echo $username_search; ?>"/>
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
						} else {
					?>
					<h1 class="text-center" style="margin-top:175px;">~No User~</h1>
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