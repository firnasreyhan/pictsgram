<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Tampilan Utama Pictsgram</title>
		
		<!-- Memanggil css bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.css">
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
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Rank</th>
										<th>Username</th>
										<th>Total Likes</th>
										<th>Total Views</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>100</td>
										<td>100</td>
									</tr>
									<tr>
										<td>2</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>50</td>
										<td>50</td>
									</tr>
									<tr>
										<td>3</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>10</td>
										<td>10</td>
									</tr>
									<tr>
										<td>4</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>100</td>
										<td>100</td>
									</tr>
									<tr>
										<td>5</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>50</td>
										<td>50</td>
									</tr>
									<tr>
										<td>6</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>10</td>
										<td>10</td>
									</tr>
									<tr>
										<td>7</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>10</td>
										<td>10</td>
									</tr>
									<tr>
										<td>8</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>50</td>
										<td>50</td>
									</tr>
									<tr>
										<td>9</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>10</td>
										<td>10</td>
									</tr>
									<tr>
										<td>10</td>
										<td>
											<a href="#"><img src="../images/avatar.jpg" class="img-circle" style="width:40px; height:40px;"/></a>
											<label style="margin-left:10px;"><a href="#">Doe</a></label>
										</td>
										<td>10</td>
										<td>10</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>