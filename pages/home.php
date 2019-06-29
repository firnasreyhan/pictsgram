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
		<title>Home | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.min.css">
	</head>
	<body style="background:#fafafa;">
		<?php
			include("navbar.php");
			$query_user = mysqli_query($mysqli, "SELECT username, name, image FROM user WHERE username='$username'");
			while($data = mysqli_fetch_array($query_user)){
				$username = $data['username'];
				$fullname = $data['name'];
				$image = $data['image'];
			}
		?>
		<div class="container" style="margin-top:75px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<?php
									$query_home = mysqli_query($mysqli, "SELECT * FROM post WHERE username IN (SELECT username_b FROM relationship WHERE username_a = '$username') ORDER BY TIME DESC");
									while($data = mysqli_fetch_array($query_home)){
								?>
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<?php
												$id_post = $data['ID_POST'];
												$username_post = $data['USERNAME'];
												$image_post = $data['IMAGE'];
												$caption_post = $data['CAPTION'];
												$love_post = $data['TOTAL_LOVE'];
												
												$query_love = mysqli_query($mysqli, "SELECT * FROM love WHERE id_post = '$id_post' AND username = '$username'");
												$cek = mysqli_num_rows($query_love);
												
												$query_user_post = mysqli_query($mysqli, "SELECT image FROM user WHERE username = '$username_post'");
												while($data = mysqli_fetch_array($query_user_post)){
											?>
											<img src="../images/profile/<?php echo $data['image']; ?>" class="img-circle" style="height:32px; width:32px;">
											<?php
												}
											?>
											<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_post ?>"><?php echo $username_post; ?></a></label>
										</div>
										<div class="">
											<img src="../images/post/<?php echo $image_post; ?>" class="img-responsive center-block">
										</div>
										<div class="panel-footer">
											<div style="margin-bottom:5px;">
												<form action="process/add_love.php" method="post" style="display:inline;">
													<label hidden>
														<input name="location" class="form-control" type="text" value="home"/>
														<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
														<input name="username" class="form-control" type="text" value="<?php echo $username; ?>"/>
													</label>
													<button type="submit" <?php if($cek == 1) { echo "style='display:none;'"; } ?> class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>	
												</form>
												<form action="process/remove_love.php" method="post" style="display:inline;">
													<label hidden>
														<input name="location" class="form-control" type="text" value="home"/>
														<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
														<input name="username" class="form-control" type="text" value="<?php echo $username; ?>"/>
													</label>
													<button type="submit" <?php if($cek == 0) { echo "style='display:none;'"; } ?> class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>	
												</form>
												<form action="process/open_detail_post.php" method="post" style="display:inline;">
													<label hidden>
														<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
													</label>
													<button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment"></span> Comment</button>	
												</form>												
											</div>
											<label><a href="#"><?php echo $love_post; ?> Likes</a></label>
											<br/>
											<div style="word-wrap:break-word;">
												<p><label><a href="profile.php?username=<?php echo $username_post ?>"><?php echo $username_post; ?></a></label> <?php echo $caption_post; ?></p>
												<hr/>
												<?php
													$query_comment = mysqli_query($mysqli, "SELECT * FROM comment WHERE id_post='$id_post'");
													while($data = mysqli_fetch_array($query_comment)){ ?>
														<p><label><a href="profile.php?username=<?php echo $data['USERNAME']; ?>"><?php echo $data['USERNAME']; ?></a></label> <?php echo $data['COMMENT']; ?></p>
												<?php
													}
												?>
											</div>
											<form action="process/add_comment.php" method="post">
												<div class="input-group">
													<label hidden>
														<input name="location" class="form-control" type="text" value="home"/>
														<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
														<input name="username" class="form-control" type="text" value="<?php echo $username; ?>"/>
													</label>
													<input id="comment" name="comment" class="form-control" type="text" placeholder="Add a comment..."/>
													<span class="input-group-btn">
														<button type="submit" class="btn btn-primary btn-flat"><span class="glyphicon glyphicon-send"></span> Post</button>
													</span>							
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
						<div class="col-md-4">
							<div style="position:fixed; width:294.98px;">
								<div class="panel panel-default">
									<div class="panel-body">									
										<div class="row">
											<div class="col-md-3">
												<img src="../images/profile/<?php echo $image; ?>" class="img-circle center-block" style="height:50px; width:50px;">
											</div>
											<div class="col-md-9">
												<label><a href="profile.php?username=<?php echo $username; ?>"><?php echo $username; ?></a></label>
												<p><?php echo $fullname; ?></p>
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