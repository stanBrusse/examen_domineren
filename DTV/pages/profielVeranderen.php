<?php
        include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";
$charset = "utf8mb4";

//maakt de connectie aan 
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>

<body>
    <div class="divFoto">
    <div class="container">
        <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

                <div class="container">
                    <div class="row">
                    <form action="profielVeranderen.php" method="POST">
                <?php 
                if(isset($_POST['veranderen']))
                {
                    // echo $_POST['veranderen'];
                    // echo $_SESSION['lidnummer'];
                    $sql = $pdo->prepare("SELECT * FROM accounts WHERE nummer=?");
                    $sql->bindParam(1, $_SESSION['lidnummer']);
                    $sql->execute();
                    if($_POST['veranderen'] == "wachtwoord"){?>
                       
                        <?php 
                            foreach($sql as $row)
                            {
                                echo  "<input type='text' placeholder='huidigwachtwoord'> <br>";
                                echo  "<input type='password' placeholder='nieuw wachtwoord'> <br>";
                                echo  "<input type='password' placeholder='herhaal wachtwoord'>";
                            }
                            
                           
                        
                    }elseif($_POST['veranderen'] == "email"){
                        foreach($sql as $row)
                        {
                            echo  "<input type='email' value='".$row['email']."'> <br>";
                            echo  "<input type='email' placeholder='nieuw emailadres'>";
                        }
                    }elseif($_POST['veranderen'] == "adres")
                    {
                        foreach($sql as $row)
                        {
                            echo  "<input type='email' value='".$row['email']."'> <br>";
                            echo  "<input type='email' placeholder='nieuw emailadres'>";
                        }
                    }
                }
                ?>
                
                </form>
                        

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
