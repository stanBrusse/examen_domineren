<?php 
include('header.php');

  $stmtB = $pdo->prepare("SELECT * FROM `banen`");
  $stmtB->execute();
  $resultBan = $stmtB;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banen</title>
    <style>        
        table, th{
            background-color: gray;
            border: 4px solid black;    
        }
        tr, td{
            color: white;
            border: 3px solid black;    
        }
        .content{
            margin-top: 100px;
            line-height: 1;       
        }
    </style>
</head>
<body>
<section class="content">
<a style="border: 1px solid black; padding:3px;" href="banen.php">Terug</a>
<h1><?php echo $_GET['dag'] . " " . $_GET['date']; ?></h1>
<?php 
$date = $_GET["date"];
$sql = $pdo->prepare("SELECT * FROM reservatie_baan WHERE lid_nummer=? AND datum=?");
$sql->bindParam(1, $_SESSION['lidnummer']);
$sql->bindParam(2, $date);
$sql->execute();
$results = $sql->fetch();
    if (isset($results["nummer"])){
        echo "<p>U heeft op deze dag al een baan gereserveerd</p>";
    }

?>
<head>
<link rel="stylesheet" href="../css/test.css">
</head>
<table border="black 1px" align="center" cellpadding="5px">

  <thead>
    <tr>
      <?php
      echo "<th colspan='2'>Tijd</th>";
      while ($baan = $resultBan->fetch()) {  ?>
        <th colspan="2">Baan <?php echo $baan["nummer"]; ?> (<?php echo $baan["soort"]; ?>)</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php
$t = 1200; 
$tijd = 1200; 
$datum = $_GET["date"];
while($tijd != 2300) {
  ?>
      <tr>

        <td colspan="2"><?php 
        $t += 100;
        $stringTijd = strval($tijd);
        $stringTijd2 = strval($t);
        echo $stringTijd[0] . $stringTijd[1] . ":00 - ". $stringTijd2[0] . $stringTijd2[1] . ":00"; ?></td>
        <?php

        $stmtB = $pdo->prepare("SELECT * FROM `banen`");
        $stmtB->execute();
        $resultBan = $stmtB; 
        while ($baan = $resultBan->fetch()) {

          $stmtA = $pdo->query("SELECT * FROM `reservatie_baan` WHERE `baan_nummer`=" . $baan["nummer"] . " AND `tijd_Begin`='". $tijd ."' AND `datum`='" . $_GET['date'] . "'");
          $resultRes = $stmtA->fetch();

          if ($resultRes) {
            $r_datum = $resultRes["datum"];
            $r_baan_nummer = $resultRes["baan_nummer"];
            $r_tijd_Begin = $resultRes["tijd_Begin"];
            $r_tijd_Eind = $resultRes["tijd_Eind"];
            $r_lid_nummer = $resultRes["lid_nummer"];
          } else {
            $r_datum = null;
            $r_baan_nummer = null;
            $r_tijd_Begin = null;
            $r_tijd_Eind = null;
            $r_lid_nummer = null;
          }
          if ($r_baan_nummer == $baan["nummer"]) {
            if ($resultRes["lid_nummer"] == $_SESSION['lidnummer']) { ?>
            <td colspan='2' style="background-color: orange;">Gereserveerd</td> <?php            
            } else { ?>
              <td colspan='2' style="background-color: red;">Gereserveerd</td> <?php
            } 
          } else { ?>
            <td colspan='2' style="background-color: greenyellow;"><a href="baan.php?dag=<?php echo $_GET['dag']; ?>&baan=<?php echo $baan["nummer"]; ?>&date=<?php echo $datum; ?>&begintijd=<?php echo $tijd; ?>&eindtijd=<?php echo $t; ?>">Beschikbaar</a></td> <?php 
          }

        } ?>
      </tr>
    <?php $tijd = $tijd + 100; } ?>
  </tbody>
</table>

<?php $pdo = null; ?>
            </section>
<?php 
include('footer.php');
?>
</body>
</html>