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
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
										</div>
										<div class="">
											<img src="../images/avatar.jpg" class="img-responsive center-block">
										</div>
										<div class="panel-footer">
											<div style="margin-bottom:5px;">
												<a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</a>
												<a href="detail_post.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment"></span> Comment</a>
											</div>
											<label><a href="#">1000 Likes</a></label>
											<br/>
											<div style="word-wrap:break-word;">
												<p><label><a href="profile.php">Username</a></label> Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption</p>
												<hr/>
												<p><label><a href="#">View all 75 comments</a></label></p>
												<p><label><a href="profile.php">Username</a></label> Comment</p>
												<p><label><a href="profile.php">Username</a></label> Comment</p>
												<p><label><a href="profile.php">Username</a></label> Comment</p>
											</div>
											<div class="input-group">
												<input class="form-control" type="text" placeholder="Add a comment..."/>
												<span class="input-group-btn">
													<button type="button" class="btn btn-primary btn-flat"><span class="glyphicon glyphicon-send"></span>   Post</button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
										</div>
										<div class="">
											<img src="../images/avatar.jpg" class="img-responsive center-block">
										</div>
										<div class="panel-footer">
											<div style="margin-bottom:5px;">
												<a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</a>
												<a href="detail_post.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment"></span> Comment</a>
											</div>
											<label><a href="#">1000 Likes</a></label>
											<br/>
											<div style="word-wrap:break-word;">
												<p><label><a href="profile.php">Username</a></label> Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption Caption</p>
												<hr/>
												<p><label><a href="#">View all 75 comments</a></label></p>
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
						</div>
						<div class="col-md-4">
							<div style="position:fixed; width:294.98px;">
								<div class="panel panel-default">
									<div class="panel-body">									
										<div class="row">
											<div class="col-md-3">
												<img src="../images/avatar.jpg" class="img-circle center-block" style="height:50px; width:50px;">
											</div>
											<div class="col-md-9">
												<label><a href="profile.php">Username</a></label>
												<p>Fullname</p>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<label>Top User</label>
									</div>
									<div class="panel-body">
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
										<br/>
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
										<br/>
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<label>Suggestions For You</label>
									</div>
									<div class="panel-body">
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
										<br/>
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
										<br/>
										<div>
											<img src="../images/avatar.jpg" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php">Username</a></label>
											<button type="button" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-ok"></span> Follow</button>
										</div>
									</div>
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