<?php
include('../php/db.php');

$baan = $_GET['baan'];
$date = $_GET['date'];
$begintijd = $_GET['begintijd'];
$eindtijd = $_GET['eindtijd'];
$stringTijd = strval($begintijd);
$stringTijd2 = strval($eindtijd);

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
<a style="border: 1px solid black; padding:3px;" href="banenreserveren.php?dag=<?php echo $_GET["dag"]; ?>&date=<?php echo $date; ?>">Terug</a>
    <?php
if ($_SESSION['rol'] != "aangemeld" && $_SESSION['loggedIn'] == true) {
} else {
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
    } else {
        exit(header("location:index.php"));
    }
}
$sql = $pdo->prepare("SELECT * FROM reservatie_baan WHERE lid_nummer=? AND datum=?");
$sql->bindParam(1, $_SESSION['lidnummer']);
$sql->bindParam(2, $date);
$sql->execute();
$results = $sql->fetch();
    if (isset($results["nummer"])){
        echo "<p>U heeft op deze dag al een baan gereserveerd</p>";
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($results["nummer"])){
            echo "<p>U heeft al een baan gereserveerd op deze dag</p>";
        } else {
            $stmtA = "INSERT INTO `reservatie_baan` (nummer, datum, baan_nummer, tijd_Begin, tijd_Eind, lid_nummer) VALUES (?, ?, ?, ?, ?, ?)";
            $pdo->prepare($stmtA)->execute([NULL, $date, $baan, $begintijd, $eindtijd, $_SESSION['lidnummer']]);
            echo "<p>Reservatie is geslaagd!</p>";
        }
    $_SERVER["REQUEST_METHOD"] = "GET";
}  

?>
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