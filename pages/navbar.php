<?php
	include_once("../config/koneksi.php");
?>
<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<img src="../images/logo.png" class="navbar-brand"/>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="user_ranking.php">User Ranking</a></li>
					<li><a href="popular_photos.php">Popular Photos</a></li>
				</ul>
				<form class="navbar-form navbar-left" action="/action_page.php">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit" style="width:40px; height:34px;">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="add_post.php?username=<?php echo $_SESSION['username']; ?>"><span class="glyphicon glyphicon-camera"></span> Add Photo</a></li>
					<li><a href="profile.php?username=<?php echo $_SESSION['username']; ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					<li><a href="process/signout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</nav>