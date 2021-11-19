<?php 
//dit is om te testen. kan weg als er een nieuwe database is
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "examen";
    $charset = "utf8mb4";

    //maakt de connectie aan 
    $dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['zoek'])){
        $zoek = $_POST['zoek'];
        $order = "Lidnr";
        $zoek = "%". $zoek . "%";
        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE Naam_Voor LIKE? ORDER BY $order");
        $selecteerLeden->bindParam(1, $zoek);
        $selecteerLeden->execute();
        if ($selecteerLeden->rowCount() == 0) {
            $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE Naam_Achter LIKE?  ORDER BY $order");
            $selecteerLeden->bindParam(1, $zoek);
            $selecteerLeden->execute();
            if ($selecteerLeden->rowCount() == 0) {
                $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE Email LIKE?  ORDER BY $order");
                $selecteerLeden->bindParam(1, $zoek);
                $selecteerLeden->execute();
                if ($selecteerLeden->rowCount() == 0) {
                    $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE Adres_Plaats_naam LIKE?  ORDER BY $order");
                    $selecteerLeden->bindParam(1, $zoek);
                    $selecteerLeden->execute();
                    if ($selecteerLeden->rowCount() == 0) {
                        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE Telefoon LIKE? ORDER BY $order");
                        $selecteerLeden->bindParam(1, $zoek);
                        $selecteerLeden->execute();
                    }
                }
            }
        }
        

    }else{
        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts ORDER BY Lidnr"); 
        $selecteerLeden->execute();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leden</title>
<style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;

}
th{
    background-color: #f13a11;
}
tr:nth-child(even) {background-color: lightgray;}
.hero
{
    padding-top: 0px;
}
input[type=text] {
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
input[type=submit] {
    width: 200px;
    height: 50px;
    background-color: lightskyblue;
    border: 1px solid lightskyblue;
    margin-top: 140px;
}

    </style>
</head>
<body>
<?php 
include('header.php');
?>
<div class="container">

<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">
<form action="adminLeden.php" method="POST">
    <input type="text" name="zoek" placeholder="zoek op voornaam">
    <input type="submit" placeholder="zoek">
<a href="adminLeden.php">Reset</a>

</form>
<table >
    <thead>    
        <th>lidnummer</th>
        <th>voornaam</th>
        <th>achternaam</th>
        <th>email</th>
        <th>adres</th>
        <th>telnummer</th>
    </thead>
   <?php

foreach ($selecteerLeden as $row) {
    echo "<tr>";
    echo "<td>" . $row['Lidnr'] . "</td>";
    echo "<td>" . $row['Naam_Voor'] . "</td>";
    echo "<td>" . $row['Naam_Tussen'] . $row['Naam_Achter'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Adres_Straat_Naam'] . $row['Adres_Straat_Nummer'] . "<br>" . $row['Adres_Plaats_Naam'] .   "</td>";
    echo "<td>" . $row['Telefoon'] . "</td>";

    echo "</tr>";
}
   ?>
</table>
</section>
<?php 
include('footer.php');
?>
</div>
</body>
</html>
