<?php

// deze database is voor het maken en testen. kan weg
$servername = "localhost";
$username = "DTVUSER";
$password = "1234";
$dbname = "dtv";
$charset = "utf8mb4";

//maakt de connectie aan
$dsn = "mysql:host=" . $servername . "; dbname=" . $dbname . "; charset=" . $charset;
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php
include('header.php');
?>
<section id="schedule">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h6>Onze Weekelijkse Toernooien</h6>

                <h2 class="text-dark">Toernooien</h2>
            </div>

            <div class="col-lg-12 py-5 col-md-12 col-12">
                <table class="table table-bordered table-responsive schedule-table">
                    <?php
                    $startdateMaandag = strtotime("Monday");
                    $startdateDinsdag = strtotime("Tuesday");
                    $startdateWoensdag = strtotime("Wednesday");
                    $startdateDonderdag = strtotime("Thursday");
                    $startdateVrijdag = strtotime("Friday");
                    $startdateZaterdag = strtotime("Saturday");
                    $startdateZondag = strtotime("Sunday");
                    $enddate = strtotime("+1000 weeks", $startdateMaandag);

                    $maandag = date("Y-m-d", $startdateMaandag);
                    $dinsdag = date("Y-m-d", $startdateDinsdag);
                    $woensdag = date("Y-m-d", $startdateWoensdag);
                    $donderdag = date("Y-m-d", $startdateDonderdag);
                    $vrijdag = date("Y-m-d", $startdateVrijdag);
                    $zaterdag = date("Y-m-d", $startdateZaterdag);
                    $zondag = date("Y-m-d", $startdateZondag);


                    ?>
                    <thead class="thead-light">
                    <th><i class="fa fa-calendar"></i></th>
                    <th><?php // Maandag
                        if ($startdateMaandag < $enddate) {
                            echo $maandag;
                            $startdateMaandag = strtotime("+1 week", $startdateMaandag);}?></th>
                    <th><?php // Dinsdag
                        if ($startdateDinsdag < $enddate) {
                            echo $dinsdag;
                            $startdateDinsdag = strtotime("+1 week", $startdateDinsdag);}?></th>
                    <th><?php // Woensdag
                        if ($startdateWoensdag < $enddate) {
                            echo $woensdag;
                            $startdateWoensdag = strtotime("+1 week", $startdateWoensdag);}?></th>
                    <th><?php // Donderdag
                        if ($startdateDonderdag < $enddate) {
                            echo $donderdag;
                            $startdateDonderdag = strtotime("+1 week", $startdateDonderdag);}?></th>
                    <th><?php // Vrijdag
                        if ($startdateVrijdag < $enddate) {
                            echo $vrijdag;
                            $startdateVrijdag = strtotime("+1 week", $startdateVrijdag);}?></th>
                    <th><?php // Zaterdag
                        if ($startdateZaterdag < $enddate) {
                            echo $zaterdag;
                            $startdateZaterdag = strtotime("+1 week", $startdateZaterdag);}?></th>
                    <th><?php // Zondag
                        if ($startdateZondag < $enddate) {
                            echo $zondag;
                            $startdateZondag = strtotime("+1 week", $startdateZondag);}?></th>
                    </thead>

                    <tbody>
                    <tr>
                        <td><small class="">7:00 am</small></td>
                        <?php


                        $query = $pdo->prepare("SELECT * FROM activiteiten");
                        $query->execute();
                        $toernooi = $query->fetch();

                            if ($toernooi["datum_activiteit"] == $maandag) {
                                echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                            } else {
                                echo '<td></td>';
                            }

                        if ($toernooi["datum_activiteit"] == $dinsdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $woensdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $donderdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $vrijdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zaterdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zondag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }
                        ?>
                    </tr>

                    <tr>
                        <td><small>9:00 am</small></td>
                        <?php
                        if ($toernooi["datum_activiteit"] == $maandag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $dinsdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $woensdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $donderdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $vrijdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zaterdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zondag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td><small>11:00 am</small></td>
                        <?php
                        if ($toernooi["datum_activiteit"] == $maandag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $dinsdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $woensdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $donderdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $vrijdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zaterdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zondag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }
                        ?>
                    </tr>

                    <tr>
                        <td><small>2:00 pm</small></td>
                        <?php
                        if ($toernooi["datum_activiteit"] == $maandag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $dinsdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $woensdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $donderdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $vrijdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zaterdag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }

                        if ($toernooi["datum_activiteit"] == $zondag) {
                            echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                        } else {
                            echo '<td></td>';
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>
</body>
</html>
