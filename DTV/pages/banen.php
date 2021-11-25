<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banen</title>
    <style>
        table,
        th {
            background-color: gray;
            border: 4px solid black;
        }

        tr,
        td {
            color: white;
            border: 3px solid black;
        }
    </style>
</head>

<body>
    <?php
    include('header.php');

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
    <h1 style="text-align: center;">Wanneer wilt u een baan reserveren</h1>
    <table border="black 1px" align="center" cellpadding="10px">
        <thead>
            <tr>
                <th>Dag</th>
                <th>Datum</th>
                <th>Reserveren</th>
            </tr>
            <?php foreach ($data as $date) { 
                $dag = getWeekday($date); 
                if($dag == "Monday"){
                    $dag = "Maandag";
                }elseif($dag == "Tuesday"){
                    $dag = "Dinsdag";
                }elseif($dag == "Wednesday"){
                    $dag = "Woensdag";
                }elseif($dag == "Thursday"){
                    $dag = "Donderdag";
                }elseif($dag == "Friday"){
                    $dag = "Vrijdag";
                }elseif($dag == "Saturday"){
                    $dag = "Zaterdag";
                }elseif($dag == "Sunday"){
                    $dag = "Zondag";
                }
                ?>
                <tr>
                    <td><?php echo $dag ?></td>
                    <td><?php echo $date; ?></td>
                    <td><a href="test.php?dag=<?php echo $dag; ?>&date=<?php echo $date; ?>">Klik</a></td>
                </tr>
            <?php } ?>

    </table>
    <?php
    include('footer.php');
    ?>
</body>

</html>