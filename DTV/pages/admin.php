<?php
include('header.php');

if ($_SESSION['rol'] == "admin" && $_SESSION['loggedIn'] == true) {
} else {
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=../pages/index.php");
    } else {
        exit(header("location:index.php"));
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        .box {
            border: 1px solid black;
            height: 350px;
            width: 250px;
            float: left;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .container {
            text-align: center;
        }

        .banenButton {
            margin-top: 150px;
            border: 1px solid black;
            width: auto;
        }

        .banenButton:hover {
            background-color: lightsteelblue;
        }

        .tekst {
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="container">

            <div class="box leden">
                <h3 class="tekst">Leden beheren</h3>
                <form action="adminLeden.php" method="GET"><input type="submit" value="Leden beheren" class="banenButton"></form>
            </div>

            <div class="box activiteit_beheer">
                <h3 class="tekst">Activiteit beheer</h3>
                <form action="activiteiten_beheer.php" method="GET"><input type="submit" value="Activiteit beheer" class="banenButton"></form>
            </div>

            <div class="box banen_beheer">
                <h3 class="tekst">Baan beheer</h3>
                <form action="banen_beheer.php" method="GET"><input type="submit" value="Baan beheer" class="banenButton"></form>
            </div>

            <div class="box kantine_beheer">
                <h3 class="tekst">Kantine beheer</h3>
                <form action="kantine.php" method="GET"><input type="submit" value="Kantine beheer" class="banenButton"></form>
            </div>

        </div>
        
    </section>



    <?php
    include('footer.php');
    ?>
</body>

</html>