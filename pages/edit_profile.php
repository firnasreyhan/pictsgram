<?php 
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username = $_SESSION['username'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit</title>
	
	<!-- Memanggil css bootstrap -->
	<script src="../js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body style="background:#fafafa;">
	<!-- container-->
	<?php
		include("navbar.php");
		$query_user = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'");
		while($data = mysqli_fetch_array($query_user)){
			$image = $data['IMAGE'];
			$fullname = $data['NAME'];
			$username = $data['USERNAME'];
			$website = $data['WEBSITE'];
			$about = $data['ABOUT'];
			$email = $data['EMAIL'];
			$phone = $data['PHONE'];
			$gender = $data['GENDER'];
		}
	?>
	<div class="container" style="margin-top:75px; margin-bottom:25px;">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php 
							if(isset($_GET['message'])){
								$pesan = $_GET['message'];
								if($pesan == "failed"){
									echo "<p class='text-center text-danger'>Gagal edit profile!</p><br/>";
								} else if($pesan == "size"){
									echo "<p class='text-center text-danger'>Ukuran file foto terlalu besar!</p><br/>";
								} else if($pesan == "extension"){
									echo "<p class='text-center text-danger'>Ekstensi file foto anda salah!</p><br/>";
								}
							}
						?>
						<div>
							<img src="../images/profile/<?php echo $image; ?>" id="imgTemp" class="img-circle foto center-block">
							<br/>
							<p class="text-center"><b><?php echo $username; ?></b></p>
						</div>
						<hr/>
						<form method="post" enctype="multipart/form-data" action="process/edit_profile.php">
							<div class="form-group">
								<label for="number">Profile Photo</label>
								<input type="file" name="file" id="img">
							</div>
							<div class="form-group">
								<label for="usr">Name</label>
								<input type="text" class="form-control" name="name" value="<?php echo $fullname; ?>">
							</div>
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
							</div>
							<div class="form-group">
								<label for="web">Website</label>
								<input type="text" class="form-control" name="website" value="<?php echo $website; ?>">
							</div>
							<div class="form-group">
								<label for="comment">Bio</label>
								<textarea class="form-control" rows="3" name="about"><?php echo $about; ?></textarea>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
							</div>
							<div class="form-group">
								<label for="number">Phone Number</label>
								<input type="text" class="form-control" name="phone"value="<?php echo $phone; ?>">
							</div>
							<div class="form-group">
								<label for="gender"> Gender</label>
								<select name="gender" class="form-control">
									<option value="Male" <?php if($gender == "Male") { echo "selected"; } ?>>Male</option>
									<option value="Female" <?php if($gender == "Female") { echo "selected"; } ?>>Female</option>
									<option value="None" <?php if($gender == "None") { echo "selected"; } ?>>Not Specified</option>
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
	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
					
				reader.onload = function (e) {
						$('#imgTemp').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#img").change(function(){
			readURL(this);
		});
	</script>
</body>
</html>