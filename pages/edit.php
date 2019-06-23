<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Edit</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		
</head>
<body>
	<!-- container-->
	
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<form name="update" method="post" action="edit.php">
					<div class="row">
						<div class="col-sm-2">
							<br/>
						</div>
						<div class="col-sm-2">
							<img src="../images/kocheng.jpg" class="rounded-circle foto">
						</div>
						<div class="col-sm-6">
							<p><b>Monica Tifani Zahara</b></p>
						</div>
						<div class="col-sm-2">
						</div>
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
							</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
	
	<!-- akhir container -->
</body>
</html>