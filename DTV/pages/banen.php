<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banen</title>
    <style>        
        table, th{
            background-color: gray;
            border: 4px solid black;            
        }
        tr, td{
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

$maandag = date("Y-m-d", $startdateMaandag);
$dinsdag = date("Y-m-d", $startdateDinsdag);
$woensdag = date("Y-m-d", $startdateWoensdag);
$donderdag = date("Y-m-d", $startdateDonderdag);
$vrijdag = date("Y-m-d", $startdateVrijdag);
$zaterdag = date("Y-m-d", $startdateZaterdag);
$zondag = date("Y-m-d", $startdateZondag);

?>
<h1 style="text-align: center;">Wanneer wilt u een baan reserveren</h1>
<table border="black 1px" align="center" cellpadding="10px">
                <thead>
                    <tr>
                        <th>Dag</th>
                        <th>Datum</th>
                        <th>Reserveren</th>
                    </tr>
                    <tr>
                        <td>Maandag</td>
                        <td><?php echo $maandag; ?></td>
                        <td><a href="banenreserveren.php?dag=maandag&date=<?php echo $maandag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Dindag</td>
                        <td><?php echo $dinsdag; ?></td>
                        <td><a href="banenreserveren.php?dag=dinsdag&date=<?php echo $dinsdag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Woensdag</td>
                        <td><?php echo $woensdag; ?></td>
                        <td><a href="banenreserveren.php?dag=woensdag&date=<?php echo $woensdag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Donderdag</td>
                        <td><?php echo $donderdag; ?></td>
                        <td><a href="banenreserveren.php?dag=donderdag&date=<?php echo $donderdag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Vrijdag</td>
                        <td><?php echo $vrijdag; ?></td>
                        <td><a href="banenreserveren.php?dag=vrijdag&date=<?php echo $vrijdag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Zaterdag</td>
                        <td><?php echo $zaterdag; ?></td>
                        <td><a href="banenreserveren.php?dag=zaterdag&date=<?php echo $zaterdag; ?>">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Zondag</td>
                        <td><?php echo $zondag; ?></td>
                        <td><a href="banenreserveren.php?dag=zondag&date=<?php echo $zondag; ?>">Klik</a></td>
                    </tr>
            </table>
<?php 
include('footer.php');
?>
</body>
</html>