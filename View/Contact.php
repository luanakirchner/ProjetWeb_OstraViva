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

    <div style="margin-top: 20px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3591.1442998500356!2d-48.57995304909331!3d-25.831789983524395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dbfaefe559ae51%3A0xe3787894b27d586a!2sRestaurante%20Ostra%20Viva!5e0!3m2!1sfr!2sch!4v1583144095325!5m2!1sfr!2sch" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

