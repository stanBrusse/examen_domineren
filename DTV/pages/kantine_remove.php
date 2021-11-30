<?php
include('header.php');


if (isset($_SESSION['rol']) && $_SESSION['rol'] != "admin" && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    if (headers_sent()) {
        die("You are not a Admin. Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
    } else {
        exit(header("location:kantine.php"));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new db;
    $nummer = $_GET['nummer'];
    $stmt = $db->query("SELECT * FROM `artikelen` WHERE `nummer`=" . $nummer . "");
    $stmt->execute();
    $result = $stmt;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {


    try {
        $target_dir = "../";
        $target_file = $target_dir . $_POST["foto"];
        if (file_exists($target_file) && $_POST["foto"] != "images/NoImage.png") {
            unlink($target_file);
        } else {
            echo 'Could not delete ' . $target_file . ', file does not exist';
        }
        $db = new db;

        $nummer = (int) $_POST['nummer'];
        // sql to delete a record
        $stmt = $db->query("DELETE FROM `artikelen` WHERE `nummer`=?");
        $stmt->execute([$nummer]);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $naam = $prijs = $foto = $categorie = $descriptie = "";
    $conn = null;
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
    } else {
        exit(header("location:kantine.php"));
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kantine Remove</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <link rel="stylesheet" href="../css/kantine_admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    while ($item = $result->fetch()) {
        $action = htmlspecialchars($_SERVER["PHP_SELF"]);
        $areyousure = `Weet je het zeker?`;
        $foto = "images/NoImage.png";
        if (file_exists('../' . $item["foto"]) && $item["foto"] != "") {
            $foto = $item["foto"];
        } else {
            $foto = "images/NoImage.png";
        }

        $nummer = $item["nummer"];
        $naam = $item["naam"];
        $descriptie = $item["descriptie"];
        $prijs = $item["prijs"];
        $categorie = strtoupper($item["categorie"]);
    }
    ?>
    <div class="kantine-container">
        <div id="kantine-remove">
            <form class="kantine-form" method="POST" onsubmit="return confirm('Are you sure you want to delete this case?')">
                <input type="hidden" name="_METHOD" value="DELETE">
                <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
                <section class="section-foto">
                    <input type="hidden" id="foto" name="foto" value="<?php echo $foto; ?>">
                    <span id="foto" name="foto"><img src="../<?php echo $foto; ?>"></span><br />
                </section>

                <section class="section-naam">
                    <label for="naam"><strong>Item Naam:</strong></label>
                    <span id="naam" name="naam"><?php echo $naam; ?></span><br />
                </section>

                <section class="section-descriptie">
                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <span id="descriptie" name="descriptie"><?php echo $descriptie; ?></span><br />
                </section>

                <section class="section-prijs">
                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <span id="prijs" name="prijs">€<?php echo $prijs; ?></span><br />
                </section>

                <section class="section-categorie">
                    <label for="categorie"><strong>Item categorie</strong></label>
                    <span id="categorie" name="categorie"><?php echo $categorie; ?></span><br />
                </section>

                <button type="submit">Remove</button>
                <a type="button" class="button" name="return" href="kantine.php">Terug</a>
            </form>
        </div>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>