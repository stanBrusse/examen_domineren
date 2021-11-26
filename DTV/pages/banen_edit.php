<?php
include('header.php');
include('../php/db.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] != "admin" && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    if (headers_sent()) {
        die("You are not a Admin. Redirect failed. Please click on this link: <a href=../pages/index.php>home Page</a>");
    } else {
        exit(header("location:index.php"));
    }
}

// define variables and set to empty values
$codeErr = $soortErr = $liggingErr = $lengteErr = $breedteErr = $vloerErr = $checkErr = $serviceErr = "";
$code = $soort = $ligging = $lengte = $breedte = $vloer = $check = $service = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new db;
    $nummer = $_GET['nummer'];
    $stmt = $db->query("SELECT * FROM `banen` WHERE `nummer`=" . $nummer . "");
    $result = $stmt->fetch();
    print_r($result);
    echo $result;

    $code = $result["code"];
    $soort = $result["soort"];
    $ligging = $result["ligging"];
    $lengte = $result["afmeting_lengte"];
    $breedte = $result["afmeting_breedte"];
    $vloer = $result["vloer"];
    $check = $result["check_datum"];
    $service = $result["service_datum"];

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nummer = $_POST["nummer"];
    $uploadOk = 0;
    if (empty($_POST["code"])) {
        $uploadOk = 0;
        echo 'Code failed';
    } else {
        $code = test_input($_POST["code"]);
        $uploadOk = 1;
    }

    if (empty($_POST["soort"])) {
        $uploadOk = 0;
        echo 'Soort failed';
    } else {
        $soort = test_input($_POST["soort"]);
        $uploadOk = 1;
    }

    if (empty($_POST["ligging"])) {
        $uploadOk = 0;
        echo 'Ligging failed';
    } else {
        $ligging = test_input($_POST["ligging"]);
        $uploadOk = 1;
    }

    if (empty($_POST["lengte"])) {
        $uploadOk = 0;
        echo 'Lengte failed';
    } else {
        $lengte = test_input($_POST["lengte"]);
        $uploadOk = 1;
    }

    if (empty($_POST["breedte"])) {
        $uploadOk = 0;
        echo 'breedte failed';
    } else {
        $breedte = test_input($_POST["breedte"]);
        $uploadOk = 1;
    }

    if (empty($_POST["vloer"])) {
        $uploadOk = 0;
        echo 'Vloer failed';
    } else {
        $vloer = test_input($_POST["vloer"]);
        $uploadOk = 1;
    }

    if (empty($_POST["check"])) {
        $uploadOk = 0;
        echo 'Check failed';
    } else {
        $check = test_input($_POST["check"]);
        $check = date("Y-m-d", strtotime($check));
        $uploadOk = 1;
    }

    if (empty($_POST["service"])) {
        $uploadOk = 0;
        echo 'Service failed';
    } else {
        $service = test_input($_POST["service"]);
        $service = date("Y-m-d", strtotime($service));
        $uploadOk = 1;
    }



    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        try {
            $db = new db;
            $stmt = $db->query("UPDATE `banen` SET code=?, soort=?, ligging=?, afmeting_lengte=?, afmeting_breedte=?, vloer=?, check_datum=?, service_datum=? WHERE nummer=?");
            // use exec() because no results are returned
            $stmt->execute([$code, $soort, $ligging, $lengte, $breedte, $vloer, $check, $service, $nummer]);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $codeErr = $soortErr = $liggingErr = $lengteErr = $breedteErr = $vloerErr = $checkErr = $serviceErr = "";
        $code = $soort = $ligging = $lengte = $breedte = $vloer = $check = $service = $nummer = "";
        $pdo = null;
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
    <title>banen Create</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/banen_admin.css">
</head>

<body>
    <div class="banen-container">
        <div id="banen-create">
            <a type="button" href="banen_onderhoud.php">Terug</a>
            <form class="banen-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
                <section class="section-code">
                    <label for="code"><strong>Baan code:</strong></label>
                    <input type="text" id="code" name="code" required value="<?php echo $code; ?>"><br />
                </section>
                <section class="section-soort">
                    <label for="soort"><strong>Baan soort:</strong></label>
                    <input type="text" id="soort" name="soort" required value="<?php echo $soort; ?>"><br />
                </section>
                <section class="section-ligging">
                    <label for="ligging"><strong>Baan ligging:</strong></label>
                    <input type="text" id="ligging" name="ligging" required value="<?php echo $ligging; ?>"><br />
                </section>
                <section class="section-lengte">
                    <label for="lengte"><strong>Baan lengte:</strong></label>
                    <input type="doubleval" id="lengte" name="lengte" required value="<?php echo $lengte; ?>"><br />
                </section>
                <section class="section-breedte">
                    <label for="breedte"><strong>Baan breedte:</strong></label>
                    <input type="doubleval" id="breedte" name="breedte" required value="<?php echo $breedte; ?>"><br />
                </section>
                <section class="section-vloer">
                    <label for="vloer"><strong>Baan vloer:</strong></label>
                    <input type="text" id="vloer" name="vloer" required value="<?php echo $vloer; ?>"><br />
                </section>
                <section class="section-check">
                    <label for="check"><strong>Baan check:</strong></label>
                    <input type="date" id="check" name="check" required value="<?php echo $check; ?>"><br />
                </section>
                <section class="section-service">
                    <label for="service"><strong>Baan service:</strong></label>
                    <input type="date" id="service" name="service" required value="<?php echo $service; ?>"><br />
                </section>
                <section class="section-submit">
                    <input type="submit" value="Submit" name="submit">
                    <input type="delete" value="Delete" name="delete">
                </section>
            </form>


        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>