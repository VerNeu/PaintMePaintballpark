<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PaintMe-Registrierung</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

        <?php
			session_start();
		?>
	</head>
	<body>
        <div class="container-fluid">
            <div class="row p-5" style="background-image:url(Bilder/Holzbretter.jpg)">
                <div class="col-sm-2 headings">
                    Spieler
                </div>
            </div>
            <div class="row p-5 gy-4">
                <div class="col-sm-7 formular">
                    <div class="row p-3">
                            <form id ="person" action= "equipment.php" method= "post">
                                <lable for="name" class="input"> Name:* </lable><br>
                                <input type="text" id ="name" name = "name" value= "<?php echo isset($_SESSION['name'])  ? $_SESSION['name'] : NULL; ?>" required><br><br>

                                <lable for ="vorname" class="input"> Vorname:* </lable><br>
                                <input type="text" id = "vorname" name= "vorname" value= "<?php echo isset($_SESSION['vorname']) ? $_SESSION['vorname'] : NULL; ?>" required><br><br>

                                <lable for="alter" class="input"> Alter:* </lable><br>
                                <input type="number" id = "alter" name="alter" min="18" value= "<?php echo isset($_SESSION['alter']) ? $_SESSION['alter'] : NULL; ?>" required><br><br>

                                <lable for="strasse" class="input">Straße:* </lable><br>
                                <input type="text" id="strasse" name="strasse" value= "<?php echo isset($_SESSION['strasse']) ? $_SESSION['strasse'] : NULL; ?>" required><br><br>
                                
                                <lable for="hausnummer" class="input">Hausnummer:* </lable><br>
                                <input type="text" id="hausnummer" name="hausnummer" value= "<?php echo isset($_SESSION['hausnummer']) ? $_SESSION['hausnummer'] : NULL; ?>" required><br><br>
                    
                                <lable for="plz" class="input">PLZ:* </lable><br>
                                <input type="text" id="plz" name="plz" value= "<?php echo isset($_SESSION['plz']) ? $_SESSION['plz'] : NULL; ?>" required><br><br>

                                <lable for="wohnort" class="input">Wohnort:* </lable><br>
                                <input type="text" id="wohnort" name="wohnort"  value= "<?php echo isset($_SESSION['wohnort']) ? $_SESSION['wohnort'] : NULL; ?>" required><br><br>

                                <lable for="land" class="input">Land: </lable><br>
                                <input type="text" id="land" name="land" value= "<?php echo isset($_SESSION['land']) ? $_SESSION['land'] : NULL; ?>" ><br><br>

                                <lable for="tel" class="input">Telefon/ Handy: </lable><br>
                                <input type="text" id="tel" name="tel"  value= "<?php echo isset($_SESSION['tel']) ? $_SESSION['tel'] : NULL; ?>"><br><br>

                                <lable for="email" class="input">Email:* </lable><br>
                                <input type="email" id="email" name="email" placeholder="du@pc.de" value= "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : NULL; ?>" required><br>
                            
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-7 input">  
                            Felder mit * bitte ausfüllen
                        </div>
                    </div>
                    <div class="row p-3 input">
                        <div class="col">
                            <input type="button" class ="btn btn-dark btn-lg" onclick="location.href='index.php';" value="zurück">
                        </div>
                        <div class="col" style="text-align: right"> 
                            <input type="submit" class ="btn btn-dark btn-lg" name= "submit" value="weiter">
                        </div>
                            </form>
                    </div>
                </div>
                <div class="col-sm-5">
                    <img src="Bilder/Spieler1060.png" alt="Painballspieler" class="formular" width="100%" height="auto">
                </div>
            </div>
        </div>
    </body>
</html>

