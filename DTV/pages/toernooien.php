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

                    <thead class="thead-light">
                    <th><i class="fa fa-calendar"></i></th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                    </thead>

                    <tbody>
                    <tr>
                        <td><small class="">7:00 am</small></td>
                        <?php
                        /* prepare statement
                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->execute();

                            /* bind variables to prepared statement
                            $stmt->bind_result($col1, $col2);

                            /* fetch values
                            while ($stmt->fetch()) {
                                $myarray[$col1]=$col2;
                            }*/

                        $myarray = array("foo", "bar", "world");

                        for ($i=0; $i < 6; $i++) {
                            if(array_key_exists($i, $myarray)){
                                echo '<td><strong class="text-dark"><a href="toernooiDetail.php">'. $myarray[$i] .'</a></strong>
                            <span>'. $myarray[$i] .'</span></td>';
                            }else{
                                echo '<td></td>';
                            }
                            /*}
                             close statement
                            $stmt->close();*/
                        }
                        ?>
                    </tr>

                    <tr>
                        <td><small>9:00 am</small></td>
                        <?php
                        /* prepare statement
                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->execute();

                            /* bind variables to prepared statement
                            $stmt->bind_result($col1, $col2);

                            /* fetch values
                            while ($stmt->fetch()) {
                                $myarray[$col1]=$col2;
                            }*/

                        $myarray = array("foo", "bar", "world");

                        for ($i=0; $i < 6; $i++) {
                            if(array_key_exists($i, $myarray)){
                                echo '<td><strong class="text-dark"><a href="toernooiDetail.php">'. $myarray[$i] .'</a></strong>
                            <span>'. $myarray[$i] .'</span></td>';
                            }else{
                                echo '<td></td>';
                            }
                            /*}
                             close statement
                            $stmt->close();*/
                        }
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td><small>11:00 am</small></td>
                        <?php
                        /* prepare statement
                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->execute();

                            /* bind variables to prepared statement
                            $stmt->bind_result($col1, $col2);

                            /* fetch values
                            while ($stmt->fetch()) {
                                $myarray[$col1]=$col2;
                            }*/

                        $myarray = array("foo", "bar", "world");

                        for ($i=0; $i < 6; $i++) {
                            if(array_key_exists($i, $myarray)){
                                echo '<td><strong class="text-dark"><a href="toernooiDetail.php">'. $myarray[$i] .'</a></strong>
                            <span>'. $myarray[$i] .'</span></td>';
                            }else{
                                echo '<td></td>';
                            }
                            /*}
                             close statement
                            $stmt->close();*/
                        }
                        ?>
                    </tr>

                    <tr>
                        <td><small>2:00 pm</small></td>
                        <?php
                        /* prepare statement
                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->execute();

                            /* bind variables to prepared statement
                            $stmt->bind_result($col1, $col2);

                            /* fetch values
                            while ($stmt->fetch()) {
                                $myarray[$col1]=$col2;
                            }*/

                        $myarray = array("foo", "bar", "world");

                        for ($i=0; $i < 6; $i++) {
                            if(array_key_exists($i, $myarray)){
                                echo '<td><strong class="text-dark"><a href="toernooiDetail.php">'. $myarray[$i] .'</a></strong>
                            <span>'. $myarray[$i] .'</span></td>';
                            }else{
                                echo '<td></td>';
                            }
                            /*}
                             close statement
                            $stmt->close();*/
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
