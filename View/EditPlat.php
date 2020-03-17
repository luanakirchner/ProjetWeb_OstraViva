<?php
/*Luana Kirchner Bannwart
 * 03/2020
 * Version 1.0
 */
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Edite le plat</h2>
    </div>
</div>
<div class="ContenuPage" >
    <form  method='POST' action='' style="width: 80%; max-width: 500px;">
        <fieldset>
            <div class="form-group" >
                <label for="Image">Image</label><br>
                <img src="<?=@$_GET['Photo'];?>" class="ImageRonde" height="250" width="250" alt="Avatar">
            </div>
            <div class="form-group" >
                <label for="title">Title</label><br>
                <input type="number" name="title" min="1" max="30" id="title" value="<?=@$_GET['title'];?>">
            </div>
            <div class="form-group" >
                <label for="Description">Description</label><br>
                <input type="number" name="Description" min="1" max="30" id="Description" value="<?=@$_GET['Description'];?>">
            </div>
            <div class="form-group" >
                <label for="Prix">Prix</label><br>
                <input type="number" name="Prix" min="1" max="30" id="Prix" value="<?=@$_GET['Prix'];?>">
            </div>
        </fieldset>
    </form>
</div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

