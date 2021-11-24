<?php      
include('header.php');

if($_SESSION['rol'] == "admin" && $_SESSION['loggedIn'] == true)
{}else{
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
        }
        else{
        exit(header("location:index.php"));
        } 
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
<style>
    .leden{
        border: 1px solid black;
        height: 350px;
        width: 250px;
        float: left;
        margin-left: 10px;
        margin-top: 15px;
    }
    .toernooien{
        border: 1px solid black;
        height: 350px;
        width: 250px;
        float: left;
        margin-left: 10px;
    }
    .banen{
        border: 1px solid black;
        height: 350px;
        width: 250px;
        float: left;
        margin-left: 10px;
    }
    .kantine{
        border: 1px solid black;
        height: 350px;
        width: 250px;
        float: left;
        margin-left: 10px;
    }
    .container{
        text-align: center;
    }
    .banenButton{
    margin-top: 150px;
    border: 1px solid black;
    width: auto; 
    }
    .banenButton:hover{
        background-color: lightsteelblue;
    }
    .tekst{
        margin-top: 50px;
    }
</style>
</head>
<body>

<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">


<div class="container">
<form action="adminLeden.php" method="POST">
<div class="leden">
    <h3 class="tekst">Leden beheren</h3>
    <input type="submit" value="Leden beheren" class="banenButton">
</div>
</form>
<form action="adminToernooien.php" method="POST">
<div class="toernooien">
    <h3 class="tekst">Toernooien inplannen</h3>
    <input type="submit" value="Toernooien inplannen" class="banenButton">
</div>
</form>
<form action="adminBanen.php" method="POST">
<div class="banen">
    <h3 class="tekst">Banen reserveren</h3>
    <input type="submit" value="Banen reserveren" class="banenButton">
</div>
</form>
<form action="adminKantine.php" method="POST">
<div class="kantine">
    <h3 class="tekst">Kantine beheren</h3>
    <input type="submit" value="Kantine beheren" class="banenButton">
</div>
</form>

</div>
</section>



<?php 
include('footer.php');
?>
</body>
</html>