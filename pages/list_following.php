<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Following | Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.css">
		
</head>
<body style="background:#fafafa;">
	<?php
		include("navbar.php");
	?>
	<!-- ini container -->
	<div class="container" style="margin-top:75px;">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<h1>Following</h1>
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<?php
									include_once("../config/koneksi.php");
									
									// $username = $_GET['username_b'];
									$result = mysqli_query($mysqli, "SELECT username_b from relationship where username_a ='manusiabiasa'" );
										while($data = mysqli_fetch_array($result)){
											echo "<td><img src='../images/profile/no_profile.jpg' class='img-circle' style='height:32px; width:32px;'>";
											echo "<td><label style='margin-left:16px;'><a href='profile.php?'> Username &nbsp</a></label>";
											echo "<td><button type='button' class='btn btn-primary btn-sm pull-right'><span class='glyphicon glyphicon-ok'></span> Follow </button>";
									}
								?>
							</div>
						</div>
					</div>
					
					</div>
				</div>
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
	<!-- akhir container -->
</body>
</html>