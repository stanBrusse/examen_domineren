<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aanmelden voor toernooi</title>
    <style>
        .cont
        {
            text-align: center;
            justify-content: center;
        }
        table
        {
            background-color: black;
            width: 400px;
        }
        th{
            background-color: #f13a11;
            color: white;
        }
        td{
            color: white;
        }
        button
        {
            width: 150px;
            height: 50px;
        }
    </style>    
</head>
<body>
<?php 
include('header.php');
?>
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">


            <div class="cont">
            <table border="1px ">
                <tr>
                    <th>TOERNOOINAAM</th>
                </tr>
                <tr>
                    <td>datum</td>
                </tr>
                <tr>
                    <td>aantal deelnemers</td>
                </tr>
                <tr>
                    <td>hier staat informatie over het toernooi</td>
                </tr>
                <tr>
                    <td>scheids - naam naam<br>scheids - naam naam<br>scheids - naam naam<br>scheids - naam naam<br></td>
                </tr>
                <tr>            
                    <td>
                        <a href="toernooiDetail.php"><button>aanmelden</button></a>
                    </td>
                </tr>
            </table>

</section>



<?php 
include('footer.php');
?>
</body>
</html>