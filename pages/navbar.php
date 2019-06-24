<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<img src="../images/logo.png" class="navbar-brand"/>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="#">User Ranking</a></li>
					<li><a href="#">Popular Photos</a></li>
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
					<li><a href="add_post.php"><span class="glyphicon glyphicon-camera"></span> Add Photo</a></li>
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					<li><a href="signin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</nav>