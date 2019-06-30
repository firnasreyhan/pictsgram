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
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
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
									$cek_home = mysqli_num_rows($query_home);
									if($cek_home != 0) {
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
													$image_profile = $data['image'];
											?>
											<img src="../images/profile/<?php echo $image_profile; ?>" class="img-circle" style="height:32px; width:32px;">
											<?php
												}
											?>
											<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_post; ?>"><?php echo $username_post; ?></a></label>
										</div>
										<div class="">
											<img src="../images/post/<?php echo $image_post; ?>" class="img-responsive center-block">
										</div>
										<div class="panel-footer">
											<div style="margin-bottom:5px;">
												<form action="process/add_love.php" method="post" style="display:inline;">
													<label hidden>
														<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
														<input name="username" class="form-control" type="text" value="<?php echo $username; ?>"/>
													</label>
													<button type="submit" <?php if($cek == 1) { echo "style='display:none;'"; } ?> class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>	
												</form>
												<form action="process/remove_love.php" method="post" style="display:inline;">
													<label hidden>
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
												<p><img src="../images/profile/<?php echo $image_profile; ?>" class="img-circle" style="height:32px; width:32px;"><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php?username=<?php echo $username_post ?>"><?php echo $username_post; ?></a></label> <?php echo $caption_post; ?></p>
												<hr/>
												<?php
													$query_comment = mysqli_query($mysqli, "SELECT comment.ID_POST, user.USERNAME, user.IMAGE, comment.COMMENT FROM user, comment WHERE user.USERNAME = comment.USERNAME AND comment.ID_POST = '$id_post'");
													while($data = mysqli_fetch_array($query_comment)){ ?>
														<p><img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;"><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php?username=<?php echo $data['USERNAME']; ?>"><?php echo $data['USERNAME']; ?></a></label> <?php echo $data['COMMENT']; ?></p>
												<?php
													}
												?>
											</div>
											<form action="process/add_comment.php" method="post">
												<div class="input-group">
													<label hidden>
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
									} else {
								?>
								<h1 class="text-center" style="margin-top:200px">~No Photos~</h1>
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
										<?php
											$query_top_user = mysqli_query($mysqli, "SELECT * FROM top_user LIMIT 5");
											while($data = mysqli_fetch_array($query_top_user)){
												$username_top_user = $data['USERNAME'];
												$query_relationship = mysqli_query($mysqli, "SELECT * FROM relationship WHERE username_a = '$username' AND username_b = '$username_top_user'");
												$cek = mysqli_num_rows($query_relationship);
												if($username == $username_top_user) {
										?>
										<div>
											<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_top_user ?>"><?php echo $username_top_user; ?></a></label>
										</div>
										<br/>
										<?php
												} else {
										?>
										<div>
											<img src="../images/profile/<?php echo $data['IMAGE']; ?>" class="img-circle" style="height:32px; width:32px;">
											<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username_top_user ?>"><?php echo $username_top_user; ?></a></label>
											<form action="process/add_relationship.php" method="post" style="display:inline;">
												<label hidden>
													<input name="username_a" class="form-control" type="text" value="<?php echo $username; ?>"/>
													<input name="username_b" class="form-control" type="text" value="<?php echo $username_top_user; ?>"/>
												</label>
												<button type="submit" class="btn btn-sm btn-primary pull-right" <?php if($cek == 1) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-ok"></span> Follow</button>
											</form>
											<form action="process/remove_relationship.php" method="post" style="display:inline;">
												<label hidden>
													<input name="username_a" class="form-control" type="text" value="<?php echo $username; ?>"/>
													<input name="username_b" class="form-control" type="text" value="<?php echo $username_top_user; ?>"/>
												</label>
												<button type="submit" class="btn btn-sm btn-danger pull-right" <?php if($cek == 0) { echo "style='display:none;'"; } ?>><span class="glyphicon glyphicon-remove"></span> Unfollow</button>
											</form>
										</div>
										<br/>
										<?php
												}
											}
										?>
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