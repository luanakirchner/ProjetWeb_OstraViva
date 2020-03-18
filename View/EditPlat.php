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
<div class="ContenuPage FormReservation " >
    <form  method='POST' enctype="multipart/form-data"  action='index.php?action=AddPlat' style="width: 80%; max-width: 500px;">
        <fieldset>
            <div class="form-group">
                <input type="text" name="id" value="<?=@$_GET['idPlat']?>">
                <label for="Categories">Categories</label>
                <select id="Categories" name="Categories" style="width: 100%">
                    <option value=""></option>
                    <option value="Salés">Salés/option>
                    <option value="Huitres">Huitres</option>
                    <option value="Fruit de mer">Fruit de mer</option>
                    <option value="Boissons">Boissons</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Entre">Entre</option>
                    <option value="Plat Principal">Plat Principal</option>
                </select>
            </div>
            <div class="form-group" >
                <label for="Image">Image</label><br>
                <img src="<?=@$_GET['Photo'];?>" class="ImageRonde" height="250" width="250" alt="Avatar"
            </div>
            <div class="form-group" >
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title" value="<?=@$_GET['title'];?>" style="width: 100%">
            </div>
            <div class="form-group" >
                <label for="Description">Description</label><br>
                <textarea name="Description" id="Description" style="width: 100%; min-height: 80px" > <?=@$_GET['Description'];?></textarea>
            </div>
            <div class="form-group" >
                <label for="Prix">Prix</label><br>
                <input type="text" name="Prix"  id="Prix" value="<?=@$_GET['Prix'];?>" style="width: 100%">
            </div>
            <div class="form-group" >
                Select Photo: <input type="file" name="addPhoto">
            </div>
            <div class="form-group">
                <input type="submit" style="width: 100%">
            </div>
        </fieldset>
    </form>
</div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

