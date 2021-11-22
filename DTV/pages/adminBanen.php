<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin banen</title>
  <style>
.cont{
    margin-top: 150px;
    position: relative;
    color: black;
    border: 1px solid black;
}
  </style>
</head>
<body>
<?php 
include('header.php');
?>
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">


<div class="container">
    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto col-12">
            <div class="hero-text mt-5 text-center">

            <div class="cont">
                <p>Banen reserveren</p><hr>
                <p>Datum</p>
                <input type="date">
                <p>Van - Tot</p>
                <input type="time">
                <input type="time"><br>
                  <input class="mdc-radio__native-control" type="radio" id="radio-1" name="radios" checked>
                <label for="radio-1">Toernooi</label>
                  <input class="mdc-radio__native-control" type="radio" id="radio-2" name="radios">
                <label for="radio-2">Wedstrijd</label>
                <input class="mdc-radio__native-control" type="radio" id="radio-3" name="radios">
                <label for="radio-3">Training</label><br>
                  <input class="mdc-radio__native-control" type="radio" id="radio-4" name="radios2" checked>
                <label for="radio-4">Buiten</label>
                  <input class="mdc-radio__native-control" type="radio" id="radio-5" name="radios2">
                <label for="radio-5">Binnen</label>
                <p>Aantal banen</p>
                <input type="text">
                <p>Aantal werknemers</p>
                <input type="text"><br><br> 
                <input type="submit" value="Toevoegen">
            </div>
        </div>

</div>
</section>



<?php 
include('footer.php');
?>
</body>
</html>