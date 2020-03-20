<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();

?>
<div class="container-fluid text-center" style="padding-bottom: inherit;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <div class="ImagesDebout" style="background-image: url('Image/Carousel_1_Huitres.jpg')"></div>
            </div>
            <div class="carousel-item">
                <div class="ImagesDebout" style="background-image: url('Image/Carousel_2_Paysage.jpg')"></div>
                <!--<img class="d-block w-100" src="Image/IMG_0945.jpg" style="height: 300px" >-->
            </div>
            <div class="carousel-item" >
                <div class="ImagesDebout" style="background-image: url('Image/Carousel_3_Huitres.jpg')"></div>

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center" style="padding-top: 30px">
    <h3 class="margin" style="margin-bottom: 20px"></h3><br>
    <div class="row">
        <div class="col-lg-4 DivHome1" >
            <img src="Image/RagoutPoisson.jpg" class="img-responsive margin" style="max-width: 80%; " alt="Image">
            <div class="DivHome2">
                <a href="index.php?action=NousMenus"><div class="DivHome2Title"><h3>Venez voir nous menus</h3></div></a>
            </div>
        </div>
        <div class="col-lg-4 DivHome1">
            <img src="Image/FruitDeMer.jpg" class="img-responsive margin" style=" max-width: 80%;" alt="Image">
            <div class="DivHome2">
                <a href="index.php?action=QuiSommesNous"><div class="DivHome2Title"><h3>Le 3 meilleur restaurant d'huîtres au monde</h3></div></a>
                </div>
        </div>
        <div class="col-lg-4 DivHome1">
            <img src="Image/Moule.JPG" class="img-responsive margin" style="max-width: 80%;" alt="Image">
            <div class="DivHome2">
                <a href="index.php?action=Reservations"><div class="DivHome2Title"><h3>Réservation en Ligne</h3></div></a>

            </div>
        </div>
    </div>

</div>
<div class=" menuText">
    <div style="text-align: justify">
        <span><h3 style="background-color: white">Nous visitéer</h3></span>
        egnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
        considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo
        tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione.
        È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla
        videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli
        gnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
        considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo
        tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione.
        È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla
        videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli
    </div>

</div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
