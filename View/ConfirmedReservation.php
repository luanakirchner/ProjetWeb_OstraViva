<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Réservation confirmée</h2>
</div>
<div class="ContenuPage aligCenter" >

   <h4><?= @$_GET["ConfirmeOk"] ?></h4>

</div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

