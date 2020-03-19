
<?php
/*Luana Kirchner Bannwart
 * 03/2020
 * Version 1.0
 */
ob_start();
//D7D996
?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <a href="index.php?action=NousMenus"><h2>Menu / <?=@$_GET['nomChoixMenu'];?> / ADM</h2></a>

    </div>
    <div >
        <div class="row">
            <div class="col-sm-12">
                <?php $modulo = 0; foreach ($resultMenus as $resultat) :?>
                <div class="margin30Top">
                    <div class="row RowMenu ModuloMenu2"<?php if ($modulo%2 == 0):?>style="background-color:#D7D996;"<?php endif; ?> >
                        <div class="col-sm-3 col-md-2 text-center" style="margin: 5px">
                            <img src="<?= $resultat ['photo'];?>" class="ImageRonde" height="250" width="250" alt="Avatar">
                        </div>
                        <div class="col-sm-5 margin1Left50" style="align-self:  center; margin-top: 5px;">
                         <a href="index.php?action=EditPlat&idPlat=<?=$resultat[' id']?>" style="color: #0b0b0b">
                                <div style="text-align: center"> <h5 class="TextHover"><?= $resultat ['Name'];?></h5></div>
                                <div style="text-align: center"> <p><?= $resultat ['description'];?></p></div>
                         </a>
                       </div>
                        <div class="col-sm-1 col-md-2 TextPrixAlign">
                            <p><?=$resultat['price'];?> CHF</p>
                            <a href="index.php?action=SuppPlat&idPlat=<?=$resultat[' id']?>&choix=<?=@$_GET['nomChoixMenu'];?>" onclick="return confirm('êtes vous sûrs de supprimmer cette élément ?')"><img  class="ImagaDeletHover" src="Image/Delet.png"></a>
                        </div>
                    </div>
                </div>
                <?php $modulo++;  endforeach; ?>
            </div>
            <a class="boutonMenu" href="index.php?action=EditPlat"><h3 class="boutonTexte">ADD</h3></a>
        </div>
</div>
</div>






<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

