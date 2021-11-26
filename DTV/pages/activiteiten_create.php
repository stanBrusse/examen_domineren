<?php
include('../php/db.php');

$db = new db;

$stmt = $db->query('SELECT * FROM `banen`');
$stmt->execute();
$banen = $stmt;

$stmt = $db->query('SELECT * FROM `activiteiten`');
$stmt->execute();
$activiteiten = $stmt;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Activiteit Create</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/activiteiten_admin.css">
</head>

<body>
  <?php
  include('header.php');
  ?>


  <div class="activiteiten-container">
    <div id="activiteiten-create">
      <form class="activiteiten-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <section class="section-activiteit">
          <label for="activiteit">Activiteit:</label><br>
          <label for="radio-1">Toernooi</label>
          <input class="mdc-radio__native-control" type="radio" id="radio-1" name="activiteit" checked>
          <label for="radio-2">Wedstrijd</label>
          <input class="mdc-radio__native-control" type="radio" id="radio-2" name="activiteit">
          <label for="radio-3">Training</label>
          <input class="mdc-radio__native-control" type="radio" id="radio-3" name="activiteit"><br>
        </section>

        <section class="section-title">
          <label for="title">Title:</label>
          <input type="text" name="title"><br>
        </section>

        <section class="section-datum_activiteit">
          <label for="datum_activiteit">Datum van:</label>
          <input type="date" name="datum_activiteit"><br>
        </section>

        <section class="section-datum_ingeschreven">
          <label for="datum_ingeschreven">Leden Maximaal Inschrijven</label>
          <input type="date" name="datum_ingeschreven"><br>
        </section>

        <section class="section-tijd_start">
          <label for="tijd_start">Start:</label>
          <input type="time" name="tijd_start"><br>
        </section>

        <section class="section-tijd_eind">
          <label for="tijd_start">Eind:</label>
          <input type="time" name="tijd_eind"><br>
        </section>

        <section class="section-submit">
          <input type="submit" value="Toevoegen">
        </section>
      </form>
    </div>
  </div>


  <?php
  include('footer.php');
  ?>
</body>

</html>