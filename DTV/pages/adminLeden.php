<?php
include('header.php');
if ($_SESSION['rol'] == "admin" && $_SESSION['loggedIn'] == true) {
} else {
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
    } else {
        exit(header("location:index.php"));
    }
}


//dit is om te testen. kan weg als er een nieuwe database is
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";
$charset = "utf8mb4";

//maakt de connectie aan 
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['zoek'])) {
    $zoek = $_POST['zoek'];
    $order = "nummer";
    $zoek = "%" . $zoek . "%";
    $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_voor LIKE? ORDER BY $order");
    $selecteerLeden->bindParam(1, $zoek);
    $selecteerLeden->execute();
    if ($selecteerLeden->rowCount() == 0) {
        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_achter LIKE?  ORDER BY $order");
        $selecteerLeden->bindParam(1, $zoek);
        $selecteerLeden->execute();
        if ($selecteerLeden->rowCount() == 0) {
            $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE email LIKE?  ORDER BY $order");
            $selecteerLeden->bindParam(1, $zoek);
            $selecteerLeden->execute();
            if ($selecteerLeden->rowCount() == 0) {
                $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE  adres_plaats_naam LIKE?  ORDER BY $order");
                $selecteerLeden->bindParam(1, $zoek);
                $selecteerLeden->execute();
                if ($selecteerLeden->rowCount() == 0) {
                    $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE telefoon LIKE? ORDER BY $order");
                    $selecteerLeden->bindParam(1, $zoek);
                    $selecteerLeden->execute();
                    if ($selecteerLeden->rowCount() == 0) {
                        $selecteerLeden = $pdo->prepare("SELECT * FROM accounts WHERE naam_tussen LIKE? ORDER BY $order");
                        $selecteerLeden->bindParam(1, $zoek);
                        $selecteerLeden->execute();
                    }
                }
            }
        }
    }
} else {
    $selecteerLeden = $pdo->prepare("SELECT * FROM accounts ORDER BY nummer");
    $selecteerLeden->execute();
}


if (isset($_GET['promoveren']) && isset($_GET['rol'])) {
    $rol = $_GET['rol'];
    if($_GET['promoveren'] >=2)
    {
        if ($rol == "niets") {
            $rol = "lid";
            $sql = $pdo->prepare("UPDATE accounts SET account_rol=? WHERE nummer=?");
            $sql->bindParam(1, $rol);
            $sql->bindParam(2, $_GET['promoveren']);
            $sql->execute();
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href=../pages/adminLeden.php");
            } else {
                exit(header("location:adminLeden.php"));
            }
        } elseif ($rol == "lid") {
            $rol = "admin";
            $sql = $pdo->prepare("UPDATE accounts SET account_rol=? WHERE nummer=?");
            $sql->bindParam(1, $rol);
            $sql->bindParam(2, $_GET['promoveren']);
            $sql->execute();
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href=../pages/adminLeden.php");
            } else {
                exit(header("location:adminLeden.php"));
            }
        }
    }
    
} elseif (isset($_GET['degraderen']) && isset($_GET['rol'])) {
    $rol = $_GET['rol'];
    if ($_GET['degraderen'] >=2) {
        if ($rol == "admin") {
            $rol = "lid";
            $sql = $pdo->prepare("UPDATE accounts SET account_rol=? WHERE nummer=?");
            $sql->bindParam(1, $rol);
            $sql->bindParam(2, $_GET['degraderen']);
            $sql->execute();
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href=../pages/adminLeden.php");
            } else {
                exit(header("location:adminLeden.php"));
            }
        } elseif ($rol == "lid") {
            $rol = "niets";
            $sql = $pdo->prepare("UPDATE accounts SET account_rol=? WHERE nummer=?");
            $sql->bindParam(1, $rol);
            $sql->bindParam(2, $_GET['degraderen']);
            $sql->execute();
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href=../pages/adminLeden.php");
            } else {
                exit(header("location:adminLeden.php"));
            }
        }
    }
} elseif (isset($_GET['verwijderen']) && isset($_GET['rol'])) {
    if ($_GET['verwijderen'] >=2) {
        $sql = $pdo->prepare("DELETE FROM accounts WHERE nummer=?");
        $sql->bindParam(1, $_GET['verwijderen']);
        $sql->execute();
        echo "fadsfasdfafsd";
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=../pages/adminLeden.php");
        } else {
            exit(header("location:adminLeden.php"));
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
    <title>Leden</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;

        }

        th {
            background-color: #f13a11;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }

        .hero {
            padding-top: 0px;
        }

        input[type=text] {
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
        }

        input[type=submit] {
            width: 200px;
            height: 50px;
            background-color: lightskyblue;
            border: 1px solid lightskyblue;
            margin-top: 140px;
        }
    </style>
</head>

<body>

    <div class="container">

        <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">
            <form action="ledenLidLatenWorden.php">
                <input type="submit" style="width: 250px;" value="Leden toevoegen of afwijzen">
            </form>
            <br>
            <form action="adminLeden.php" method="POST">
                <input type="text" name="zoek" placeholder="zoeken">
                <input type="submit" value="zoek">
                <a href="adminLeden.php">Reset</a>

            </form>
            <table>
                <thead>
                    <th>lidnummer</th>
                    <th>voornaam</th>
                    <th>achternaam</th>
                    <th>email</th>
                    <th>adres</th>
                    <th>telnummer</th>
                    <th>rol</th>
                    <th>promoveren</th>
                    <th>degaderen</th>
                    <th>verwijderen</th>
                </thead>
                <?php

                foreach ($selecteerLeden as $row) {
                    $nummer = $row['nummer'];
                    $rol = $row['account_rol'];
                    echo "<tr>";
                    echo "<td>$nummer</td>";
                    echo "<td>" . $row['naam_voor'] . "</td>";
                    echo "<td>" . $row['naam_tussen'] . " " . $row['naam_achter'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['adres_straat_naam'] . $row['adres_straat_nummer'] . "<br>" . $row['adres_plaats_naam'] .   "</td>";
                    echo "<td>" . $row['telefoon'] . "</td>";
                    echo "<td>" . $row['account_rol'] . "</td>";
                    echo "<td><a href='adminLeden.php?promoveren=$nummer&rol=$rol'>promoveren</td>";
                    echo "<td><a href='adminLeden.php?degraderen=$nummer&rol=$rol'>degraderen</td>";
                    echo "<td><a href='adminLeden.php?verwijderen=$nummer&rol=$rol'>verwijderen</a></td>";

                    echo "</tr>";
                }
                ?>

            </table>
        </section>
        <?php
        include('footer.php');
        ?>
    </div>
</body>

</html>
