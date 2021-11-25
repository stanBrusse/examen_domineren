<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";
$charset = "utf8mb4";
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['nummer'])) {

    $selectActiviteit = $pdo->prepare("SELECT * FROM activiteiten WHERE nummer=?");
    $selectActiviteit->bindParam(1, $_GET['nummer']);
    $selectActiviteit->execute();
    if($selectActiviteit->rowCount()!= 1 )
    {
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=../pages/toernooien.php");
        }
        else{
            exit(header("location:toernooien.php"));
        }
    }
}elseif(isset($_GET['aanmelden']) &&isset($_GET['toernooinummer']) && isset($_GET['id'])){
    $check = $pdo->prepare("SELECT * FROM registratie_activiteit WHERE activiteit_nummer=? AND lid_nummer=?");
    $check->bindParam(1, $_GET['toernooinummer']);
    $check->bindParam(2, $_GET['id']);
    $check->execute();
    if($check->rowCount() == 0)
    {
        $insertActiviteit = $pdo->prepare("INSERT INTO registratie_activiteit  (activiteit_nummer, lid_nummer, datum_inschrijfing) VALUES( ?, ? , ?)");
        $insertActiviteit->bindParam(1, $_GET['toernooinummer']);
        $insertActiviteit->bindParam(2, $_GET['id']);
        $insertActiviteit->bindParam(3, $date);
        $insertActiviteit->execute();
    }
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/toernooien.php");
    }
    else{
        exit(header("location:toernooien.php"));
    }
    echo "fsdadsfadsfasdfadasffads"; 
}else{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/toernooien.php");
    }
    else{
        exit(header("location:toernooien.php"));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aanmelden voor toernooi</title>
    <style>
        .cont {
            text-align: center;
            justify-content: center;
        }

        table {
            width: 400px;
            text-align: center;
            height: 300px;
            border: 1px solid black;
        }

        th {
            border: 1px solid black;

            background-color: #f13a11;
            color: black;
        }

        td {
            color: black;
            border: 1px solid black;

        }

        button {
            width: 150px;
            height: 50px;
        }
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">


        <div class="cont">
            <table>
        <?php   foreach($selectActiviteit as $row)
                { 
                    echo "<tr>";
                    echo "<th>". $row['title'] . "</th>";
                    echo "</tr>"; 
                    echo "<tr>"; 
                    echo "<td> het toernooi is op: " . $row['datum_activiteit'] ."</td>";
                    echo "</tr>";  
                    echo "<tr>"; 
                    echo "<td> het toernooi begint om ".$row['tijd_start'] . " en eindigd om " .$row['tijd_eind'] . "<br> het toernooi is op: " . $row['datum_activiteit'] ."</td>";
                    echo "</tr>";                     
                    echo "<tr>";
                    $sql = $pdo->prepare("SELECT * FROM activiteit_werknemer WHERE activiteit_nummer=?");
                    $sql->bindParam(1, $_GET['nummer']);
                    $sql->execute(); 
                    echo "<td>";  
                    foreach($sql as $row)
                    {
                        $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
                        $sql->bindParam(1, $row['werknemer_nummer']);
                        $sql->execute();  
                        foreach($sql as $row2)
                        {
                            echo $row['rol'] . " - " . $row2['naam_voor'] . " " . $row2['naam_tussen'] . " " . $row2['naam_achter'] . "<br>";
                        }
                    }                  
                    echo "</td";
                    echo "</tr>";   
                    echo "<tr>";                     
                    echo "<td><a href='toernooiDetail.php?aanmelden=true&toernooinummer=".$_GET['nummer']."&id=".$_SESSION['lidnummer']." '><button>aanmelden</button></a></td>";
                    echo "</tr>"; 
                 }
?>            </table>

    </section>



    <?php
    include('footer.php');
    ?>
</body>

</html>
