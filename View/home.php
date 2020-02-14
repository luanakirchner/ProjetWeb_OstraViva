<?php
ob_start();

?>
<div class="container-fluid text-center" style="padding-bottom: inherit">
    <img src="Image/IMG_0943 -2.jpg" width="100%" height="auto">
</div>
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center" style="padding-top: 30px">
    <h3 class="margin" style="margin-bottom: 20px">Where To Find Me?</h3><br>
    <div class="row">
        <div class="col-sm-4">
            <img src="Image/IMG_0940.jpg" class="img-responsive margin" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-4">
            <img src="Image/IMG_0939.jpg" class="img-responsive margin" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-4">
            <img src="Image/JIDT8592.jpg" class="img-responsive margin" style="width:100%" alt="Image">
        </div>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
