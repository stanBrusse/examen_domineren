<?php

// deze database is voor het maken en testen. kan weg
$servername = "localhost";
// $username = "DTVUSER";
$username = "root";
// $password = "1234";
$password = "";
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

                    $data = array();

                    array_push($data, $maandag = date("Y-m-d", $startdateMaandag));
                    array_push($data, $dinsdag = date("Y-m-d", $startdateDinsdag));
                    array_push($data, $woensdag = date("Y-m-d", $startdateWoensdag));
                    array_push($data, $donderdag = date("Y-m-d", $startdateDonderdag));
                    array_push($data, $vrijdag = date("Y-m-d", $startdateVrijdag));
                    array_push($data, $zaterdag = date("Y-m-d", $startdateZaterdag));
                    array_push($data, $zondag = date("Y-m-d", $startdateZondag));

                    asort($data);

                    function getWeekday($date)
                    {
                        return date('l', strtotime($date));
                    }

                    ?>

                    <thead class="thead-light">
                    <th><i class="fa fa-calendar"></i></th>
                    <?php // Maandag
                        foreach ($data as $date) {
                                echo '<th><strong class="text-white">' . getWeekday($date) . '</strong>
                        <span class="text-white">' . $date . '</span></th>';
                                $startdateMaandag = strtotime("+1 week", $startdateMaandag);

                        }?>
                    </thead>

                    <tbody>
                    <tr>
                        <td><small class="">7:00 am</small></td>
                        <?php
                        // echo "<tr>";

                            foreach ($data as $date) {
                                $query = $pdo->prepare("SELECT * FROM activiteiten WHERE datum_activiteit='$date'");
                                $query->execute();
                                // $num_rows = $query->fetchColumn();
                                // $toernooi = $query->fetch();
                                var_dump($query);
                                if ($query->rowCount() >0) {
                                    foreach ($query as $toernooi) {
                                        echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                                    <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                                    }
                                } else {

                                    echo "<td></td>";
                                }
                            }
                    
   /*                 
                        // echo "</tr>";
                        $query = $pdo->prepare("SELECT * FROM activiteiten");
                        $query->execute();
                        $num_rows = $query->fetchColumn();
                        $toernooi = $query->fetch();

                        foreach ($query as $toernooi) {
                            foreach ($data as $date) {
                                if ($toernooi["datum_activiteit"] == $date) {
                                    echo '<td><strong class="text-dark"><a href="toernooiDetail.php?nummer=' . $toernooi["nummer"] . '">' . $toernooi["title"] . '</a></strong>
                        <span>' . $toernooi["tijd_start"] . '<span> - </span>' . $toernooi["tijd_eind"] . '</span></td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
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
                    */
                    ?>
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