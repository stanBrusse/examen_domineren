<?php
$servername = "localhost";
$username = "root";
$password = "";
$usernameCPanel = "bveens_dtv";
$passwordCPanel = "Tennis@DTV!";
$dbnameCPanel = "bveens_dtv";
$dbname = "dtv";

$filename = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nummer = $_GET['nummer'];
    $stmt = $conn->query("SELECT * FROM `artikelen` WHERE `nummer`=" . $nummer . "");
    $result = $stmt->fetch();
    $filename = $result["foto"];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        
        if (file_exists('../' .$filename)) {
          unlink('../' .$filename);
          echo 'File '.$filename.' has been deleted';
        } else {
          echo 'Could not delete '.$filename.', file does not exist';
        }
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nummer = (int) $_POST['nummer'];
        // sql to delete a record
        $sql = "DELETE FROM `artikelen` WHERE `nummer`=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nummer]);

        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $naam = $prijs = $foto = $categorie = $descriptie = "";
    $conn = null;
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/kantine.php>");
    }
    else{
        exit(header("location:kantine.php"));
    }
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
    <?php
    $action = htmlspecialchars($_SERVER["PHP_SELF"]);
    $areyousure = `Weet je het zeker?`;
    $foto = "images/NoImage.png";
    if (file_exists('../' . $result["foto"]) && $result["foto"] != "") {
        $foto = $result["foto"];
    } else {
        $foto = "images/NoImage.png";
    }
    $nummer = $result["nummer"];
    $naam = $result["naam"];
    $descriptie = $result["descriptie"];
    $prijs = $result["prijs"];
    $categorie = strtoupper($result["categorie"]);
    ?>
    <div id="kantine-remove">
        <form class="kantine-form" method="POST" onsubmit="return confirm('Are you sure you want to delete this case?')">
            <input type="hidden" name="_METHOD" value="DELETE">
            <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
            <span id="foto" name="foto"><img src="../<?php echo $foto; ?>"></span><br />

            <label for="naam"><strong>Item Naam:</strong></label>
            <span id="naam" name="naam"><?php echo $naam; ?></span><br />

            <label for="descriptie"><strong>Item Descriptie</strong></label>
            <span id="descriptie" name="descriptie"><?php echo $descriptie; ?></span><br />

            <label for="prijs"><strong>Item Prijs</strong></label>
            <span id="prijs" name="prijs">€<?php echo $prijs; ?></span><br />

            <label for="categorie"><strong>Item categorie</strong></label>
            <span id="categorie" name="categorie"><?php echo $categorie; ?></span><br />

            <button type="submit">Remove</button>
            <a type="button" class="button" name="return" href="kantine.php">Terug</a>
        </form>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>