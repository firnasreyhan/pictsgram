<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div class="container" style="margin-top:75px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
								<label style="margin-left:16px;"><a href="profile.php">Tes</a></label>
							</div>
							<div class="">
								<img src="../images/avatar.jpg" class="img-responsive center-block">
							</div>
							<div class="panel-footer">
								<div style="margin-bottom:5px;">
									<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>
									<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment"></span> Comment</button>
								</div>
								<label><a href="profile.php">1000 Likes</a></label>
								<br/>
								<div style="word-wrap:break-word;">
									<p><label><a href="profile.php">Username</a></label> Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption</p>
									<hr/>
									<p><label><a href="profile.php">Username</a></label> Comment</p>
									<p><label><a href="profile.php">Username</a></label> Comment</p>
									<p><label><a href="profile.php">Username</a></label> Comment</p>
								</div>
								<div class="input-group">
									<input class="form-control" type="text" placeholder="Add a comment..."/>
									<span class="input-group-btn">
										<button type="button" class="btn btn-primary btn-flat"><span class="glyphicon glyphicon-send"></span> Post</button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</body>
</html>