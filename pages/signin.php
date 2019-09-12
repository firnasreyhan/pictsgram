<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sign In | Pictsgram</title>
			
		<!-- Memanggil css -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body style="background:#fafafa;">
		<div class="container"
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div style="margin-top:15%; margin-bottom:15%;">
						<form action="process/signin.php" method="POST">
							<div class="panel panel-default" >
								<div class="panel-body">
									<img src="../images/logo.png" class="img-responsive"/>
									<br/>
									<?php 
										if(isset($_GET['message'])){
											$pesan = $_GET['message'];
											if($pesan == "error"){
												echo "<p class='text-center text-danger'>Username atau Password anda salah!</p><br/>";
											} else if($pesan == "invalid"){
												echo "<p class='text-center text-danger'>Anda harus login terlebih dahulu!</p><br/>";
											} else if($pesan == "block"){
												echo "<p class='text-center text-danger'>Maaf akun anda telah terblokir!</p><br/>";
											}
										}
									?>
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
									<button type="submit" class="btn btn-primary"style="width:100%;">Sign In</button>
									<!-- <hr/>
									<p class="text-center"><a href="#">Forgot password?</a></p> -->
								</div>
							</div>
						</form>
						<div class="panel panel-default">
							<div class="panel-body">
								<p class="text-center">Don't have an account? <label><a href="signup.php">Sign Up</a></label></p>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<p class="text-center"><label><a href="../admin/index.php">Are you Admin?</a></label></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>