
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
<section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto col-12">
                <div class="hero-text mt-5 text-center">

                    <h1 class="text-dark" data-aos="fade-up" data-aos-delay="200">CONTACT | DTV</h1>

                    <h6 data-aos="fade-up" data-aos-delay="400" >
                        Hier vind je de contactgegevens van onze Tennis Club waar jij terecht kunt voor advies, coaching, ondersteuning, inspanning, ontspanning, plezier, uitdaging en gezelligheid. Wij zien én helpen je graag. Heb je een vraag? Stuur ons gerust een bericht. Wij reageren doorgaans binnen 24 uur. Tot ziens bij DTV!</h6>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="contact section" id="contact">
    <div class="container">
        <div class="row">

            <div class="ml-auto col-lg-5 col-md-6 col-12">
                <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Feel free to ask anything</h2>

                <form action="contact.php" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                    <input type="text" class="form-control" name="name" placeholder="Name">

                    <input type="email" class="form-control" name="email" placeholder="Email">

                    <input type="text" class="form-control" name="subject" placeholder="onderwerp">

                    <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>

                    <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                </form>
            </div>

            <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Where you can <span>find us</span></h2>

                <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> J.F. Kennedylaan 49, 7001 EA Doetinchem</p>
             
                <div class="google-map"  data-aos-delay="900">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2458.1423111347453!2d6.296263815754464!3d51.96783027971344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c784c716ae2ee7%3A0xe3665d8a07166e2a!2sGraafschap%20College!5e0!3m2!1snl!2snl!4v1637682052017!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
include('footer.php');
?>
</body>
</html>
