<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Personal</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Accueil.css">
    <link rel="stylesheet" href="css/QuiSommesNous.css">
</head>
<body>
<header id="header" style="background-color:  #F2EBDF; height: 8%">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.php?action=home"><img src="Image/Logo.JPG" alt="" title="" width="150px" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.php?action=homel">Accueil</a></li>
                    <li><a href="index.php?action=QuiSommesNous">Qui sommes nous</a></li>
                    <li><a href="index.php?action=NousMenus">Nous menus</a></li>
                    <li><a href="portfolio.html">Réservations</a></li>
                    <li><a href="index.php?action=Contact">Contact</a></li>
                    <?php if (isset($_SESSION['username'])):?>
                        <li><a href="index.php?action=Logout">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
<div style="height: 80%">
    <?=$contenu; ?>
</div>

<!-- Footer -->
<footer class="page-footer font-small indigo" style="background-color: #F2EBDF;margin-top: 20px;">

    <!-- Footer Links -->
    <div class="container">

        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5 mb-3">

            <!-- Grid column -->
            <div class="col-md-12 ">
                <h6 class="text-uppercase font-weight-bold NousTrouverFooter">
                    Nous trouver
                </h6>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->
        <hr class="rgba-white-light" style="margin: 0 15%;">

        <!-- Grid row-->
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <!-- Grid column -->
            <div class="col-md-8 col-12 mt-5">
                <p style="line-height: 1.7rem"> Rue du Cabaraquara <br>
                    Guaratuba - PR <br>
                    Brésil <br>
                    +55 41 999978-9766 <br>
                    Ouver tous les weekends
                    </p>
            </div>
            <!-- Grid column -->
        </div>
            <!-- Grid column -->
            <div class="col-md-12" style="text-align: center">
                    <!-- Facebook -->
                    <a  href="QuiSommesNous.php">
                        <img src="Image/Facebook.png">
                    </a>
                    <!-- Facebook -->
                    <a  href="QuiSommesNous.php">
                        <img src="Image/Facebook.png">
                    </a>
                    <!-- Facebook -->
                    <a  href="QuiSommesNous.php">
                        <img src="Image/Facebook.png">
                    </a>
            </div>
            <!-- Grid column -->
        </div>
    <div class="footer-copyright text-center py-3">
        © 2020 Luana Kirchner Bannwart
    </div>
</footer>

<!-- End footer Area -->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.tabs.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/simple-skillbar.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function(){
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
</script>
</body>
</html>