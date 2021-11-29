<?php
        include('header.php');
$info = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";
$charset = "utf8mb4";
function PostcodeCheck($postcode)
{
    $remove = str_replace(" ","", $postcode);
    $upper = strtoupper($remove);

    if( preg_match("/^\W*[1-9]{1}[0-9]{3}\W*[a-zA-Z]{2}\W*$/",  $upper)) {
        return $upper;
    } else {
        return false;
    }
}
//maakt de connectie aan 
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
if (isset($_POST['huidigwachtwoord']) && isset($_POST['nieuwWachtwoord']) && isset($_POST['herhaalWachtwoord'])) {
    if($_POST['nieuwWachtwoord'] == $_POST['herhaalWachtwoord'])
    {
        $huidig = md5($_POST['huidigwachtwoord']);
        $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=? AND wachtwoord=?");
        $sql->bindParam(1, $_SESSION['lidnummer']);
        $sql->bindParam(2, $huidig );
        $sql->execute();
        if($sql->rowCount() == 1)
        {
            $nieuw = md5($_POST['nieuwWachtwoord']);
         $sql = $pdo->prepare("UPDATE accounts SET wachtwoord=? WHERE nummer=? ");
         $sql->bindParam(1, $nieuw);
         $sql->bindParam(2, $_SESSION['lidnummer']);
            $sql->execute();
            $info = "wachtwoord aangepast";
        }else{
            $info = "huidig wachtwoord klopt niet";
        }
    }else{
        $info = "wachtwoorden komen niet overeen";
    }
}elseif(isset($_POST['nieuwEmail'])){
    if(!empty($_POST['nieuwEmail'])){
        $sql = $pdo->prepare("UPDATE accounts SET email=? WHERE nummer=? ");
        $sql->bindParam(1, $_POST['nieuwEmail']);
        $sql->bindParam(2, $_SESSION['lidnummer']);
        $sql->execute();
        $info = "email is veranderd";
    }else{
        $info = "voer een email in";
    }
}elseif(isset($_POST['straatnaam'])&& isset($_POST['huisnummer'])&& isset($_POST['postcode'])&& isset($_POST['plaatsnaam']) ){
    if(!empty($_POST['straatnaam'])&& !empty($_POST['huisnummer'])&& !empty($_POST['postcode'])&& !empty($_POST['plaatsnaam']))
    {
        if ( PostcodeCheck($_POST['postcode']) !== false) {
            $sql = $pdo->prepare("UPDATE accounts SET  adres_straat_naam=?, adres_straat_nummer=?, adres_plaats_postcode=?, adres_plaats_naam=? WHERE nummer=? ");
            $sql->bindParam(1, $_POST['straatnaam']);
            $sql->bindParam(2, $_POST['huisnummer']);
            $sql->bindParam(3, $_POST['postcode']);
            $sql->bindParam(4, $_POST['plaatsnaam']);
            $sql->bindParam(5, $_SESSION['lidnummer']);
            $sql->execute();
            $info = "adres gegevens aangepast";
        }else{
            $info = "Postcode is niet correct";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veranderen</title>
<style>
    .centerForm{
        margin: 0px auto;
        width: 500px;
    }
    input[type=text], input[type=password], input[type=email] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
}
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        width: 100%;
    }
    .a{
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

    input[type=submit]:hover {
        background-color: #45a049;
    }
    label{
        padding-left: 10px;
        margin-bottom: 0px;
        margin-top: 10px;
        text-align: center;
        width: 100%;
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="divFoto">
    <div class="container">
        <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

                <div class="container">
                    <div class="row">
                        <div class="centerForm">
                        <a href="profiel.php" class="a">terug</a>
                        <form action="profielVeranderen.php" method="POST">
                <?php 
                echo "<label>".$info."</label>";
                if(isset($_POST['wachtwoord']))
                {
                    // echo $_POST['veranderen'];
                    // echo $_SESSION['lidnummer'];
                    $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
                    $sql->bindParam(1, $_SESSION['lidnummer']);
                    $sql->execute();
                    
                            foreach($sql as $row)
                            {
                                echo  " <label>huidig wachtwoord</label><input type='password' name='huidigwachtwoord'placeholder='huidigwachtwoord'> <br>";
                                echo  "<label>nieuw wachtwoord</label><input type='password'name='nieuwWachtwoord' placeholder='nieuw wachtwoord'> <br>";
                                echo  "<label>herhaal nieuw wachtwoord</label><input type='password' name='herhaalWachtwoord' placeholder='herhaal wachtwoord'>";
                                echo  "<input type='submit' value='verander wachtwoord'>";
                            }
                            
                               
                        
                    }elseif(isset($_POST['email'])){
                        $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
                        $sql->bindParam(1, $_SESSION['lidnummer']);
                        $sql->execute();
                        foreach($sql as $row)
                        {
                            echo  "<label>huidig emailadres</label><input name='huidigEmail' type='email' value='".$row['email']."' readonly> <br>";
                            echo  "<label>nieuw emailadres</label><input name='nieuwEmail' type='email' placeholder='nieuw emailadres'>";
                            echo  "<input type='submit' value='verander emailadres'>";
                        }
                    }elseif(isset($_POST['adres']))
                    {
                        $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
                        $sql->bindParam(1, $_SESSION['lidnummer']);
                        $sql->execute();
                        foreach($sql as $row)
                        {
                            echo  "<label>straat naam</label>   <input type='text' name='straatnaam' value='".$row['adres_straat_naam']."'> <br>";
                            echo  "<label>huisnummer</label>    <input type='text' name='huisnummer' value='".$row['adres_straat_nummer']."'> <br>";
                            echo  "<label>postcode</label>      <input type='text' name='postcode' value='".$row['adres_plaats_postcode']."'> <br>";
                            echo  "<label>plaats naam</label>   <input type='text' name='plaatsnaam' value='".$row['adres_plaats_naam']."'> <br>";
                            echo  "<input type='submit' value='verander adresgegevens'>";
                        }
                    }else{
                        if (!headers_sent()) {
                            exit(header("location: profiel.php"));
                            }
 
                    }
                
                ?>
                
                </form>
                        
                </div>
                    </div>
                </div>
        </section>
        
    </div>
    </div>
    <?php
        include('footer.php');
        ?>
</body>

</html>
