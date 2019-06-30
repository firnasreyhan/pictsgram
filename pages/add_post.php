<?php
	session_start();
	if($_SESSION['status'] != "active"){
		header("location:signin.php?message=invalid");
	}
	$username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Add Post | Pictsgram</title>
		
		<script src="../js/jquery-3.4.1.min.js"></script>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body style="background:#fafafa;">
		<?php
			include("navbar.php");
		?>
		<div class="container" style="margin-top:75px;">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
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
										</div>
										<div class="">
											<img src="../images/no_photo.jpg" id="imgTemp" class="img-responsive center-block" />
										</div>
										<div class="panel-footer">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div>
								<div class="panel panel-default">
									<div class="panel-body">
										<form action="process/add_post.php" method="post" enctype="multipart/form-data">
											<label hidden>
												<input name="username" type="text" class="form-control" value="<?php echo $username;?>">
											</label>
											<label>Select Image</label>
											<br/>
											<input type="file" name="file" id="img">
											<br/>
											<label>Caption</label>
											<br/>
											<textarea name="caption" style="width:100%; height:200px;"></textarea>
											<br/>
											<button name="upload" type="submit" class="btn btn-primary btn-flat pull-right"><span class="glyphicon glyphicon-send"></span> Post</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
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