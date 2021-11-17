<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profiel</title>
    <!-- <link rel="stylesheet" href="../css/inloggen.css"> -->
    <style> 

body
{
    color: white;
}
button
{
    width: 75px;
    height: 30px;
}
td
{
    justify-content: center;
    text-align: center;
}
.A_afmelden{
    padding: 2px;
    background-color: white;
    border: 1px solid black;
    text-decoration: none;
    color: black;
}

</style>
</head>
<body>
<?php
    include('header.php');
?>


<div class="cont">
    <div class="containerlinks">
        <form action="#uitloggen">
        <input type="submit" value="uitloggen"><br><br>
    </form>    
    gereservereerde banen
    <table border="1">
        <tr>
            <th> baan</th>
            <th> tijd</th>
            <th> afmelden</th>
        </tr>
    
        <tr>
            <td class="td1"> Binnenbaan 3</td>
            <td class="td1"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td2"> butenbaanbaan 3</td>
            <td class="td2"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td2"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td1"> Binnenbaan 3</td>
            <td class="td1"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td2"> Binnenbaan 3</td>
            <td class="td2"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td2"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td1"> Binnenbaan 3</td>
            <td class="td1"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td2"> Binnenbaan 3</td>
            <td class="td2"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td2"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        <tr>
            <td class="td1"> Binnenbaan 3</td>
            <td class="td1"> 18-11-2021 <br> 15:00- 16:00</td>
            <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
        
    </table> <br>
    ingeschreven voor toernooien
    <table border="1">
        <tr>
            <th> toernooi naam  </th>
            <th> datum          </th>
            <td>afmelden</td>
        </tr>
    
        <tr>
            <td class="td1"> toernooi       </td>
            <td class="td1"> 18-11-2021 <br> 12:00 - 14:00  </td>
            <td class="td1"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
    
        <tr>
            <td class="td2"> toernooi </td>
            <td class="td2"> 18-11-2021 <br> 12:00 - 14:00  </td>
            <td class="td2"><a href="profiel.php" class="A_afmelden">afmelden</a></td>
        </tr>
    </table>
</div>
    <div class="containerrechts">
    <h4>wachtwoord veranderen</h4>
    <form action="profiel.php" method="POST">   
        <input type="text" placeholder="wachtwoord"><br><br>
        <input type="password" placeholder="wachtwoord herhalen"><br><br>
        <input type="submit" value="verander wachtwoord"class="buttonInloggen">
    </form>
    </div>

</div>

<?php
    include('footer.php');
?>
</body>
</html>