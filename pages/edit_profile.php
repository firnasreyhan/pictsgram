<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit</title>
	
	<!-- Memanggil css bootstrap -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body style="background:#fafafa;">
	<!-- container-->
	<?php
		include("navbar.php");
	?>
	<div class="container" style="margin-top:75px; margin-bottom:25px;">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div>
							<img src="../images/kocheng.jpg" class="img-circle foto center-block">
							<br/>
							<p class="text-center"><b>monicatifanyz</b></p>
						</div>
						<hr/>
						<form name="update" method="post" action="edit.php">
							<div class="form-group">
								<label for="number">Profile Photo</label>
								<input type="file" name="myFile">
							</div>
							<div class="form-group">
								<label for="usr">Name </label>
								<input type="text" class="form-control" id="usr">
							</div>
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" class="form-control" id="user">
							</div>
							<div class="form-group">
								<label for="web">Website</label>
								<input type="text" class="form-control" id="web">
							</div>
							<div class="form-group">
								<label for="comment">Bio</label>
								<textarea class="form-control" rows="3" id="comment"></textarea>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="number">Phone Number</label>
								<input type="text" class="form-control" id="number">
							</div>
							<div class="form-group">
								<label for="gender"> Gender</label>
								<select name="gender" id="gender" class="form-control">
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="female">Not Specified</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<!-- akhir container -->
</body>
</html>