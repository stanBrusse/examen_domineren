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
$titleErr = $activiteitErr = $datum_activiteitErr = $datum_ingeschrevenErr = $tijd_startErr = $tijd_eindErr = "";
$title = $activiteit = $datum_activiteit = $datum_ingeschreven = $tijd_start = $tijd_eind = $nummer = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new db;
    $nummer = (int) $_GET['nummer'];
    $nummer = intval($nummer);

    $stmt = $db->query("SELECT * FROM `activiteiten` WHERE `nummer`=" . $nummer . "");
    $stmt->execute();
    while ($result = $stmt->fetch()) {
        $title = $result["title"];
        $activiteit = $result["activiteit"];
        $datum_activiteitA = $result["datum_activiteit"];
        $datum_ingeschrevenA = $result["datum_ingeschreven"];
        $tijd_start = $result["tijd_start"];
        $tijd_eind = $result["tijd_eind"];

        setlocale(LC_TIME, "Dutch");
        $datum_activiteit = strftime("%A %d %B %Y", strtotime($result["datum_activiteit"]));
        $datum_ingeschreven = strftime("%A %d %B %Y", strtotime($result["datum_ingeschreven"]));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadOk = 0;
    $db = new db;
    $nummer = $_POST["nummer"];
    if (empty($_POST["title"])) {
        $uploadOk = 0;
        echo 'title failed';
    } else {
        $title = test_input($_POST["title"]);
        $uploadOk = 1;
    }

    if (empty($_POST["activiteit"])) {
        $uploadOk = 0;
        echo 'activiteit failed';
    } else {
        $activiteit = test_input($_POST["activiteit"]);
        $uploadOk = 1;
    }

    if (empty($_POST["datum_activiteit"])) {
        $uploadOk = 0;
        echo 'datum_activiteit failed';
    } else {
        $datum_activiteit = test_input($_POST["datum_activiteit"]);
        $datum_activiteit = date("Y-m-d", strtotime($datum_activiteit));
        $uploadOk = 1;
    }

    if (empty($_POST["datum_ingeschreven"])) {
        $uploadOk = 0;
        echo 'datum_ingeschreven failed';
    } else {
        $datum_ingeschreven = test_input($_POST["datum_ingeschreven"]);
        $datum_ingeschreven = date("Y-m-d", strtotime($datum_ingeschreven));
        $uploadOk = 1;
    }

    if (empty($_POST["tijd_start"])) {
        $uploadOk = 0;
        echo 'tijd_start failed';
    } else {
        $tijd_start = test_input($_POST["tijd_start"]);
        $tijd_start = str_replace(':', '', $tijd_start);
        $uploadOk = 1;
    }

    if (empty($_POST["tijd_eind"])) {
        $uploadOk = 0;
        echo 'tijd_eind failed';
    } else {
        $tijd_eind = test_input($_POST["tijd_eind"]);
        $tijd_eind = str_replace(':', '', $tijd_eind);
        $uploadOk = 1;
    }



    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        try {
            $db = new db;
            $stmt = $db->query("UPDATE `activiteiten` SET `title`=?, `activiteit`=?, `datum_activiteit`=?, `datum_ingeschreven`=?, `tijd_start`=?, `tijd_eind`=? WHERE `nummer`=?");
            // use exec() because no results are returned
            $stmt->execute([$title, $activiteit, $datum_activiteit, $datum_ingeschreven, $tijd_start, $tijd_eind, $nummer]);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $titleErr = $activiteitErr = $datum_activiteitErr = $datum_ingeschrevenErr = $tijd_startErr = $tijd_eindErr = "";
        $title = $activiteit = $datum_activiteit = $datum_ingeschreven = $tijd_start = $tijd_eind = $nummer = "";
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=../pages/activiteiten_beheer.php>Beheer activiteiten Page</a>");
        } else {
            exit(header("location:activiteiten_beheer.php"));
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activiteit Create</title>
    <script src="https://title.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/activiteiten_admin.css">
</head>

<body>
    <div class="activiteiten-container">
        <div id="activiteiten-create">
            <form class="activiteiten-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="hidden" name="nummer" value="<?php echo $nummer; ?>">
                <section class="section-activiteit">
                    <label for="activiteit">Activiteit:</label><br>
                    <?php if ($activiteit == "Toernooi" || !($activiteit == "Toernooi" && $activiteit == "Wedstrijd" && $activiteit == "Training")) { ?>
                        <label for="Toernooi">Toernooi</label>
                        <input class="mdc-radio__native-control" type="radio" id="Toernooi" value="Toernooi" name="activiteit" checked>
                        <label for="Wedstrijd">Wedstrijd</label>
                        <input class="mdc-radio__native-control" type="radio" id="Wedstrijd" value="Wedstrijd" name="activiteit">
                        <label for="Training">Training</label>
                        <input class="mdc-radio__native-control" type="radio" id="Training" value="Training" name="activiteit"><br>
                    <?php } elseif ($activiteit == "Wedstrijd") { ?>
                        <label for="Toernooi">Toernooi</label>
                        <input class="mdc-radio__native-control" type="radio" id="Toernooi" value="Toernooi" name="activiteit">
                        <label for="Wedstrijd">Wedstrijd</label>
                        <input class="mdc-radio__native-control" type="radio" id="Wedstrijd" value="Wedstrijd" name="activiteit" checked>
                        <label for="Training">Training</label>
                        <input class="mdc-radio__native-control" type="radio" id="Training" value="Training" name="activiteit"><br>
                    <?php } elseif ($activiteit == "Training") { ?>
                        <label for="Toernooi">Toernooi</label>
                        <input class="mdc-radio__native-control" type="radio" id="Toernooi" value="Toernooi" name="activiteit">
                        <label for="Wedstrijd">Wedstrijd</label>
                        <input class="mdc-radio__native-control" type="radio" id="Wedstrijd" value="Wedstrijd" name="activiteit">
                        <label for="Training">Training</label>
                        <input class="mdc-radio__native-control" type="radio" id="Training" value="Training" name="activiteit" checked><br>
                    <?php } ?>
                </section>

                <section class="section-title">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $title; ?>"><br>
                </section>

                <section class="section-datum_activiteit">
                    <label for="datum_activiteit">Activiteit Datum: <?php echo $datum_activiteit ?></label>
                    <input type="date" name="datum_activiteit"><br>
                </section>

                <section class="section-datum_ingeschreven">
                    <label for="datum_ingeschreven">Voor Datum Inschrijven: <?php echo $datum_ingeschreven ?></label>
                    <input type="date" name="datum_ingeschreven"><br>
                </section>

                <section class="section-tijd_start">
                    <label for="tijd_start">Start:</label>
                    <input type="time" name="tijd_start" min="12:00" max="22:00" step="1800" value="<?php echo substr_replace($tijd_start, ':', 2, 0); ?>"><br>
                </section>

                <section class="section-tijd_eind">
                    <label for="tijd_start">Eind:</label>
                    <input type="time" name="tijd_eind" min="13:00" max="23:00" step="1800" value="<?php echo substr_replace($tijd_eind, ':', 2, 0); ?>"><br>
                </section>

                <section class="section-submit">
                    <input type="submit" value="Toevoegen">
                </section>
            </form>
            <form class="activiteiten-form" action="activiteiten_beheer.php" method="GET">
                <section class="section-return"><input type="submit" value="Ik heb genoeg toegevoegd." name="submit"></section>
            </form>
        </div>
    </div>


    <?php
    include('footer.php');
    ?>
</body>

</html>