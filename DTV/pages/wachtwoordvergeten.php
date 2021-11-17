<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wachtwoord vergeten</title>
    </head>
    <link rel="stylesheet" href="../css/inloggen.css">

<body>
<?php 
include('header.php');
?>
<div class="cont">
<div class="login">
<a class="aterug" href="inloggen.php">X</a>
<br> <hr>

<form action="wachtwoordvergeten.php" method="POST">
    <h4 class="h4wachtwoordvergeten">wachtwoord <br>vergeten</h4>
    <h4 class="h4email">email</h4>
    <input type="email" placeholder="email">
    <h6 class="h6wachtwoordvergeten">Vul hier uw E-Mail in dan sturen <br>wij u een mail om uw<br> wachtwoord te veranderen</h6>
    <br>
    <input type="submit" value="verzenden"class="buttonInloggen">
</form>

</div>


<?php 
include('footer.php');
?>
</body>
</html>