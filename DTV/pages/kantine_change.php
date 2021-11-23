<?php

$username = "bveens_dtv";
$password = "Tennis@DTV!";
$dbname = "bveens_dtv";


$servername = "localhost";

$username = "root";
$password = "";
$dbname = "dtv";


// define variables and set to empty values
$naamErr = $prijsErr = $fotoErr = $categorieErr = $ddescriptieErr = "";
$naam = $prijs = $foto = $categorie = $descriptie = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nummer = $_GET['nummer'];
    $stmt = $conn->query("SELECT * FROM `artikelen` WHERE `nummer`=" . $nummer . "");
    $result = $stmt->fetch();
    var_dump($result);
    $naam = $result["naam"];
    $prijs = $result["prijs"];
    $foto = $result["foto"];
    $categorie = $result["categorie"];
    $descriptie = $result["descriptie"];
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    if (!isset($_FILES["foto"])) {
        $fotoErr = "Foto is required";
    } else {
        $foto = test_input(htmlspecialchars(basename($_FILES["foto"]["name"])));
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
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $uploadOk = 1;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE artikelen SET naam=?, descriptie=?, foto=?, prijs=?, categorie=? WHERE nummer=?";
            $stmt = $conn->prepare($sql);
            $nummer = (int) $_POST['nummer'];
            $foto = "images/" . basename($_FILES["foto"]["name"]);
            $stmt->execute([$naam, $descriptie, $foto, $prijs, $categorie, $nummer]);

            echo "Record updated successfully";

            $naam = $prijs = $foto = $categorie = $descriptie = "";
            $conn = null;
            if (headers_sent()) {
                die("Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
            }
            else{
                exit(header("location:kantine.php"));
            }
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
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
    <title>Kantine Create</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--IF USER IS ADMIN THIS SHOWS-->
    <?php include('kantine_admin.php') ?>
</head>

<body>
    <?php include('header.php'); ?>
    <div id="kantine-change">
        <form class="kantine-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">

            <label for="naam"><strong>Item Naam:</strong></label>
            <input type="text" id="naam" name="naam" required value="<?php echo $naam; ?>"><br />

            <label for="descriptie"><strong>Item Descriptie</strong></label>
            <textarea id="descriptie" name="descriptie" rows="5" cols="40" maxlength="55" required><?php echo $descriptie; ?></textarea><br />

            <label for="foto"><strong>Item Foto</strong></label>
            <input type="file" id="foto" name="foto"><br />
            <span id="foto" name="foto"><img src="../<?php echo $foto; ?>"></span><br />

            <label for="prijs"><strong>Item Prijs</strong></label>
            <input type="doubleval" id="prijs" name="prijs" required value="<?php echo $prijs; ?>"><br />

            <label for="categorie"><strong>Item categorie</strong></label>
            <span id="categorie" name="categorie"><?php echo $categorie; ?></span><br />
            <select id="categorie" name="categorie" required>
                <option value="SNACK">SNACK</option>
                <option value="DRINK">DRINK</option>
            </select><br />

            <input type="submit" value="Submit" name="submit">
            <a type="button" class="button" name="return" href="kantine.php">Terug</a>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>