<?php
$servername = "localhost";
$username = "root";
$password = "";
$usernameCPanel = "bveens_dtv";
$passwordCPanel = "Tennis@DTV!";
$dbnameCPanel = "bveens_dtv";
$dbname = "dtv";

// define variables and set to empty values
$naamErr = $prijsErr = $fotoErr = $categorieErr = $ddescriptieErr = "";
$naam = $prijs = $foto = $categorie = $descriptie = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `artikelen` (naam, descriptie, foto, prijs, categorie) VALUES (?, ?, ?, ?, ?)";
                // use exec() because no results are returned
                $conn->prepare($sql)->execute([$naam, $descriptie, $foto, $prijs, $categorie]);
                echo "New record created successfully";
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            $naam = $prijs = $foto = $categorie = $descriptie = "";
            $conn = null;
        } else {
            echo "Sorry, there was an error uploading your file.";
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
    <script src="../js/kantine.js"></script>
    <!--IF USER IS ADMIN THIS SHOWS-->
    <?php include('kantine_admin.php') ?>
</head>

<body>
    <?php include('header.php'); ?>
    <div id="kantine-create">
        <form class="kantine-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="naam"><strong>Item Naam:</strong></label>
            <input type="text" id="naam" name="naam" required><br />

            <label for="descriptie"><strong>Item Descriptie</strong></label>
            <textarea id="descriptie" name="descriptie" rows="3" cols="30" maxlength="55" required></textarea><br />

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
            <a type="button" class="button" name="return" href="kantine.php">Ik heb genoeg toegevoegd</a>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>