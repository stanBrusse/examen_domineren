<?php
session_start();
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
    header("location: index.php");
    echo "fsdsdffasd";

}elseif(isset($_POST['huidigwachtwoord']) && isset($_POST['wachtwoord']) && isset($_POST['herhaalwachtwoord']))
{
    $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=? AND wachtwoord=?");
        $sql->bindParam(1, $_SESSION['lidnummer']);
        $sql->bindParam(2, $_POST['huidigwachtwoord']);
        $sql->execute();

    if($sql->rowCount() == 1)
    {
        if($_POST['wachtwoord'] === $_POST['herhaalwachtwoord'])
        {
            $sql = $pdo->prepare("UPDATE accounts SET wachtwoord=? WHERE nummer=?");
            $sql->bindParam(1, $_POST['wachtwoord']);
            $sql->bindParam(2, $_SESSION['lidnummer']);
            $sql->execute();
        }
    }
}
$sql = $pdo->prepare("SELECT * FROM reservatie_baan WHERE lid_nummer=?");
$sql->bindParam(1, $_SESSION['lidnummer']);
$sql->execute();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profiel</title>
    <link rel="stylesheet" href="../css/inloggen.css">
    <style>
        body {
            color: white;
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
            border: 0px;
        }

        .A_afmelden {
            padding: 2px;
            background-color: white;
            border: 1px solid black;
            text-decoration: none;
            color: black;
        }
        tr:nth-child(even) {background-color: lightgray; border: 0px;}


    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>


    <div class="cont">
        <div class="containerlinks">
            
            gereservereerde banen
            <table border="1">
                <tr>
                    <th> baan</th>
                    <th> tijd</th>
                    <th> afmelden</th>
                </tr>
    <?php    foreach($sql as $row)
            {
                $nummer = $row['nummer'];
                echo "<tr>";
                echo "<td> binnenbaan"  . "</td>";            
                echo "<td>". $row['datum'] . "<br>" . $row['tijd_Begin'] . "-" . $row['tijd_Eind']  . "</td>";            
                echo "<td><a href='profiel.php?baanID=$nummer' class='A_afmelden'>afmelden</a></td>";            
                echo "</tr>";          
            }
            ?>

            </table> <br>
            ingeschreven voor toernooien
            <table border="1">
                <tr>
                    <th> toernooi naam </th>
                    <th> datum </th>
                    <td>afmelden</td>
                </tr>

                <tr>
                    <td class="td1"> toernooi </td>
                    <td class="td1"> 18-11-2021 <br> 12:00 - 14:00 </td>
                    <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
                </tr>

                <tr>
                    <td class="td2"> toernooi </td>
                    <td class="td2"> 18-11-2021 <br> 12:00 - 14:00 </td>
                    <td class="td2"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
                </tr>
            </table>
        </div>
        <div class="containerrechts">
            <form action="profiel.php" method="POST">
                <input type="submit" name="btnUitloggen" value="uitloggen"><br><br>
            </form>
            <h4>wachtwoord veranderen</h4>
            <form action="profiel.php" method="POST">
                <input type="text"     name="huidigwachtwoord"  placeholder="huidig wachtwoord"><br><br>
                <input type="text"     name="wachtwoord"  placeholder="wachtwoord"><br><br>
                <input type="password" name="herhaalwachtwoord"  placeholder="wachtwoord herhalen"><br><br>
                 <input type="submit" value="verander wachtwoord" class="buttonInloggen">
            </form> 
        </div>

    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>