<?php
ob_start();

?>
<div class="contents_start" >
    <img src="Image/IMG_Accueil.jpg" width="100%" height="auto" style="min-height: 230px;">
</div>

<div class="container-fluid"style="margin-top: 10px">
    <div class="row">
        <div class="col-sm-12 col-lg-4 col-md-4 col-12" style="background-color:yellow;height: 100px;width: 50%"></div>
        <div class="col-sm-12 col-lg-4 col-md-4 col-12" style="background-color:pink;height: 100px;width: 50%"></div>
        <div class="col-sm-12 col-lg-4 col-md-4 col-12" style="background-color:rebeccapurple;height: 100px;width: 50%"></div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
