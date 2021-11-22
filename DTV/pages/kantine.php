<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtv";



// define variables and set to empty values
$naamErr = $prijsErr = $fotoErr = $categorieErr = $ddescriptieErr = "";
$naam = $prijs = $foto = $categorie = $descriptie = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `artikelen`");
    $stmt->execute();
    $result = $stmt;
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["naam"])) {
        $naamErr = "Naam is required";
    } else {
        $naam = test_input($_POST["naam"]);
    }
    if (empty($_POST["prijs"])) {
        $prijsErr = "Prijs is required";
    } else {
        $prijs = test_input($_POST["prijs"]);
    }
    if (empty($_POST["foto"])) {
        $fotoErr = "Foto is required";
    } else {
        $foto = test_input($_POST["foto"]);
        $foto = "images/" . $foto;
    }
    if (empty($_POST["categorie"])) {
        $categorieErr = "categorie is required";
    } else {
        $categorie = test_input($_POST["categorie"]);
        $categorie = strtolower($categorie);
    }
    if (empty($_POST["descriptie"])) {
        $descriptieErr = "Description is required";
    } else {
        $descriptie = test_input($_POST["descriptie"]);
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `artikelen` (naam, descriptie, foto, prijs, categorie) VALUES (?, ?, ?, ?, ?)";
        // use exec() because no results are returned
        $conn->prepare($sql)->execute([$naam, $descriptie, $foto, $prijs, $categorie]);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      $naam = $prijs = $foto = $categorie = $descriptie = "";
      $conn = null;
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
                <a href="kantine_admin.php">ADMIN(REMOVE AFTER TESTING)</a>
            </div>
            <?php
            while($item = $result->fetch()) {
                $foto = "images/NoImage.png";
                if (file_exists('../'.$item["foto"])){$foto = $item["foto"];}else{$foto = "images/NoImage.png";}
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
                    <img value="' . $item["nummer"] . '" class="change" type="button" id="change' . $item["nummer"] . '" src="../images/icons/change.svg" onclick="change(change' . $item["nummer"] . ')">
                    <img value="' . $item["nummer"] . '" class="remove" type="button" id="remove' . $item["nummer"] . '" src="../images/icons/remove.svg" onclick="remove(remove' . $item["nummer"] . ')">
                    <img value="' . $item["nummer"] . '" class="create" type="button" id="create' . $item["nummer"] . '" src="../images/icons/create.svg" onclick="create(create' . $item["nummer"] . ')">
                </div>
            </div>';
            }
            ?>

        </div>
        <div class="container">
            <div id="kantine-create">
                <form class="kantine-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label for="naam"><strong>Item Naam:</strong></label>
                    <input type="text" id="naam" name="naam" required><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <textarea id="descriptie" name="descriptie" rows="5" cols="40" maxlength="55" required></textarea><br />

                    <label for="foto"><strong>Item Foto</strong></label>
                    <input type="file" id="foto" name="foto" required><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <input type="doubleval" id="prijs" name="prijs" required><br />

                    <label for="categorie"><strong>Item categorie</strong></label>
                    <select id="categorie" name="categorie" required>
                        <option value="snack">SNACK</option>
                        <option value="drink">DRINK</option>
                    </select><br />

                    <input type="submit" value="Submit" name="submit">
                    <input type="button" value="Return" name="return" onclick="">
                </form>
            </div>
            <div id="kantine-change">
                <form class="kantine-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label for="naam"><strong>Item Naam:</strong></label>
                    <input type="text" id="naam" name="naam" required><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <textarea id="descriptie" name="descriptie" rows="5" cols="40" maxlength="55" required></textarea><br />

                    <label for="foto"><strong>Item Foto</strong></label>
                    <input type="file" id="foto" name="foto" required><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <input type="doubleval" id="prijs" name="prijs" required><br />

                    <label for="categorie"><strong>Item categorie</strong></label>
                    <select id="categorie" name="categorie" required>
                        <option value="SNACK">SNACK</option>
                        <option value="DRINK">DRINK</option>
                    </select><br />

                    <input type="submit" value="Submit" name="submit">
                    <input type="button" value="Return" name="return" onclick="">
                </form>
            </div>
            <div id="kantine-remove">
                <form class="kantine-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <span id="foto" name="foto"><img src="../images/340x260.png"></span><br />

                    <label for="naam"><strong>Item Naam:</strong></label>
                    <span id="naam" name="naam">Snackje Lorem</span><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <span id="descriptie" name="descriptie">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas magnam praesentium possimus numquam necessitatibus.</span><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <span id="prijs" name="prijs">$99.40</span><br />

                    <label for="categorie"><strong>Item categorie</strong></label>
                    <span id="categorie" name="categorie">SNACK</span><br />

                    <input type="button" value="Remove" onclick="return confirm('Weet je het zeker?')">
                    <input type="button" value="Return" name="return" onclick="">
                </form>
            </div>
        </div>

    </div>
    <div>
        <?php include('footer.php'); ?>

</body>

</html>