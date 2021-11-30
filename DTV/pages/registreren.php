<?php
include('header.php');
$info = "";
// deze database is voor het maken en testen. kan weg
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";
$charset = "utf8mb4";
//maakt de connectie aan 
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo $_POST['postcode2'];
if (isset($_POST['voornaam']) && isset($_POST['tussen']) && isset($_POST['achternaam']) && isset($_POST['straatnaam']) && isset($_POST['huisnummer']) && isset($_POST['plaatsnaam']) && isset($_POST['postcode1']) && isset($_POST['postcode2']) && isset($_POST['geboortedatum']) && isset($_POST['geslacht']) && isset($_POST['email']) && isset($_POST['telefoon']) && isset($_POST['wachtwoord']) && isset($_POST['wachtwoordherhalen'])) {
    $voornaam =   str_replace(' ', '', $_POST['voornaam']);
    $tussen =     str_replace(' ', '', $_POST['tussen']);
    $achternaam = str_replace(' ', '', $_POST['achternaam']);
    $plaatsnaam = $_POST['plaatsnaam'];
    $postcode1 =   str_replace(' ', '', $_POST['postcode1']);
    $postcode2 =   str_replace(' ', '', $_POST['postcode2']);
    $geslacht =   str_replace(' ', '', $_POST['geslacht']);
    $email =      str_replace(' ', '', $_POST['email']);
    $wachtwoord = str_replace(' ', '', $_POST['wachtwoord']);
    $wachtwoordherhalen = str_replace(' ', '', $_POST['wachtwoordherhalen']);
    $straatnaam = $_POST['straatnaam'];
    $huisnummer = $_POST['huisnummer'];
    $geboortedatum = $_POST['geboortedatum'];
    $telefoonnummer = $_POST['telefoon'];
    $accountrol = "aangemeld";
    $wachtwoord = md5($wachtwoord);
    $wachtwoordherhalen = md5($wachtwoordherhalen);

    if(preg_match('/[^a-zA-Z]/', $voornaam) == false)
    {
        if(preg_match('/[^a-zA-Z]/', $tussen) == false)
        {
            if(preg_match('/[^a-zA-Z]/', $achternaam) == false)
            {
                if(preg_match('/[^a-zA-Z]/', $plaatsnaam) == false)
                {
                    if(preg_match('/[^a-zA-Z]/', $geslacht) == false)
                    {
                        if(preg_match('/[^a-zA-Z]/', $straatnaam) == false)
                        {
                                if (preg_match("/^\d+$/", $telefoonnummer)) {
                                    $maxleeftijd = (date("Y")-100);
                                        $minleeftijd = (date("Y")-10);
                                        
                                        $date = DateTime::createFromFormat("Y-m-d", $geboortedatum);
                                        $date = $date->format("Y");
                                        if ($date > $maxleeftijd && $date < $minleeftijd) {
                                            if (strlen($postcode1)==4 && strlen($postcode2) == 2 && preg_match("/^\d+$/", $postcode1) &&  preg_match('/[^a-zA-Z]/', $postcode2)== false) {
                                                $geboortedatum = date("Y-m-d", strtotime($geboortedatum));
                                                $postcode = $postcode1 . $postcode2;
                                                $zoekNaarDubbel = $pdo->prepare("SELECT * FROM accounts WHERE email=?");
                                                $zoekNaarDubbel->bindParam(1, $_POST['email']);
                                                $zoekNaarDubbel->execute();
                                                if ($zoekNaarDubbel->rowCount() == 0) {
                                                    if ($wachtwoord == $wachtwoordherhalen) {
                                                        if (strlen($wachtwoord) <= 8) {
                                                            $info = "uw wachtwoord moet minstens 8 tekens zijn";
                                                        } else {
                                                            $insert = $pdo->prepare("INSERT INTO accounts (wachtwoord, naam_voor, naam_tussen, naam_achter, adres_straat_naam, adres_straat_nummer, adres_plaats_postcode, adres_plaats_naam, geboorte_datum, geslacht, email, telefoon, account_rol) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                            $insert->bindParam(1, $wachtwoord);
                                                            $insert->bindParam(2, $voornaam);
                                                            $insert->bindParam(3, $tussen);
                                                            $insert->bindParam(4, $achternaam);
                                                            $insert->bindParam(5, $straatnaam);
                                                            $insert->bindParam(6, $huisnummer);
                                                            $insert->bindParam(7, $postcode);
                                                            $insert->bindParam(8, $plaatsnaam);
                                                            $insert->bindParam(9, $geboortedatum);
                                                            $insert->bindParam(10, $geslacht);
                                                            $insert->bindParam(11, $email);
                                                            $insert->bindParam(12, $telefoonnummer);
                                                            $insert->bindParam(13, $accountrol);
                                                            $insert->execute();
                                                            if (headers_sent()) {
                                                                die("Redirect failed. Please click on this link: <a href=../pages/inloggen.php");
                                                            }
                                                            else{
                                                                exit(header("location:inloggen.php"));
                                                            }
                                                            $info = "Gelukt. U moet nog wel toegevoegd worden door de club";
                                                        }
                                                    } else {
                                                        $info = "uw wachtwoorden komen niet overeen ";
                                                    }
                                                } else {
                                                    $info = "email is al in gebruik";
                                                }
                                            } else {
                                                $info = "postcode klopt niet";
                                            }
                                        }else{
                                            $info = "geboorte datum niet mogenlijk";
                                        }
                                }else
                                {
                                    $info = "telefoonnummer mag alleen cijfers"; 
                                }
                        }else
                        {
                            $info = "straatnaam mag alleen letters bevatten";
                        } 
                    }else
                    {
                        $info = "geslacht mag alleen letters bevatten";
                    }   
                }else
                {
                    $info = "plaatsnaam mag alleen letters bevatten";
                }
            }else
            {
                $info = "achternaam mag alleen letters bevatten";
            }
        }else
        {
            $info = "tussenvoegsel mag alleen letters bevatten";
        }
    }else
    {
        $info = "voornaam mag alleen letters bevatten";
    }
    
} else {
    $info = "niet alles ingevuld";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
    <link rel="stylesheet" href="../css/inloggen.css">
    <style>
        .btninloggen {
            background-color: lightgray;
            border: 1px solid lightgray;
        }

        .btninloggen:hover {
            border: 1px solid black;
        }

        .btnregistreren {
            background-color: white;
            border: 1px solid white;
        }

        .btnregistreren:hover {
            border: 1px solid black;
        }

        .buttonInloggen {
            margin-top: 0px;
        }

        #huisnummer, #postcode2 {
            padding-left: 0px;
            width: 14%;
            text-align: center;
        }
        
        #postcode1, #straatnaam{
            text-align: center; 
            width: 46%;
        }
        #voornaam,#tussen,#achternaam,#plaatsnaam,#geboortedatum,#geslacht,#email,#telefoonummer,#wachtwoord,#wachtwoordherhalen {
            text-align: center;
            width: 60%;
        }
        .site-footer{
            position: fixed;
        }
    </style>
