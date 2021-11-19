<?php

$items = array(
    0 => array(
        "nummer" => 1,
        "naam"  => "Snakje Lorem",
        "prijs"  => 99.68,
        "foto" => "images/340x260.png",
        "category" => "snack",
        "description" => "Lorem ipsum food of the gods!",
    ),
    1 => array(
        "nummer" => 2,
        "naam"  => "Drinkje Lorem",
        "prijs"  => 70.68,
        "foto" => "images/340x260.png",
        "category" => "drink",
        "description" => "Lorem ipsum drink of the gods!",
    ),
);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kantine</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/kantine.js"></script>
    <!--IF USER IS ADMIN THIS SHOWS-->
    <?php include('kantine_admin.php') ?>
</head>

<body>
    <?php include('header.php'); ?>
    </div>

    <div class="kantine-container">


        <div id="kantine-main">
            <div class="kantine-filter">
                <select id="kantineSelect">
                    <option value="all">ALLES</option>
                    <option value="snack">SNACKS</option>
                    <option value="drink">DRINKS</option>
                </select>
                <a href="kantine_admin.php">ADMIN(REMOVE AFTER TESTING)</a>
            </div>
            <?php
            foreach($items as $item){
            echo '<div class="kantine-item-card ' . $item["category"] . '-card" id="' . $item["category"] . '">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url(../' . $item["foto"] . '");;">
                        <div class="identifier ' . $item["category"] . '">
                            <label class="identifier-label">' . strtoupper($item["category"]) . '</label>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>' . $item["naam"] . '</span> <strong>Prijs:</strong> <span>€' . $item["prijs"] . '</span></p>
                </div>
                <div class="A-kantine-button">
                    <img value="' . $item["nummer"] . '" class="change" type="button" id="change" src="../images/change.svg">
                    <img value="' . $item["nummer"] . '" class="remove" type="button" id="remove" src="../images/remove.svg">
                    <img value="' . $item["nummer"] . '" class="create" type="button" id="create" src="../images/create.svg">
                </div>
            </div>';
        }
            ?>

        </div>
        <div class="container">
            <div id="kantine-create">
                <form class="kantine-form">
                    <label for="naam"><strong>Item Naam:</strong></label>
                    <input type="text" id="naam" name="naam"><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <input type="text" id="descriptie" name="descriptie"><br />

                    <label for="foto"><strong>Item Foto</strong></label>
                    <input type="file" id="foto" name="foto"><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <input type="doubleval" id="prijs" name="prijs"><br />

                    <label for="category"><strong>Item Category</strong></label>
                    <select id="category" name="category">
                        <option value="SNACK">SNACK</option>
                        <option value="DRINK">DRINK</option>
                    </select>
                </form>
            </div>
            <div id="kantine-change">
                <form class="kantine-form">
                    <label for="naam"><strong>Item Naam:</strong></label>
                    <input type="text" id="naam" name="naam"><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <input type="text" id="descriptie" name="descriptie"><br />

                    <label for="foto"><strong>Item Foto</strong></label>
                    <input type="file" id="foto" name="foto"><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <input type="doubleval" id="prijs" name="prijs"><br />

                    <label for="category"><strong>Item Category</strong></label>
                    <select id="category" name="category">
                        <option value="SNACK">SNACK</option>
                        <option value="DRINK">DRINK</option>
                    </select>
                </form>
            </div>
            <div id="kantine-remove">
                <form class="kantine-form">
                    <span id="foto" name="foto"><img src="../images/340x260.png"></span><br />

                    <label for="naam"><strong>Item Naam:</strong></label>
                    <span id="naam" name="naam">Snackje Lorem</span><br />

                    <label for="descriptie"><strong>Item Descriptie</strong></label>
                    <span id="descriptie" name="descriptie">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas magnam praesentium possimus numquam necessitatibus.</span><br />

                    <label for="prijs"><strong>Item Prijs</strong></label>
                    <span id="prijs" name="prijs">$99.40</span><br />

                    <label for="category"><strong>Item Category</strong></label>
                    <span id="category" name="category">SNACK</span><br />

                    <input type="button" value="Remove" onclick="return confirm('Weet je het zeker?')">
                </form>
            </div>
        </div>

    </div>
    <div>
        <?php include('footer.php'); ?>

</body>

</html>