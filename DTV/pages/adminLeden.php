<?php             session_start();
if($_SESSION['rol'] == "admin" && $_SESSION['loggedIn'] == true)
{}else{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
        }
        else{
        exit(header("location:index.php"));
        } 
}
     

//dit is om te testen. kan weg als er een nieuwe database is
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dtv";
    $charset = "utf8mb4";

    //maakt de connectie aan 
    $dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['zoek'])){
        $zoek = $_POST['zoek'];
        $order = "nummer";
        $zoek = "%". $zoek . "%";
        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_voor LIKE? ORDER BY $order");
        $selecteerLeden->bindParam(1, $zoek);
        $selecteerLeden->execute();
        if ($selecteerLeden->rowCount() == 0) {
            $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_achter LIKE?  ORDER BY $order");
            $selecteerLeden->bindParam(1, $zoek);
            $selecteerLeden->execute();
            if ($selecteerLeden->rowCount() == 0) {
                $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE email LIKE?  ORDER BY $order");
                $selecteerLeden->bindParam(1, $zoek);
                $selecteerLeden->execute();
                if ($selecteerLeden->rowCount() == 0) {
                    $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE  adres_plaats_naam LIKE?  ORDER BY $order");
                    $selecteerLeden->bindParam(1, $zoek);
                    $selecteerLeden->execute();
                    if ($selecteerLeden->rowCount() == 0) {
                        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE telefoon LIKE? ORDER BY $order");
                        $selecteerLeden->bindParam(1, $zoek);
                        $selecteerLeden->execute();
                        if($selecteerLeden->rowCount() == 0)
                        {
                            $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_tussen LIKE? ORDER BY $order");
                            $selecteerLeden->bindParam(1, $zoek);
                            $selecteerLeden->execute();
                        }
                    }
                }
            }
        }
        

    }else{
        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts ORDER BY nummer"); 
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
<form action="ledenLidLatenWorden.php">
    <input type="submit" style="width: 250px;" value="Leden toevoegen of afwijzen">
</form>  
<br>
<form action="adminLeden.php" method="POST">
    <input type="text" name="zoek" placeholder="zoeken">
    <input type="submit" value="zoek" >
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
    echo "<td>" . $row['nummer'] . "</td>";
    echo "<td>" . $row['naam_voor'] . "</td>";
    echo "<td>" . $row['naam_tussen'] . " " . $row['naam_achter'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['adres_straat_naam'] . $row['adres_straat_nummer'] . "<br>" . $row['adres_plaats_naam'] .   "</td>";
    echo "<td>" . $row['telefoon'] . "</td>";

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
