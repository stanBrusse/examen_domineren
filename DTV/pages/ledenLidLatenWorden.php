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
}
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
  $selecteerNieuweLeden = $pdo->prepare("SELECT * FROM accounts WHERE Account_Rol= 'aangemeld' ");
  $selecteerNieuweLeden->execute();

  if(isset($_POST['afwijzen']) && isset($_POST['id']))
  {
      $sql = $pdo->prepare("UPDATE accounts SET account_rol='afgewezen' WHERE nummer=?");
      $sql->bindparam(1, $_POST['id']);
      $sql->execute();
      header("Location: ledenLidLatenWorden.php");
  }elseif(isset($_POST['toevoegen']) && isset($_POST['id']))
  {
    $sql = $pdo->prepare("UPDATE accounts SET account_rol='lid' WHERE nummer=?");
    $sql->bindparam(1, $_POST['id']);
    $sql->execute();
    header("Location: ledenLidLatenWorden.php");
  }


  
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leden </title>
<style>
.thead-rood{
    background-color: #f13a11;
}
.terug {
    width: 200px;
    height: 50px;
    background-color: lightskyblue;
    border: 1px solid lightskyblue;
    margin-top: 140px;
}
table{
    text-align: center;
}

</style>

</head>
<body>
<div class="container">

<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">
                <form action="adminLeden.php">
                    <input class="terug" type="submit" value="terug">
                </form>
                <table  class="table  table-striped table-hover">
                    <thead class=" thead-rood">
                        <th>voornaam achternaam</th>
                        <th>email</th>  
                        <th>toevoegen</th>  
                        <th>afwijzen</th>  
                    </thead>
                    <?php
                    if ($selecteerNieuweLeden->rowCount() == 0) {
                            echo "<tr><td colspan='4'>niets gevonden</td></tr>";
                    }else{
                        foreach ($selecteerNieuweLeden as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['naam_voor'] ." ".  $row['naam_tussen'] . " " . $row['naam_achter'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo '<td><form action="ledenLidLatenWorden.php" method="POST"><input type="hidden" name="id" value="'.$row["nummer"].'"><input type="submit" name="toevoegen" class="btn btn-success" value="toevoegen"></form></td>' ;
                            echo '<td><form action="ledenLidLatenWorden.php" method="POST"><input type="hidden" name="id" value="'.$row["nummer"].'"><input type="submit" name="afwijzen" class="btn btn-danger" value="afwijzen"></form></td>' ;

                            echo "</tr>";
                        }
                    }
                    ?>
                    
                    

                </table>

                    
                </div>
            </div>

        </div>
    </div>
</section>
<?php 
include('footer.php');
?>
</div>
</body>
</html>