</head>

<body>


    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="cont">
            <div class="login">
                <br>
                <hr>
                <a href="inloggen.php"><button class="btninloggen">inloggen</button></a>
                <a href="registreren.php"><button class="btnregistreren">registreren</button></a>
                <form action="registreren.php" method="POST">


                <input value="<?php if(isset($_POST["voornaam"])) echo $_POST["voornaam"]; ?>" type="text" id="voornaam" name="voornaam" placeholder="voornaam"><br>
                <input value="<?php if(isset($_POST["tussen"])) echo $_POST["tussen"]; ?>" type="text" id="tussen" name="tussen" placeholder="tussenvoegsel"><br>
                <input value="<?php if(isset($_POST["achternaam"])) echo $_POST["achternaam"]; ?>" type="text" id="achternaam" name="achternaam" placeholder="achternaam"><br>
                <input value="<?php if(isset($_POST["straatnaam"])) echo $_POST["straatnaam"]; ?>" type="text" id="straatnaam" name="straatnaam" style="text-align: center" placeholder="straatnaam">
                <input value="<?php if(isset($_POST["huisnummer"])) echo $_POST["huisnummer"]; ?>" type="text" id="huisnummer" name="huisnummer" placeholder="2A"><br>
                <input value="<?php if(isset($_POST["plaatsnaam"])) echo $_POST["plaatsnaam"]; ?>" type="text" id="plaatsnaam" name="plaatsnaam" placeholder="plaatsnaam"><br>
                <input value="<?php if(isset($_POST["postcode1"])) echo $_POST["postcode1"]; ?>" type="text" id="postcode1" name="postcode1" placeholder="1234"> 
                <input value="<?php if(isset($_POST["postcode2"])) echo $_POST["postcode2"]; ?>" type="text" id="postcode2" name="postcode2" placeholder="ab"> 
                <input value="<?php if(isset($_POST["geboortedatum"])) echo $_POST["geboortedatum"]; ?>" type="date" id="geboortedatum" name="geboortedatum"> <br>
                <input value="<?php if(isset($_POST["geslacht"])) echo $_POST["geslacht"]; ?>" type="text" id="geslacht" name="geslacht" placeholder="geslacht"><br>
                <input value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" type="email" id="email" name="email" placeholder="email@email.com"><br>
                <input value="<?php if(isset($_POST["telefoon"])) echo $_POST["telefoon"]; ?>" type="text" id="telefoonummer" name="telefoon" placeholder="06 12345678"><br>
                <input value="<?php if(isset($_POST["wachtwoord"])) echo $_POST["wachtwoord"]; ?>" type="password" id="wachtwoord" name="wachtwoord" placeholder="wachtwoord" minlength="8"><br>
                <input value="<?php if(isset($_POST["wachtwoordherhalen"])) echo $_POST["wachtwoordherhalen"]; ?>" type="password" id="wachtwoordherhalen" name="wachtwoordherhalen" placeholder="herhaal wachtwoord" minlength="8"><br>

                    <div class="inloggen_Info">
                        <h2><?php echo $info ?></h2>
                    </div>
                    <input type="submit" value="regristreren" class="buttonInloggen">
                </form>

            </div>


    </section>


    <?php
    include('footer.php');
    ?>
</body>

</html>