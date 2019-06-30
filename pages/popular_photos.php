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
				<div class="row">
					<?php
						$query_post = mysqli_query($mysqli, "SELECT * FROM top_post");
						if (mysqli_num_rows($query_post) != 0) {
							while($data = mysqli_fetch_array($query_post)){
					?>
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<img src="../images/profile/<?php echo $data['PROFILE']; ?>" class="img-circle" style="height:32px; width:32px;">
								<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $data['USERNAME']; ?>"><?php echo $data['USERNAME']; ?></a></label>
							</div>
							<div class="panel-body">
								<div class="center-crop">
									<a href="detail_post.php?id_post=<?php echo $data['ID_POST'];?>">
										<img <?php if($data['WIDTH'] > $data['HEIGHT']) { echo "class='portrait'"; } ?> src="../images/post/<?php echo $data['IMAGE'];?>">
									</a>
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-4">
										<a type="button" class="btn btn-sm btn-default center-block disabled"><?php echo $data['TOTAL_LOVE'];?> <span class="glyphicon glyphicon-heart"></span></a>
									</div>
									<div class="col-md-4">
										<a type="button" class="btn btn-sm btn-default center-block disabled"><?php echo $data['TOTAL_COMMENT'];?> <span class="glyphicon glyphicon-comment"></span></a>
									</div>
									<div class="col-md-4">
										<a type="button" class="btn btn-sm btn-default center-block disabled"><?php echo $data['TOTAL_VIEW'];?> <span class="glyphicon glyphicon-eye-open"></span></a>
									</div>
								</div>
							</div>
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