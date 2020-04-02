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
</div>
<div class="article-list">
    <div class="container">
        <div class="row articles">
            <?php foreach ($resultMenus as $resultat) :?>
                <div class="col-sm-6 col-md-4 item" >
                    <img class="img-fluid ImageRonde" src="<?= $resultat ['photo'];?>"  style="font-size: 17px;height: 280px;width: 280px;" alt="Avatar"">
                    <h3 class="name"><?= $resultat ['Name'];?></h3>
                    <p class="description"><?= $resultat ['description'];?></p>
                    <p class="description"><?=$resultat['price'];?> CHF</p></div>
                <?php endforeach; ?>
        </div>
    </div>
</div>


<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

