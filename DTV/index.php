<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body{
            background-color: indigo;
            height: 2000px;
        }
        .container{
            position: relative;
            min-height: 100%;
        }
    </style>
</head>
<body>
<div class="container">
<?php 
include('pages/header.php');
?>
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="bg-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">

                    <h6 data-aos="fade-up" data-aos-delay="300">new way to build a healthy lifestyle!</h6>

                    <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Upgrade your body at Gymso Fitness</h1>

                    <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a>

                    <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a>

                </div>
            </div>

        </div>
    </div>
</section>

<?php 
include('pages/footer.php');
?>
</div>
</body>
</html>
