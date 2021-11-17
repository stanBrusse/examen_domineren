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
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>7:00 am - 9:00 am</span>
                        </td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>7:00 am - 9:00 am</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>7:00 am - 9:00 am</span>
                        </td>
                        <td>
                    </tr>

                    <tr>
                        <td><small>9:00 am</small></td>
                        <td></td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>8:00 am - 9:00 am</span>
                        </td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>8:00 am - 9:00 am</span>
                        </td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>8:00 am - 9:00 am</span>
                        </td>
                    </tr>

                    <tr>
                        <td><small>11:00 am</small></td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>11:00 am - 2:00 pm</span>
                        </td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>11:30 am - 3:30 pm</span>
                        </td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>11:50 am - 5:20 pm</span>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><small>2:00 pm</small></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>2:00 pm - 4:00 pm</span>
                        </td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>3:00 pm - 6:00 pm</span>
                        </td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>6:00 pm - 9:00 pm</span>
                        </td>
                        <td></td>
                        <td>
                            <strong class="text-dark"><a href="toernooiDetail.php">Toernooi</a></strong>
                            <span>5:00 pm - 7:00 pm</span>
                        </td>
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
