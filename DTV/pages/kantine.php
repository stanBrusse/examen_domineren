<?php

$servername = "localhost";
$username = "root";
$password = "";
$usernameCPanel = "bveens_dtv";
$passwordCPanel = "Tennis@DTV!";
$dbnameCPanel = "bveens_dtv";
$dbname = "dtv";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = new PDO("mysql:host=$servername;dbname=$dbnameCPanel", $usernameCPanel, $passwordCPanel);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `artikelen`");
    $stmt->execute();
    $result = $stmt;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kantine</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/kantine.js"></script>
    <!--IF USER IS ADMIN THIS SHOWS-->
    <?php include('kantine_admin.php') ?>
</head>

<body>
    <?php include('header.php'); ?>
    </div>

    <div class="kantine-container">
        <div id="kantine-main">
            <div class="kantine-filter">
                <select id="kantineSelect">
                    <option value="all">ALLES</option>
                    <option value="snack">SNACKS</option>
                    <option value="drink">DRINKS</option>
                </select>
                <div class="A-kantine-button">
                    <a href="kantine_create.php"><img class="create" type="button" src="../images/icons/create.svg"></a>
                </div>
            </div>
            <?php
            while ($item = $result->fetch()) {
                $foto = "images/NoImage.png";
                if (file_exists('../' . $item["foto"]) && $item["foto"] != "") {
                    $foto = $item["foto"];
                } else {
                    $foto = "images/NoImage.png";
                }
                echo '<div class="kantine-item-card ' . strtolower($item["categorie"]) . '-card" id="' . strtolower($item["categorie"]) . '">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url(../' . $foto . '");;">
                        <div class="identifier ' . strtolower($item["categorie"]) . '">
                            <label class="identifier-label">' . strtoupper($item["categorie"]) . '</label>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>' . $item["naam"] . '</span> <strong>Prijs:</strong> <span>€' . $item["prijs"] . '</span></p>
                </div>
                <div class="A-kantine-button">
                <a href="kantine_change.php?nummer='. $item["nummer"] .'"><img class="change" type="button" src="../images/icons/change.svg"></a>
                <a href="kantine_remove.php?nummer='. $item["nummer"] .'"><img class="remove" type="button" src="../images/icons/remove.svg"></a>
                </div>
            </div>';
            }
            ?>

        </div>
        <div class="container">
            
            
        </div>

    </div>
    <div>
        <?php include('footer.php'); ?>

</body>

</html>