<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Willkommen im PaintMe Paintballpark</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

		<?php
		//session_destroy();
		session_start();
		?>

		<style>
			
		</style>
		
	</head>
	<body>
		<div class="container-fluid indexSite">
			<div class="row gy-3 p-3" style="background-image: url(Bilder/Holzbretter.jpg)">
				<div class="col-sm-6 offset-sm-3 headings">
					Willkommen im
				</div>
				<div name="Logo" class="col-sm-4 offset-sm-4">
					<img src="Bilder/LogopapierKlein.png" alt="PaintMe Paintballpark" class="responsive">
				</div>
			</div>
			<div class="row" style="background-image:url(Bilder/MittelBildPark.jpg)">
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			<div class="row gy-3 p-5" style="background-image:url(Bilder/Holzwand2.jpg)">
				<div class="col-sm-4 offset-sm-4 headings">
					Bitte vorher
				</div>
				<div class="col-sm-4 offset-sm-4 input">
					<a href="personalia.php"><button class ="btn btn-dark btn-lg">Registrieren!</button></a>
				</div>
			</div>
			<div class="row" style="background-image:url(Bilder/unteresBildPark.png)">
				<br><br>
			</div>
		</div>
	</body>
</html>