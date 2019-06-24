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
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											
										</div>
										<div class="">
											<img src="../images/no_photo.jpg" class="img-responsive center-block">
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
										<form action="/action_page.php">
											<label>Select Image</label>
											<br/>
											<input type="file" name="myFile">
											<br/>
											<label>Caption</label>
											<br/>
											<textarea style="width:100%; height:200px;"></textarea>
											<br/>
											<button type="button" class="btn btn-primary btn-flat pull-right"><span class="glyphicon glyphicon-send"></span> Post</button>
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
	</body>
</html>