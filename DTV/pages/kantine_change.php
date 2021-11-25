<?php
include('header.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] != "admin" && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    if (headers_sent()) {
        die("You are not a Admin. Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
    } else {
        exit(header("location:kantine.php"));
    }
}
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
    $db = new db;
    $nummer = $_GET['nummer'];
    $stmt = $db->query("SELECT * FROM `artikelen` WHERE `nummer`=" . $nummer . "");
    $result = $stmt->fetch();

    $naam = $result["naam"];
    $prijs = $result["prijs"];
    $foto = $result["foto"];
    $categorie = $result["categorie"];
    $descriptie = $result["descriptie"];
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nummer = (int) $_POST['nummer'];
    if (empty($_POST["naam"])) {
        $naamErr = "Naam is required";
        $uploadOk = 0;
    } else {
        $naam = test_input($_POST["naam"]);
        $uploadOk = 1;
    }
    if (empty($_POST["prijs"])) {
        $prijsErr = "Prijs is required";
        $uploadOk = 0;
    } else {
        $prijs = test_input($_POST["prijs"]);
        $uploadOk = 1;
    }

    if (empty($_POST["categorie"])) {
        $categorieErr = "categorie is required";
        $uploadOk = 0;
    } else {
        $categorie = test_input($_POST["categorie"]);
        $categorie = strtolower($categorie);
        $uploadOk = 1;
    }
    if (empty($_POST["descriptie"])) {
        $descriptieErr = "Description is required";
        $uploadOk = 0;
    } else {
        $descriptie = test_input($_POST["descriptie"]);
        $uploadOk = 1;
    }

    $fotoUp = basename($_FILES["foto"]["name"]);

    if ($fotoUp == "") {
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            echo "NO IMAGE";
            try {
                $db = new db;

                $stmt = $db->query("UPDATE artikelen SET naam=?, descriptie=?, foto=?, prijs=?, categorie=? WHERE nummer=?");
                $nummer = (int) $_POST['nummer'];
                $fotoUp = basename($_FILES["foto"]["name"]);
                if ($fotoUp == "") {
                    $fotoUp = "NoImageWasUploaded";
                }
                $foto = "images/kantine_items/" . $fotoUp;
                $stmt->execute([$naam, $descriptie, $foto, $prijs, $categorie, $nummer]);

                $naam = $prijs = $foto = $categorie = $descriptie = "";
                $conn = null;
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
                } else {
                    exit(header("location:kantine.php"));
                }
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    } else {
        echo "IMAGE";
        $uploadOk = 1;
        $db = new db;

        $stmt = $db->query("SELECT * FROM `artikelen` WHERE `nummer`=" . $nummer . "");
        $result = $stmt->fetch();

        if (!empty($_FILES["foto"]["tmp_name"])) {

            $target_dir = "../images/kantine_items/";
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
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }


            if ($_POST['foto_old'] == "images/NoImage.png") {
            } else {
                $target_file_old = '../' . $_POST['foto_old'];
                $imageFileType = strtolower(pathinfo($target_file_old, PATHINFO_EXTENSION));
                if (file_exists($target_file_old)) {
                    unlink($target_file_old);
                }
            }


            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                try {
                    $db = new db;

                    $stmt = $db->query("UPDATE artikelen SET naam=?, descriptie=?, foto=?, prijs=?, categorie=? WHERE nummer=?");
                    $nummer = (int) $_POST['nummer'];
                    $fotoUp = basename($_FILES["foto"]["name"]);
                    if ($fotoUp == "") {
                        $fotoUp = "NoImageWasUploaded";
                    }
                    $foto = "images/kantine_items/" . $fotoUp;
                    $stmt->execute([$naam, $descriptie, $foto, $prijs, $categorie, $nummer]);

                    $naam = $prijs = $foto = $categorie = $descriptie = "";
                    $conn = null;
                    if (headers_sent()) {
                        die("Redirect failed. Please click on this link: <a href=../pages/kantine.php>Kantine Page</a>");
                    } else {
                        exit(header("location:kantine.php"));
                    }
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
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
    <title>Kantine Change</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <link rel="stylesheet" href="../css/kantine_admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="kantine-container">
        <div id="kantine-change">
            <form class="kantine-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="hidden" name="_METHOD" value="DELETE">
                <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
                <input type="hidden" name="foto_old" value="<?php echo $foto; ?>">

                <section class="section-naam">
                    <label for="naam"><strong>Item Naam: </strong></label>
                    <input type="text" id="naam" name="naam" required value="<?php echo $naam; ?>"><br />
                </section>

                <section class="section-descriptie">
                    <label for="descriptie"><strong>Item Descriptie: </strong></label>
                    <textarea id="descriptie" name="descriptie" rows="3" cols="20" maxlength="55" required><?php echo $descriptie; ?></textarea><br />
                </section>

                <section class="section-foto">
                    <label for="foto"><strong>Item Foto: </strong></label>
                    <input type="file" id="foto" name="foto"><br />
                    <span id="foto" name="foto"><img src="../<?php echo $foto; ?>"></span><br />
                </section>

                <section class="section-prijs">
                    <label for="prijs"><strong>Item Prijs: </strong></label>
                    <input type="doubleval" id="prijs" name="prijs" required value="<?php echo $prijs; ?>"><br />
                </section>

                <section class="section-categorie">
                    <label for="categorie"><strong>Item categorie: </strong></label>
                    <span id="categorie" name="categorie"><?php echo $categorie; ?> </span>
                    <?php if ($categorie == "drink") { ?>
                        <select id="categorieSel" name="categorie" required>
                            <option value="SNACK">SNACK</option>
                            <option value="DRINK" selected="selected">DRINK</option>
                        </select><br />
                    <?php } elseif ($categorie == "snack") { ?>
                        <select id="categorieSel" name="categorie" required>
                            <option value="SNACK" selected="selected">SNACK</option>
                            <option value="DRINK">DRINK</option>
                        </select><br />
                    <?php } ?>
                </section>

                <input type="submit" value="Submit" name="submit">
                <a type="button" class="button" name="return" href="kantine.php">Terug</a>
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>