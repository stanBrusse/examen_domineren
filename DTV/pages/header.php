<link rel="stylesheet" href="../css/bootstrap.min.css">
 <link rel="stylesheet" href="../css/font-awesome.min.css">
 <link rel="stylesheet" href="../css/aos.css">
 <link rel="stylesheet" href="../css/main.css">

<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.php"><img height="63px" src="../images/DTV.jpg"></img></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="kantine.php" class="nav-link smoothScroll">Kantine</a>
                    </li>

                    

                    <li class="nav-item">
                        <a href="toernooien.php" class="nav-link smoothScroll">Toernooien</a>
                    </li>

                    <li class="nav-item">
                        <a href="banen.php" class="nav-link smoothScroll">Banen Reserveren</a>
                    </li>

                    <li class="nav-item">
                        <a href="contact.php" class="nav-link smoothScroll">Contact</a>
                    </li>
                    <?php 
                    session_start();
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
                   {
                    echo '
                        <li class="nav-item">
                        <a href="profiel.php" class="nav-link smoothScroll">Profiel</a>
                    </li>
                    ';
                    if(isset($_SESSION['rol']) && $_SESSION['rol'] == "admin")
                    {
                    echo '
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link smoothScroll">Admin</a>
                    </li>
                    ';
                    }
                    }else{
                    echo '
                        <li class="nav-item">
                            <a href="inloggen.php" class="nav-link smoothScroll">Inloggen</a>
                        </li>
                    ';
                    }
                    ?>
                </ul>

                <!-- <ul class="social-icon ml-lg-3">
                    <li><a href="profiel.php" class="fa fa-facebook"></a></li>
                    <li><a href="admin.php" class="fa fa-twitter"></a></li> 
                </ul> -->
            </div>

        </div>
    </nav>
 <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

     <div class="container">

                    
                    