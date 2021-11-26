<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inloggen</title>
    <link rel="stylesheet" href="css/inloggen.css">

</head>
<body>
<?php 
include('header.php');
?>
<div class="container">
<div class="login">
<br> <hr>
<a href="inloggen.php"><button class="btninloggen" >inloggen</button></a>
<a href="registreren.php"><button class="btnregistreren">registreren</button></a>
<form action="inloggen.php" method="POST">
    <h4>Gebruikersnaam</h4>
    <input type="text" placeholder="gebruikersnaam">
    <h4 class="h4wachtwoord">Wachtwoord</h4>
    <input type="password" placeholder="wachtwoord">
    <h5><a href="wachtwoordvergeten.php">wachtwoord vergeten?</a></h5>
    <input type="submit" value="inloggen"class="buttonInloggen">
</form>
    
</div>


<?php 
include('footer.php');
?>
</body>
</html>