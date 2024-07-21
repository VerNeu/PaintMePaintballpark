<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PaintMe-Reservierung</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

        <?php
			session_start();
            if (isset($_POST['submit'])) {
                foreach ($_POST as $key => $value) {
                    $_SESSION [$key] = trim($value);
                }   
            }    
		?>
        <style>
            input[type=range] {
                width: 220px;
                accent-color: #EF560A;
            }

            input[type=radio]{
                accent-color: #EF560A;
            }
            
            input[type=checkbox]{
                accent-color: #EF560A;
            }
        </style>
	</head>
	<body>
        <div class="container-fluid">
            <div class="row p-5" style="background-image:url(Bilder/Holzbretter.jpg)">
                <div class="col-sm-4 headings">
                    Spieldaten und Equipment
                </div>
            </div>
            <div class="row p-5 gy-4 ">
                <div class="col-sm-7 formular">
                    <div class="row p-3">
                        <form id="equipment" action="checkData.php" method="post">
                                <lable class="input" for="spieltag">Wann willst Du spielen?*</lable><br>
                                <input type="date" id="spieltag" name="spieltag" <?php if (isset($_SESSION['spieltag'])) { ?>value="<?php echo $_SESSION['spieltag']?>"<?php } ?> required><br><br>

                                <script>
                                        let date = new Date();
                                        let valdate = date.toISOString().split('T')[0];
                                        console.log(valdate);
                                        document.getElementById("spieltag").min = valdate;
                                </script>

                                <lable class="input" for="zeit">Um wiviel Uhr willst du anfangen?*</lable><br>
                                <input type="time" id ="zeit" name="zeit"<?php if (isset($_SESSION['zeit'])) { ?>value="<?php echo $_SESSION['zeit']; ?>"<?php } ?> required><br><br>

                                <div class="input">Was willst du an Ausrüstung ausleihen?</div>
                                <input type="checkbox" id="markierer" name="markierer" onclick="delNichts()"<?php if( isset($_SESSION['markierer'])) {?>checked<?php } ?>>
                                <lable for="markierer">Markierer</lable><br>
                                <input type="checkbox" id="co2flasche" name="co2flasche" onclick="delNichts()"<?php if( isset($_SESSION['co2flasche'])) {?>checked<?php } ?>>
                                <lable for="co2flasche">Co2-Flasche</lable><br>
                                <input type="checkbox" id="hopper" name="hopper" onclick="delNichts()"<?php if( isset($_SESSION['hopper'])) {?>checked<?php } ?>>
                                <lable for="hopper">Hopper</lable><br>
                                <input type="checkbox" id="maske" name="maske" onclick="delNichts()"<?php if( isset($_SESSION['maske'])) {?>checked<?php } ?>>
                                <lable for="maske">Maske</lable><br>
                                <input type="checkbox" id="nichts" name="nichts" onclick="delEquips()"<?php if( isset($_SESSION['nichts'])) {?>checked <?php } ?>>
                                <lable for="nichts">Nein, danke, ich habe alles!</lable><br><br>

                                <script>
                                    let nichts = document.getElementById("nichts");
                                    let markierer = document.getElementById("markierer");
                                    let co2flasche = document.getElementById("co2flasche");
                                    let hopper = document.getElementById("hopper");
                                    let maske = document.getElementById("maske");
                                    
                                    let equips = [markierer, co2flasche, hopper, maske];

                                    function delNichts(){
                                        nichts.checked = false;
                                    }

                                    function delEquips(){
                                        equips.forEach(uncheckEquip);
                                    }
                                    function uncheckEquip(item) {
                                        item.checked = false;
                                    }   
                                </script>

                                <lable class="input" for="paint">Reserviere Dir Paint!<br>Wähle wieviel Schuss du brauchst:</lable><br>
                                <select id="paint" name="paint" style="width:220px">
                                        <option value="500" <?php if (!empty($_SESSION['paint']) && $_SESSION['paint'] == '500'){ ?>selected<?php } ?>>500 Paint (1 Beutel)</option> 
                                        <option value="1000" <?php if (!empty($_SESSION['paint']) && $_SESSION['paint'] == '1000'){ ?>selected<?php } ?>>1000 Paint (2 Beutel)</option>
                                        <option value="2000" <?php if (empty($_SESSION['paint']) || $_SESSION['paint'] == '2000'){ ?>selected<?php } ?>>2000 Paint (1 Kiste)</option>
                                        <option value="4000" <?php if (!empty($_SESSION['paint']) && $_SESSION['paint'] == '4000'){ ?>selected<?php } ?>>4000 Paint (2 Kisten)</option>
                                        <option value="8000"<?php if (!empty($_SESSION['paint']) && $_SESSION['paint'] == '8000'){ ?>selected<?php } ?>>8000 Paint (4 Kisten)</option>
                                        <option value="0"<?php  if (!empty($_SESSION['paint']) && $_SESSION['paint'] == '0'){ ?>selected<?php } ?>>Nein danke, ich habe noch Paint.</option>
                                </select><br><br>

                                <div class="input">Weißt Du schon in welchem Team Du spielen willst?</div>
                                <input type="radio" id ="rot" name="team" value="rot" <?php if (!empty($_SESSION['team']) && $_SESSION['team'] == 'rot') { ?>checked<?php } ?> >
                                <lable for="rot">Rot</lable><br>
                                <input type="radio" id="gelb" name="team" value="gelb"<?php if (!empty($_SESSION['team']) && $_SESSION['team'] == 'gelb') { ?>checked<?php } ?> >
                                <lable for="gelb">Gelb</lable><br>
                                <input type="radio" id="blau" name="team" value="blau"<?php if (!empty($_SESSION['team']) && $_SESSION['team'] == 'blau') { ?>checked<?php } ?> >
                                <lable for= "blau">Blau</lable><br>
                                <input type="radio" id ="gruen" name="team" value="gruen"<?php if (!empty($_SESSION['team']) && $_SESSION['team'] == 'gruen') { ?>checked<?php } ?> >
                                <lable for= "gruen">Grün</lable><br>
                                <input type="radio" id ="egal" name="team" value="egal"<?php if (empty($_SESSION['team']) || $_SESSION['team'] == 'egal') { ?>checked<?php } ?> >
                                <lable for= "egal">Egal welches Team</lable><br><br>

                                <div class="input">Wie schätzt Du Dein Spielniveau ein?</div>
                                <input type="range" id="spielniveau" name="spielniveau" min="0" max="100" <?php if (isset($_SESSION['spielniveau'])) { ?>value="<?php echo $_SESSION['spielniveau']?>"<?php } ?>><br>
                                <lable for="spielniveau">von Newbee (0%) bis Pro (100%)</lable><br>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-7 input">  
                            Felder mit * bitte ausfüllen
                        </div>
                    </div>
                    <div class="row p-3 input">
                        <div class=" col">
                            <input type="button" class ="btn btn-dark btn-lg" onclick="location.href='personalia.php';" value="zurück">
                        </div>
                        <div class=" col" style="text-align: right">
                            <input type="submit" class ="btn btn-dark btn-lg" name= "submit" value="weiter">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-5">
                    <img src="Bilder/Ausrüstung835.png" alt="Ausrüstung" class="formular" width="100%" height="auto">
                </div>
            </div>
        </div>
    </body>
</html>

