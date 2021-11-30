<?php

include('header.php');


if (isset($_SESSION['rol']) && $_SESSION['rol'] != "admin" && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    if (headers_sent()) {
        die("You are not a Admin. Redirect failed. Please click on this link: <a href=../pages/index.php>home Page</a>");
    } else {
        exit(header("location:index.php"));
    }
}

// define variables and set to empty values
$codeErr = $soortErr = $liggingErr = $lengteErr = $breedteErr = $vloerErr = $checkErr = $serviceErr = "";
$code = $soort = $ligging = $lengte = $breedte = $vloer = $check = $service = $checkA = $serviceA = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new db;
    $nummer = (int) $_GET['nummer'];
    $nummer = intval($nummer);

    $stmt = $db->query("SELECT * FROM `banen` WHERE `nummer`=" . $nummer . "");
    $stmt->execute();
    while ($result = $stmt->fetch()) {
        $code = $result["code"];
        $soort = $result["soort"];
        $ligging = $result["ligging"];
        $lengte = $result["afmeting_lengte"];
        $breedte = $result["afmeting_breedte"];
        $vloer = $result["vloer"];
        $checkA = $result["check_datum"];
        $serviceA = $result["service_datum"];
        setlocale(LC_TIME, "Dutch");
        $check = strftime("%A %d %B %Y", strtotime($result["check_datum"]));
        $service = strftime("%A %d %B %Y", strtotime($result["service_datum"]));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && !isset($_POST['delete'])) {
    $db = new db;
    $nummer = $_POST["nummer"];
    $stmt = $db->query("SELECT `check_datum`, `service_datum` FROM `banen` WHERE `nummer`=" . $nummer . "");
    $stmt->execute();
    while ($result = $stmt->fetch()) {
        $checkA = $result["check_datum"];
        $serviceA = $result["service_datum"];
    }
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
        $check = $checkA;
        echo 'Check failed';
    } else {
        $check = test_input($_POST["check"]);
        $check = date("Y-m-d", strtotime($check));
        $uploadOk = 1;
    }

    if (empty($_POST["service"])) {
        $service = $serviceA;
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
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=../pages/banen_beheer.php>Beheer banen Page</a>");
        } else {
            exit(header("location:banen_beheer.php"));
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['submit']) && isset($_POST['delete'])) {
    $nummer = $_POST["nummer"];

    try {
        $db = new db;
        $stmt = $db->query("DELETE FROM `banen` WHERE nummer=?");
        // use exec() because no results are returned
        $stmt->execute([$nummer]);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $codeErr = $soortErr = $liggingErr = $lengteErr = $breedteErr = $vloerErr = $checkErr = $serviceErr = "";
    $code = $soort = $ligging = $lengte = $breedte = $vloer = $check = $service = $nummer = "";
    $pdo = null;
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/banen_beheer.php>Beheer banen Page</a>");
    } else {
        exit(header("location:banen_beheer.php"));
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
    <meta charset="utf-8" lang="nl">
    <title>banen Create</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/banen_admin.css">
</head>

<body>
    <div class="banen-container">
        <div id="banen-create">
            <a type="button" href="banen_beheer.php">Terug</a>
            <form class="banen-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
                <section class="section-code">
                    <label for="code"><strong>Baan code:</strong></label>
                    <input type="text" id="code" name="code" required value="<?php echo $code; ?>"><br />
                </section>
                <section class="section-soort">
                    <label for="soort"><strong>Baan sport:</strong></label>
                    <input type="text" id="soort" name="soort" required value="<?php echo $soort; ?>"><br />
                </section>
                <section class="section-ligging">
                    <label for="ligging"><strong>Baan ligging:</strong></label>
                    <input type="text" id="ligging" name="ligging" required value="<?php echo $ligging; ?>"><br />
                </section>
                <section class="section-lengte">
                    <label for="lengte"><strong>Baan lengte(23.43):</strong></label>
                    <input type="doubleval" id="lengte" name="lengte" required value="<?php echo $lengte; ?>"><br />
                </section>
                <section class="section-breedte">
                    <label for="breedte"><strong>Baan breedte(23.43):</strong></label>
                    <input type="doubleval" id="breedte" name="breedte" required value="<?php echo $breedte; ?>"><br />
                </section>
                <section class="section-vloer">
                    <label for="vloer"><strong>Baan vloer:</strong></label>
                    <input type="text" id="vloer" name="vloer" required value="<?php echo $vloer ?>"><br />
                </section>
                <section class="section-check">
                    <label for="check"><strong>Baan check: <?php echo $check ?></strong></label>
                    <input type="date" id="check" name="check"><br />
                </section>
                <section class="section-service">
                    <label for="service"><strong>Baan service: <?php echo $service ?></strong></label>
                    <input type="date" id="service" name="service"><br />
                </section>
                <section class="section-submit">
                    <input type="submit" value="Update" name="submit">
                    <input type="submit" onclick="return confirm('Weet je het heel zeker?');" value="Delete" name="delete">
                </section>
            </form>


        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>