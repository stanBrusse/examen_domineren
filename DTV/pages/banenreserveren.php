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
        .content{
            margin-top: 100px;
        }
    </style>
</head>
<body>
<?php 
include('header.php');
?>
<section class="content">
<h1>Baan 1 (Tennisbaan)</h1>
<table border="black 1px" align="center" cellpadding="10px">
                    <tr>
                        <th colspan="2">Maandag</th>
                        <th colspan="2">Dinsdag</th>
                        <th colspan="2">Woensdag</th>
                        <th colspan="2">Donderdag</th>
                        <th colspan="2">Vrijdag</th>
                        <th colspan="2">Zaterdag</th>
                        <th colspan="2">Zondag</th>
                    </tr>
                    <tr>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: orange;">Gereserveerd</td>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                        <td>12:00 - 13:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>12:00 - 13:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>  
                    </tr>
                    <tr>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>13:00 - 14:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    </tr>
                    <tr>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                        <td>14:00 - 15:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>14:00 - 15:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>  
                    </tr>
                    <tr>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: orange;">Gereserveerd</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>15:00 - 16:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    <tr>
                        <td>16:00 - 17:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>16:00 - 17:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>16:00 - 17:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                        <td>16:00 - 17:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>16:00 - 17:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>  
                        <td>16:00 - 17:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>16:00 - 17:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                    </tr>
                    <tr>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>17:00 - 18:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    </tr>
                    <tr>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>  
                        <td>18:00 - 19:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>18:00 - 19:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                    </tr>
                    <tr>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>19:00 - 20:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    <tr>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>20:00 - 21:00</td>
                        <td style="background-color: orange;">Gereserveerd</td> 
                    </tr>
                    <tr>
                        <td>21:00 - 22:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                        <td>21:00 - 22:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>21:00 - 22:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td> 
                        <td>21:00 - 22:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>21:00 - 22:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>21:00 - 22:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>21:00 - 22:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    </tr>
                    <tr>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: red;">Gereserveerd</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: greenyellow;">Beschikbaar</td>
                        <td>22:00 - 23:00</td>
                        <td style="background-color: red;">Gereserveerd</td> 
                    </tr>
            </table>
            </section>
<?php 
include('footer.php');
?>
</body>
</html>