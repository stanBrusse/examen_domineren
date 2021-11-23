<?php
include('header.php');

/*  -----als de persoon geen admin in of niet is ingelogd gaat hij naar de index------
if($_SESSION['rol'] == "admin" && $_SESSION['loggedIn'] == true)
{}else{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
        }
        else{
        exit(header("location:index.php"));
        } 
}
*/

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

if(isset($_POST['emailadres']) && isset($_POST['wachtwoord']))
{
        $wachtwoord =md5($_POST['wachtwoord']);
        
        $sql = $pdo->prepare("SELECT * FROM accounts WHERE email=? AND wachtwoord=?");
        $sql->bindParam(1, $_POST['emailadres']);
        $sql->bindParam(2, $wachtwoord);
        $sql->execute();
        if ($sql->rowCount() == 1) {
            foreach($sql as $row)
            {
                $_SESSION['lidnummer'] = $row['nummer'];
                $_SESSION['loggedIn'] = true;
                $_SESSION['rol'] = $row['account_rol'];
                echo $_SESSION['loggedIn'];
                if($_SESSION['rol'] == "admin"){
                    if (headers_sent()) {
                        die("Redirect failed. Please click on this link: <a href=../pages/admin.php");
                    }
                    else{
                        exit(header("location:admin.php"));
                    }
                }else{
                    if (headers_sent()) {
                        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
                    }
                    else{
                        exit(header("location:index.php"));
                    }
                }
            }
        }else{
            $info = "incorrecte gegevens";
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inloggen</title>
    <link rel="stylesheet" href="../css/inloggen.css">

</head>
<body>

<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">


<div class="container">
    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto col-12">
            <div class="hero-text mt-5 text-center">

            <div class="cont">
            <div class="login">
            <br> <hr>
                <a href="inloggen.php"><button class="btninloggen" >inloggen</button></a>
                <a href="registreren.php"><button class="btnregistreren">registreren</button></a>
            <form action="inloggen.php" method="POST"><br>
                <input name="emailadres" type="text" placeholder="emailadres"><br><br>
                <input name="wachtwoord" type="password" placeholder="wachtwoord">
                <h5><a href="wachtwoordvergeten.php">wachtwoord vergeten?</a></h5>
            <div class="inloggen_Info"><h2><?php echo $info?></h2></div>
                <input type="submit" value="inloggen"class="buttonInloggen">
            </form>

            </div>
            </div>
        </div>

</div>
</section>



<?php 
include('footer.php');
?>
</body>
</html>