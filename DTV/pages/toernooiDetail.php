<?php
    include('header.php');

$info = "";
if(!isset($_SESSION['lidnummer']))
{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/inloggen.php");
    }
    else{
        exit(header("location:inloggen.php"));
    }

}else{


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
    $aantaldeelnemers = $pdo->query("select count(*) FROM registratie_activiteit WHERE activiteit_nummer=".$_GET['toernooinummer']."")->fetchColumn(); 
    if($aantaldeelnemers <=32)
    {
            $insertActiviteit = $pdo->prepare("INSERT INTO registratie_activiteit  (activiteit_nummer, lid_nummer, datum_inschrijfing) VALUES( ?, ? , ?)");
            $insertActiviteit->bindParam(1, $_GET['toernooinummer']);
            $insertActiviteit->bindParam(2, $_GET['id']);
            $insertActiviteit->bindParam(3, $date);
            $insertActiviteit->execute();
        
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=../pages/toernooien.php");
        }
        else{
            exit(header("location:toernooien.php"));
        }
    }else{echo '<script type="text/javascript">'; 
        echo 'alert("maximaal aantal inschrijvingen al behaald. u kunt niet aanmelden");'; 
        echo 'window.location.href = "toernooien.php";';
        echo '</script>';
    }
    
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
        .terugknop{
            background-color: tomato;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="cont">
        <a href="toernooien.php"><button class="terugknop">terug</button></a><br><br><br>
            
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
                    echo "<td> het toernooi begint om ".substr_replace($row['tijd_start'], ':', 2, 0) . " en eindigd om " .substr_replace($row['tijd_eind'], ':', 2, 0) . "<br> het toernooi is op: " . $row['datum_activiteit'] ."</td>";
                    echo "</tr>";                     
                    echo "<tr>";
                    $aantaldeelnemers = $pdo->query("select count(*) FROM registratie_activiteit WHERE activiteit_nummer=".$_GET['nummer']."")->fetchColumn(); 
                    echo "<td>";  
                    echo "aantal deelnemers: $aantaldeelnemers/32 ";             
                    echo "</td";
                    echo "</tr>";   
                    echo "<tr>";                     
                    echo "<td><a href='toernooiDetail.php?aanmelden=true&toernooinummer=".$_GET['nummer']."&id=".$_SESSION['lidnummer']." '><button>aanmelden</button></a></td>";
                    echo "</tr>"; 
                 }
                 echo $info;
?>            </table>

    </section>



    <?php
}

    include('footer.php');
    
    ?>
</body>

</html>
