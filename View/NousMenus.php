<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Nous Menus</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 TextAlignCenter">
               <a href="index.php?action=DisplayMenu&choix=Plat Principal"><img src="Image/CmdRagout.png" class="img-responsive margin overlay-image"  style="max-width: 70%;" alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=Huitres"><img src="Image/CmdHuitres.png" class="img-responsive margin overlay-image" style="max-width: 70%; " alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=Fruit de mer"><img src="Image/CmdFuitsDeMer.png" class="img-responsive margin overlay-image" style="max-width: 70%; " alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=Autres"><img src="Image/CmdAutres.png" class="img-responsive margin overlay-image" style="max-width: 70%;  " alt="Image"></a>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['username'])):?>
    <a href="index.php?action=EditPlat&idPlat=0"><h3 class="boutonTexte boutonMenu">ADD</h3></a>
<?php endif; ?>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

