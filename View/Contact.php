<?php
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Contact</h2>
    </div>
    <div class="NomRestaurantContact">
        Ostra Viva
    </div>
</div>
<div class="AddressContact">

    Rue du Cabaraquara <br>
    Guaratuba - PR <br>
    Brésil <br>
    +55 41 999978-9766 <br>
    Ouver tous les weekends
</div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

