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
                        <td>15-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Dindag</td>
                        <td>16-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Woensdag</td>
                        <td>17-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Donderdag</td>
                        <td>18-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Vrijdag</td>
                        <td>19-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Zaterdag</td>
                        <td>20-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>Zondag</td>
                        <td>21-11-2021</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
            </table>
<?php 
include('footer.php');
?>
</body>
</html>