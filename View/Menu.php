<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();
//D7D996
?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <a href="index.php?action=NousMenus"><h2>Menu / <?=@$_GET['nomChoixMenu'];?></h2></a>

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
                            <div style="text-align: center"> <h5><?= $resultat ['name'];?></h5></div>
                            <div style="text-align: center"> <?= $resultat ['description'];?></div>
                       </div>
                        <div class="col-sm-1 col-md-2 TextPrixAlign">
                            <p><?=$resultat['price'];?> CHF</p>
                        </div>
                    </div>
                </div>
                <?php $modulo++;  endforeach; ?>
            </div>
        </div>
    </div>
</div>






<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

