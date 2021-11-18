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
<h1 style="text-align: center;">Alle banen</h1>
<table border="black 1px" align="center" cellpadding="10px">
                <thead>
                    <tr>
                        <th>Baan nummer</th>
                        <th>Type baan</th>
                        <th>Reserveren</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tennisbaan</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Squashbaan</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tennisbaan</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Squashbaan</td>
                        <td><a href="banenreserveren.php">Klik</a></td>
                    </tr>
            </table>
<?php 
include('footer.php');
?>
</body>
</html>