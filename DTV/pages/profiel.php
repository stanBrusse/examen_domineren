<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profiel</title>
    <link rel="stylesheet" href="../css/inloggen.css">
    <link rel="stylesheet" href="../css/select.css">
    <style>
        body {
            color: black;
        }

        button {
            width: 75px;
            height: 30px;
        }

        td {
            justify-content: center;
            text-align: center;
            border: 0px;
        }
        th{
           text-align: center;
            border: 0px;
        }

        .A_afmelden {
            padding: 2px;
            background-color: #c82333;
            border: 1px solid #c82333;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            height: 50px;
        }
        tr:nth-child(even) {background-color: lightgray; border: 0px;}
        .buttonInloggen
    {
        margin-top: 20px;
    }

    </style>
</head>
<?php
include('header.php');

if( $_SESSION['loggedIn'] == true)
{}else{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
        }
        else{
        exit(header("location:index.php"));
        } 
}
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

if(isset($_POST['btnUitloggen']))
{
    session_unset();
    session_destroy();
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php>terug</a>");
        }
        else{
        exit(header("location:index.php"));
    } 

}elseif(isset($_POST['huidigwachtwoord']) && isset($_POST['wachtwoord']) && isset($_POST['herhaalwachtwoord']))
{
    
    $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=? AND wachtwoord=?");
        $sql->bindParam(1, $_SESSION['lidnummer']);
        $sql->bindParam(2, md5($_POST['huidigwachtwoord']));
        $sql->execute();

    if($sql->rowCount() == 1)
    {
        if($_POST['wachtwoord'] === $_POST['herhaalwachtwoord'])
        {
            $sql = $pdo->prepare("UPDATE accounts SET wachtwoord=? WHERE nummer=?");
            $sql->bindParam(1, md5($_POST['wachtwoord']));
            $sql->bindParam(2, $_SESSION['lidnummer']);
            $sql->execute();
        }
    }
}elseif(isset($_GET['baanID']))
{
    $sql = $pdo->prepare("DELETE FROM reservatie_baan WHERE nummer=?");
    $sql->bindParam(1, $_GET['baanID']);
    $sql->execute();
    header("Location: profiel.php");
}elseif(isset($_GET['activiteit']) && isset($_GET['lidnummer']))
{
    $sql = $pdo->prepare("DELETE FROM registratie_activiteit WHERE activiteit_nummer=? AND lid_nummer=?");
    $sql->bindParam(1, $_GET['activiteit']);
    $sql->bindParam(2, $_GET['lidnummer']);
    $sql->execute();
}



?>


<body>
   


    <div class="cont">
        <div class="containerlinks ml-auto col-lg-5 col-md-6 col-12" >
        <form action="profiel.php" method="POST">
                <input type="submit" name="btnUitloggen" class="btn btn-danger" value="uitloggen"><br><br>
            </form>
            
            <h4>wilt u iets veranderen van uw profiel?<br>kies hier wat u wilt veranderen</h4>
            <form action="profielVeranderen.php" method="POST">
        
                <input type="submit" name="wachtwoord" value="wachtwoord" class="buttonInloggen"><br>
                <input type="submit" name="email" value="email" class="buttonInloggen"><br>
                <input type="submit" name="adres" value="adres" class="buttonInloggen"><br>
            </form>
    
        </div>
        <div class="containerrechts mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12" >
        <?php 
    $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
    $sql->bindParam(1, $_SESSION['lidnummer']);
    $sql->execute();
    foreach($sql as $row)
    {
        echo $row['naam_voor'] . " " . $row['naam_tussen'] . " " .$row['naam_achter'];
    }
    ?>
        
        <hr style="background-color: darkgray">
            gereservereerde banen
            <table border="1">
                <tr>
                    <th> baan</th>
                    <th> tijd</th>
                    <th> afmelden</th>
                </tr>
    <?php    
            $sql = $pdo->prepare("SELECT * FROM reservatie_baan WHERE lid_nummer=?");
            $sql->bindParam(1, $_SESSION['lidnummer']);
            $sql->execute();
            
            foreach($sql as $row)
            {
                $sql = $pdo->prepare("SELECT * FROM banen WHERE nummer=?");
                $sql->bindParam(1, $row['baan_nummer']);
                $sql->execute();
                
                foreach($sql as $result)
                {
                    $nummer = $row['nummer'];
                    $datum = date("d-m-Y", strtotime($row['datum']));
                    echo "<tr>";
                    echo "<td>".$result['code'] . " " . $result['ligging']  . "</td>";            
                    echo "<td>". $datum . "<br>" . $row['tijd_Begin'] . " - " . $row['tijd_Eind']  . "</td>";            
                    echo "<td><a href='profiel.php?baanID=$nummer' class='A_afmelden'>afmelden</a></td>";            
                    echo "</tr>";
                }
                          
            }
            ?>

            </table> <br>
            ingeschreven voor toernooien
            <table border="1">
                <tr>
                    <th> toernooi naam </th>
                    <th> datum </th>
                    <th> afmelden </td>
                </tr>
            <?php
                $sql = $pdo->prepare("SELECT * FROM registratie_activiteit WHERE lid_nummer=?");
                $sql->bindParam(1, $_SESSION['lidnummer']);
                $sql->execute();
                foreach($sql as $row)
                {
                    $activiteit = $pdo->prepare("SELECT * FROM activiteiten WHERE nummer=?");
                    $activiteit->bindParam(1, $row['activiteit_nummer']);
                    $activiteit->execute();
                    foreach($activiteit as $result)
                    {
                        $nummer = $result['nummer'];
                        $lidnummer = $row['lid_nummer'];
                        echo "<tr>";
                        echo "<td>". $result['title'] ."</td>";
                        echo "<td>" . $result['datum_activiteit'] . "<br>" . $result['tijd_start'] . " - " . $result['tijd_eind']. "</td>";
                        echo "<td> <a href='profiel.php?activiteit=$nummer&lidnummer=$lidnummer' class='A_afmelden'>afmelden</a></td>";
                        echo "</tr>";
                    }
                }
            ?>
            
                
            </table>

        </div>

    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>

<div id="info">Observe the platform icon's motion direction when there is up and down hover on options.</div>

<form id="app-cover">
            
    </form>
