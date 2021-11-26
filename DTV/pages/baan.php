<?php
include('../php/db.php');

$baan = $_GET['baan'];
$date = $_GET['date'];
$begintijd = $_GET['begintijd'];
$eindtijd = $_GET['eindtijd'];
$stringTijd = strval($begintijd);
$stringTijd2 = strval($eindtijd);

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dtv";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmtB = $pdo->query('SELECT * FROM `banen` WHERE nummer = ' .$baan .'');
$stmtB->execute();
$result = $stmtB;
?>
<!DOCTYPE html>
<html>
</div>

<head>
    <meta charset="utf-8">
    <title>Banen Onderhoud</title>
    <link rel="stylesheet" href="../css/banen_admin.css">
</head>

<body>
    <?php include('header.php'); ?>
<a style="border: 1px solid black; padding:3px;" href="banen.php">Terug</a>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  $stmtA = "INSERT INTO `reservatie_baan` (nummer, datum, baan_nummer, tijd_Begin, tijd_Eind, lid_nummer) VALUES (?, ?, ?, ?, ?, ?)";
  $pdo->prepare($stmtA)->execute([NULL, $date, $baan, $begintijd, $eindtijd, 1]);
  echo "<p>Reservatie is geslaagd!</p>";
  $_SERVER["REQUEST_METHOD"] = "GET";
}  ?>
    <section>
                <?php while ($baan = $result->fetch()) { ?>
                        <?php echo "<h3>" . $baan['soort'] . " : " . $baan['code'] . "</h3>"?>
                        <?php echo "Ligging: " . $baan['ligging'] . "<br>"?>
                        <?php echo "Lengte baan: " . $baan['afmeting_lengte'] . "<br>"?>
                        <?php echo "Breedte baan: " . $baan['afmeting_breedte'] . "<br>"?>
                        <?php echo "Vloer: " . $baan['vloer'] . "<br><br>"?>
                        <?php } ?>
                        <?php echo "Wilt u deze baan reserveren op " . $date . " van " . $stringTijd[0] . $stringTijd[1] . ":00 tot ". $stringTijd2[0] . $stringTijd2[1] . ":00?<br><br>";?>
                        <form method="POST"><input type="submit" value="Reserveren"></form>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>