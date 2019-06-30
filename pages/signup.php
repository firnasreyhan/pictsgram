<?php
	include_once("../config/koneksi.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sign Up | Pictsgram</title>
		<!-- Memanggil css -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body style="background:#fafafa;">
		<div class="container"
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div style="margin-top:5%; margin-bottom:5%;">
						<div class="panel panel-default" >
							<div class="panel-body">
								<form action="process/signup.php" method="POST">
									<img src="../images/logo.png" class="img-responsive"/>
									<br/>
									<p class="text-center"><label>Sign up to see photos from your friends.</label></p>
									<br/>
									<?php 
										if(isset($_GET['message'])){
											$pesan = $_GET['message'];
											if($pesan == "duplicate"){
												echo "<p class='text-center text-danger'>Username atau Email telah terdaftar!</p><br/>";
											}
										}
									?>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input name="email" type="email" class="form-control" placeholder="Email" required>
									</div>
									<br/>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
										<input name="fullname" type="text" class="form-control" placeholder="Fullname" required>
									</div>
									<br/>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input name="username" type="text" class="form-control" placeholder="Username" required>
									</div>
									<br/>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input name="password" type="password" class="form-control" placeholder="Password" required>
									</div>
									<br/>
									<button type="submit" class="btn btn-primary" style="width:100%;">Sign Up</button>
								</form>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<p class="text-center">Have an account? <label><a href="signin.php">Sign In</a></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>