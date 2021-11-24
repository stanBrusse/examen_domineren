<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>
<style>
.divFoto{
    background: url("../images/1507858.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    
    
}
.h6wit{
    color: white;
}
</style>

<body>
    <div class="divFoto">
    <div class="container">
        <?php
        include('header.php');
        ?>
        <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-md-10 mx-auto col-12">
                            <div class="hero-text mt-5 text-center">


                                <h1 class=" h6wit">DTV</h1>

                                <h6 class="h6wit">Sport- & Familieclub DTV wil iedereen enthousiast maken voor onze mooie tennissport, wil elke tennisser, zowel recreatief als prestatief, een stapje verder brengen in zijn of haar ontwikkeling en voorzien van een volledig wedstrijdaanbod. DTV wil in de regio Oost-Nederland toonaangevend zijn in de tennisbeleving door middel van uiterst bekwame, betrokken en leergierige tennisleraren, een transparante en warme samenwerking met de KNLTB, tennisverenigingen en andere tennisorganisaties. DTV wil de continuïteit van kwaliteit waarborgen door optimaal te faciliteren en zich altijd te blijven doorontwikkelen.</h6>

                            </div>
                        </div>

                    </div>
                </div>
        </section>
        
    </div>
    </div>
    <?php
        include('footer.php');
        ?>
</body>

</html>

<?php
