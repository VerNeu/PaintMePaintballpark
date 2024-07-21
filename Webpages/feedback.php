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
           
            $db = new mysqli ("localhost", "verena", "edhellen7 7", "paintmepaintballpark");
            $db->set_charset("utf8");
            
            if (isset($_POST['lastsubmit_y'])){
                $db->begin_transaction();  
                $anzErfolg = 0;
    
                $player = $db->prepare("INSERT INTO player (lastname, firstname, age, street, housenumber, postalcode, city, country, phonenumber, emailaddress) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $player->bind_param(
                    'ssisssssss', 
                    $_SESSION['name'], 
                    $_SESSION['vorname'],
                    $_SESSION['alter'],
                    $_SESSION['strasse'],
                    $_SESSION['hausnummer'],
                    $_SESSION['plz'],
                    $_SESSION['wohnort'],
                    $_SESSION['land'],
                    $_SESSION['tel'],
                    $_SESSION['email']
                );
                $result = $player->execute();
                $insertID = $db->insert_id;
                if ($result){
                    $anzErfolg ++;
                }
                else{
                    $db->rollback();
                }
    
                $gameday = $db->prepare("INSERT IGNORE INTO gameday (date) VALUES (?)");
                $gameday->bind_param(
                    's',
                    $_SESSION['spieltag']
                );
                $result = $gameday->execute();
                if ($result){
                    $anzErfolg ++;
                }
                else{
                    $db->rollback();
                }
    
                $markierer = !empty($_SESSION['markierer'])? 1 : 0;
                $co2flasche = !empty($_SESSION['co2flasche'])? 1 : 0;
                $hopper = !empty($_SESSION['hopper'])? 1 : 0;
                $maske = !empty($_SESSION['maske'])? 1 : 0;
                $nichts = !empty($_SESSION['nichts'])? 1 : 0;
                    
                $player_gameday = $db->prepare("INSERT INTO player_gameday (playerID, date, time, marker, co2tank, hopper, mask, noequip, paints, team, playerskills) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $player_gameday->bind_param(
                    'issiiiiiisi',
                    $insertID, 
                    $_SESSION['spieltag'],
                    $_SESSION['zeit'],
                    $markierer,
                    $co2flasche,
                    $hopper,
                    $maske,
                    $nichts,
                    $_SESSION['paint'],
                    $_SESSION['team'],
                    $_SESSION['spielniveau']
                );
                $result = $player_gameday->execute();
                if ($result){
                    $anzErfolg ++;
                    $db->commit();
                }
                else{
                    $db->rollback();  
                } 
            }    
        ?>
		
	</head>
	<body>
		<div class="container-fluid indexSite">
			<div class="row gy-3 p-3" style="background-image: url(Bilder/Holzbretter.jpg)">
                <?php 
                    if ($anzErfolg == 3){
                ?>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 headings">
                                Bis bald im PaintMe Paintballpark!
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3" style="font-size:150%; font-family: Copperplate, Papyrus, fantasy">
                                Hallo <?php echo $_SESSION['vorname'] ?>!<br>
                                Du hast Deine Registrierung erfolgreich abgeschlossen.<br>
                                Wir freuen uns darauf, Dich bald zu sehen.<br>
                            </div>
                        </div>
                    <?php
                    session_destroy();
                    }
                    else{
                    ?>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 headings">
                                Es tut uns leid!
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3" style="font-size:150%; font-family: Copperplate, Papyrus, fantasy">
                                Hallo <?php echo $_SESSION['vorname'] ?>!<br>
                                Es tut uns leid, anscheinend konnten nicht alle Daten erfasst werden.<br>
                                Bitte registriere Dich noch einmal<br>
                                <a href="personalia.php"><button class ="btn btn-dark btn-lg">hier</button></a>
                            </div>
                        </div>
                    <?php
                    session_destroy();
                        }
                    ?>
		    </div>
			<div class="row" style="background-image:url(Bilder/MittelBildPark.jpg)">
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			<div class="row gy-3 p-5" style="background-image:url(Bilder/Holzwand2.jpg)">
            <?php 
                    if ($anzErfolg == 3){
                ?>
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4" style="font-size:150%; font-family: Copperplate, Papyrus, fantasy">
                            Wenn Du noch einen Platz reservieren willst,
                            dann kommst Du hier nochmal zum <br>
                            <a href="personalia.php"><button class ="btn btn-dark btn-lg">Formular</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4" style="font-size:150%; font-family: Copperplate, Papyrus, fantasy">
                            Viele Grüße von Deinem
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 offset-sm-5">
                            <img src="Bilder/LogopapierKlein.png" alt="PaintMe-Team" class="responsive">
                        </div>
                    </div>
                <?php
                    }
                ?>	
			</div>
			<div class="row" style="background-image: url(Bilder/unteresBildPark.png)">
				<br><br>
			</div>
		</div>
	</body>
</html>