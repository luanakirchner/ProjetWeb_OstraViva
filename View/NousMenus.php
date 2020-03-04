<?php
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
               <a href="index.php?action=DisplayMenu&choix=7"><img src="Image/IMG_0940.jpg" class="img-responsive margin"  style="max-width: 80%;" alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=2"><img src="Image/HIIN3119.JPG" class="img-responsive margin" style="max-width: 80%; " alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=3"><img src="Image/IMG_0939.jpg" class="img-responsive margin" style="max-width: 80%; " alt="Image"></a>
        </div>
        <div class="col-sm-6 TextAlignCenter">
            <a href="index.php?action=DisplayMenu&choix=0"><img src="Image/IMG_0939.jpg" class="img-responsive margin" style="max-width: 80%;  " alt="Image"></a>
        </div>
    </div>
</div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

