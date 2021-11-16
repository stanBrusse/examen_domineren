<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
    <link rel="stylesheet" href="inloggen.css">
<style>.btninloggen
{
    background-color: lightgray;
    border: 1px solid lightgray;
}
.btninloggen:hover
{
    border: 1px solid black;

}
.btnregistreren{
    background-color: white;
    border: 1px solid white;
}
.btnregistreren:hover
{
    border: 1px solid black;
}
.buttonInloggen
{
    margin-top: 0px;
}
</style>
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
<form action="registreren.php" method="POST">
    <h4>Gebruikersnaam</h4>
    <input type="text" placeholder="gebruikersnaam">
      <h4 class="h4email">email</h4>
      <input type="email" placeholder="email">
    <h4 class="h4wachtwoord">Wachtwoord</h4>
    <input type="password" placeholder="wachtwoord">
      <h4 class="h4wachtwoordherhalen" >Wachtwoord herhalen</h4>
      <input type="password" placeholder="wachtwoord">
      <br>
      <br>
    <input type="submit" value="regristreren"class="buttonInloggen">
</form>

</div>


<?php 
include('footer.php');
?>
</body>
</html>