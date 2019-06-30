<?php 
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>User Ranking | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body style="background:#fafafa;">
		<?php
			include("navbar.php");
		?>
		<div class="container" style="margin-top:75px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Rank</th>
										<th>Username</th>
										<th>Followers</th>
										<th>Likes</th>
										<th>Views</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query_top_user = mysqli_query($mysqli, "SELECT * FROM top_user");
										$ranking = 1;
										while($data = mysqli_fetch_array($query_top_user)){
									?>
									<tr>
										<td><?php echo $ranking++; ?> <?php if($ranking < 4){ echo "<span class='glyphicon glyphicon-star'></span>"; } ?></td>
										<td>
											<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="width:40px; height:40px;"/>
											<label style="margin-left:10px;"><a href="profile.php?username=<?php echo $data['USERNAME']; ?>"><?php echo $data['USERNAME']; ?></a></label>
										</td>
										<td><?php echo $data['TOTALFOLLOWERS']; ?></td>
										<td><?php echo $data['TOTALLOVE']; ?></td>
										<td><?php echo $data['TOTALVIEW']; ?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>