<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PaintMe-Übersicht</title>
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
            $spieltagSplit = explode('-', $_SESSION['spieltag']);
             
		?>

        <style>
            input[type=checkbox]{
                accent-color: #EF560A;
            }
        </style>
	</head>
	<body>
        <div class="container-fluid">
            <div class="row p-5" style="background-image:url(Bilder/Holzbretter.jpg)">
                <div class="col-sm-2 headings">
                    Übersicht
                </div>
            </div>
            <div class="row p-5 gy-4">
                <div class=" col-sm-7 formular">
                    <div class="row p-3">
                        <form action= "feedback.php" method="post">
                            <div class="row">
                                <div class="col-12 tabellentext" style="background-color:#E3E3E3">Spieler</div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Name</div>
                                <div class="col-6"><?php echo $_SESSION ['name']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Vorname</div>
                                <div class="col-6"><?php echo $_SESSION ['vorname']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Alter</div>
                                <div class="col-6"><?php echo $_SESSION ['alter']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Straße</div>
                                <div class="col-6"><?php echo $_SESSION ['strasse']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Hausnummer</div>
                                <div class="col-6"><?php echo $_SESSION ['hausnummer']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">PLZ</div>
                                <div class="col-6"><?php echo $_SESSION ['plz']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Wohnort</div>
                                <div class="col-6"><?php echo $_SESSION ['wohnort']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Land</div>
                                <div class="col-6"><?php echo $_SESSION ['land']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Telefon/ Handy</div>
                                <div class="col-6"><?php echo $_SESSION ['tel']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Email</div> 
                                <div class="col-6"><?php echo $_SESSION ['email']?></div>
                            </div>
                            <div class="row">
                                <div class="col-12 tabellentext" style="background-color:#E3E3E3">Spieldaten und Equipment</div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Spieltag</div> 
                                <div class="col-6"><?php echo $spieltagSplit[2];?>. <?php echo $spieltagSplit[1];?>. <?php echo $spieltagSplit[0];?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Spielanfang</div> 
                                <div class="col-6"><?php echo $_SESSION ['zeit']?> Uhr</div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Markierer</div> 
                                <div class="col-6"><?php if (isset($_SESSION ['markierer'])){?>Markierer<?php } ?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Co2-Flasche</div> 
                                <div class="col-6"><?php if (isset($_SESSION ['co2flasche'])){?>Co2-Flasche<?php }?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Hopper</div> 
                                <div class="col-6"><?php if (isset($_SESSION ['hopper'])){?>Hopper<?php }?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Maske</div> 
                                <div class="col-6"><?php if (isset($_SESSION ['maske'])){?>Maske<?php }?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Keine Ausrüstung</div> 
                                <div class="col-6"><?php if (isset($_SESSION ['nichts'])){?>Ich bin komplett ausgerüstet!<?php }?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Paintmenge</div> 
                                <div class="col-6"><?php echo $_SESSION ['paint']?> Paint</div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Team</div> 
                                <div class="col-6"><?php echo $_SESSION ['team']?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 input">Spielniveau</div> 
                                <div class="col-6"><?php echo $_SESSION ['spielniveau']?> %</div>
                            </div>
                            <div class="row p-3">
                                <div class="col-sm-12 formular" style="background-color:#E3E3E3">  
                                    <div class=input>
                                        Deine Angaben bitte prüfen.<br>
                                        AGBs und Datenschutzerklärung bitte lesen, verstehen und abhaken.<br>
                                    </div>
                                    <input type="checkbox" id="agb" name="agb" onclick="enableSubmit()">
                                    <lable for="agb">Allgemeine Geschäftsbedingungen<a href="" style="color:#EF560A" target="_blank"> hier lesen</a></lable><br>
                                    <input type="checkbox" id="datenschutz" name="datenschutz" onclick="enableSubmit()">
                                    <lable for ="datenschutz">Datentschutzerklärung<a href="" style="color:#EF560A" target="_blank"> hier lesen</a></lable>
                                </div>
                            </div>
                            <div class="row p-3 gy-3 input">
                                <div class="col-sm-4 col-12">
                                    <div class="row gy-4">
                                        <div class="col-sm-12 col-12">
                                            Willst Du noch etwas ändern? Dann geh nochmal
                                        </div>
                                        <div class=" col-sm-12 col-12">                          
                                            <input type="button" class ="btn btn-dark btn-lg" onclick="location.href='equipment.php';" value="zurück">
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-sm-8 col-12">
                                    <div class="row gy-3">
                                        <div class=" col-sm-12 col-12" style="text-align: right">
                                            Ist alles vollständig? Dann geht es los mit einem Klick auf die Karnivor!
                                        </div> 
                                        <div class=" col-sm-12 col-12" style="text-align: right"> 
                                            <input id="lastsubmit" name="lastsubmit" type="image" src="Bilder/Karnivor.jpg" alt="Los geht's!" width="200" height="100" style="opacity:0.4" disabled>
                                        </div>
                                        <script>
                                            let agbs=document.getElementById("agb");
                                            let datensch=document.getElementById("datenschutz");
                                            let lastsubmit=document.getElementById("lastsubmit");
                                            
                                            function enableSubmit(){
                                                    if (agbs.checked && datensch.checked){
                                                        lastsubmit.disabled=false;
                                                        lastsubmit.style.opacity="1";
                                                    }
                                                    else{
                                                        lastsubmit.disabled=true;
                                                        lastsubmit.style.opacity="0.4";
                                                    }
                                                }
                                        </script>
                                    </div> 
                                </div>  
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="Bilder/Deckungen.png" alt="Der Deckungswall" class="formular" width="100%" height="auto">
                        </div>
                        <div class="col-sm-12">
                            <img src="Bilder/Tonnen.jpg" alt="Standup Tonnen" class="formular" width="100%" height="auto">
                        </div>
                        <div class="col-sm-12">
                            <img src="Bilder/Waldhütte.jpg" alt="Walddeckung" class="formular" width="100%" height="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

