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
		session_start();
		session_destroy();
		?>

		<style>
			input{
				font-size: 40px;
			}
			.modal {
				display: none; 
				position: fixed;
				z-index: 1;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto;
				background-color: rgb(0,0,0);
				background-color: rgba(0,0,0,0.5);
			}

			.modal-content {
				background-color: #FFFFFF;
				margin: 5% auto;
				padding: 20px;
				border: 5px solid #EF560A;
				width: 55%;
				text-align:center;
				font-family: Copperplate, Papyrus, fantasy;
			}

			.modal-button{
				border: 2px solid #EF560A;
				border-radius: 8px;
				width: 100%;
				height: auto;
				background-color: #EF560A;
				opacity: 0.8;
				color: #FFFFFF;	
			}

			.modal-button:hover,
			.modal-button:focus{
				background-color: #EF560A;
				opacity:1;
				cursor: pointer;
			}

			.close {
				color: #EF560A;
				opacity: 0.7;
				float: center;
				font-size: 40px;
				font-weight: bold;
			}

			.close:hover,
			.close:focus {
				color: #EF560A;
				opacity:1;
				text-decoration: none;
				cursor: pointer;
			}

			.button-text{
				font-size: 150%;
			}
		</style>
	</head>
	<body>
	<!--Modal-1-Anfang-->
		<div id="myModal1" class="modal">
			<div class="modal-content">
				<div class="row">	
					<div class="col-sm-8 offset-sm-2 headings">
						Wir verwenden Cookies...
					</div>
					<div class="col-sm-1 offset-sm-1">
						<span class="close">&times;</span>
					</div>
				</div>
				<div class="row">
					<div class="col p-3 button-text">
						...und Du entscheidest, welche wir setzen dürfen.
					</div>
				</div>
				<div class="row gy-3">
					<div class="col-md-4">
						<div class="row row-cols-1 gx-3 formular">
							<div class="col p-3">
								<input type="submit" class ="modal-button" name="submitKC" value="Keine Cookies">
							</div>
							<div class="col p-3">
								<div class="button-text">
									Wir werden keine persönlichen Daten speichern.
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row row-cols-1 gx-3 formular">
							<div class="col p-3">
								<input type="button" id="myBtn2" onclick="location.href='#myModal2';" class ="modal-button" value="Manche Cookies">
							</div>
							<div class="col p-3">
								<div class="button-text">
									Wir zeigen Dir, welche Cookies wir verwenden. Du kannst sie an- und abwählen.
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row row-cols-1 gx-3 formular">
							<div class="col p-3">
								<input type="submit" class ="modal-button" name="submitAC" value="Alle Cookies">
							</div>
							<div class="col p-3">
								<div class="button-text">
									Wir werden Dir auf unserer Seite individuellen Support bieten können.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--Modal-1-Ende-->	

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

<!--Modal-1-Trigger-->
		<div class="col-sm-4 offset-sm-4 input">
			<button id="myBtn" class ="btn btn-dark btn-lg">Unser Cookie-Buffet</button>
		</div>
<!--Modal-1-Trigger-Ende-->

			</div>
			<div class="row" style="background-image:url(Bilder/unteresBildPark.png)">
				<br><br>
			</div>
		</div>

		<script>
			var modal = document.getElementById("myModal1");
			var btn = document.getElementById("myBtn");
			var span = document.getElementsByClassName("close")[0];

			btn.onclick = function() {
				modal.style.display = "block";
			}

			span.onclick = function() {
				modal.style.display = "none";
			}

			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
	</body>
</html>