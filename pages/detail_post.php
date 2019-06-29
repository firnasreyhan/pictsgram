<?php
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$id_post = $_GET['id_post'];
	$username_me = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Detail Post | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.min.css">
	</head>
	<body style="background:#fafafa;">
		<?php
			include("navbar.php");
			$query_post = mysqli_query($mysqli, "SELECT * FROM post WHERE id_post='$id_post'");
			while($data = mysqli_fetch_array($query_post)){
				$username = $data['USERNAME'];
				$image = $data['IMAGE'];
				$caption = $data['CAPTION'];
				$width = $data['WIDTH'];
				$height = $data['HEIGHT'];
				$total_love = $data['TOTAL_LOVE'];
				$total_comment = $data['TOTAL_COMMENT'];
				$total_view = $data['TOTAL_VIEW'];
				mysqli_query($mysqli, "UPDATE post SET total_view='$total_view'+1 WHERE id_post='$id_post'");
			}
			
			$query_user = mysqli_query($mysqli, "SELECT image FROM user WHERE username='$username'");
			while($data = mysqli_fetch_array($query_user)){
				$image_profile = $data['image'];
			}
			
			$query_love = mysqli_query($mysqli, "SELECT * FROM love WHERE id_post = '$id_post' AND username = '$username_me'");
			$cek = mysqli_num_rows($query_love);
		?>
		<div class="container" style="margin-top:75px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<img src="../images/profile/<?php echo $image_profile; ?>" class="img-circle" style="height:32px; width:32px;">
								<label style="margin-left:16px;"><a href="profile.php?username=<?php echo $username; ?>"><?php echo $username; ?></a></label>
							</div>
							<div class="">
								<img src="../images/post/<?php echo $image; ?>" class="img-responsive center-block">
							</div>
							<div class="panel-footer">
								<div style="margin-bottom:5px;">
									<form action="process/add_love.php" method="post" style="display:inline;">
										<label hidden>
											<input name="location" class="form-control" type="text" value="detail"/>
											<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
											<input name="username" class="form-control" type="text" value="<?php echo $_SESSION['username']; ?>"/>
										</label>
										<button type="submit" <?php if($cek == 1) { echo "style='display:none;'"; } ?> class="btn btn-default btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>	
									</form>
									<form action="process/remove_love.php" method="post" style="display:inline;">
										<label hidden>
											<input name="location" class="form-control" type="text" value="detail"/>
											<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
											<input name="username" class="form-control" type="text" value="<?php echo $_SESSION['username']; ?>"/>
										</label>
										<button type="submit" <?php if($cek == 0) { echo "style='display:none;'"; } ?> class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-heart"></span> Like</button>	
									</form>									
									<button onclick="comment();" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-comment"></span> Comment</button>								
								</div>
								<label><a href="profile.php"><?php echo $total_love; ?> Likes</a></label>
								<br/>
								<div style="word-wrap:break-word;">
									<p><label><a href="profile.php?username=<?php echo $username; ?>"><?php echo $username; ?></a></label> <?php echo $caption; ?></p>
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
											<input name="location" class="form-control" type="text" value="detail"/>
											<input name="id_post" class="form-control" type="text" value="<?php echo $id_post; ?>"/>
											<input name="username" class="form-control" type="text" value="<?php echo $_SESSION['username']; ?>"/>
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
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<script>
			function comment() {
			  document.getElementById("comment").focus();
			}
		</script>
	</body>
</html>