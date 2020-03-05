<?php
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2><?=@$_GET['nomChoixMenu'];?></h2>

    </div>
    <div >
        <div class="row">
            <div class="col-sm-12">
                <?php $modulo = 0; foreach ($resultMenus as $resultat) :?>
                <div class="margin30Top">
                    <div class="row RowMenu"<?php if ($modulo%2 == 0):?>style="background-color:#D7D996;"<?php endif; ?> style="background-color:white;">
                        <div class="col-sm-3 col-md-2 text-center" style="margin: 5px">
                            <img src="<?= $resultat ['photo'];?>" class="img-circle" height="150" width="150" alt="Avatar">
                        </div>
                        <div class="col-sm-6 margin1Left50" style="align-self:  center; margin-top: 5px;">
                            <div style="text-align: center"> <h5><?= $resultat ['name'];?></h5></div>
                            <div style="text-align: center"> <?= $resultat ['description'];?></div>
                       </div>
                        <div class="col-sm-1 col-md-2 text-center" style="align-self:  center;">
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

