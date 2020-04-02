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
    <p style="margin-left: 15px;color: red"><?=@$_GET['Erreur']; ?></p>
        <?=@ $_GET['Reussi'];?>
</div>
<div class="FormReservation " >
    <form  method='POST' enctype="multipart/form-data" action='index.php?action=PlatEdite' style="width: 80%; max-width: 500px;">
        <fieldset>
            <div class="form-group">
                <input type="text" name="idPlat" value="<?=@$_GET['idPlat']?>"style="display: none"><br>
                <input type="text" name="Photo" value="<?=@$_GET['Photo']?>" style="display: none"><br>
                <label for="Categories">Categories</label>
                <select id="Categories" name="Categories" style="width: 100%">
                    <option value=""></option>
                    <option value="1" <?=@$_GET['1']?>>Salés</option>
                    <option value="2"<?=@$_GET['2']?>>Huitres</option>
                    <option value="3"<?=@$_GET['3']?>>Fruit de mer</option>
                    <option value="4"<?=@$_GET['4']?>>Boissons</option>
                    <option value="5"<?=@$_GET['5']?>>Dessert</option>
                    <option value="6"<?=@$_GET['6']?>>Entre</option>
                    <option value="7"<?=@$_GET['7']?>>Plat Principal</option>
                </select>
            </div>
            <div class="form-group" >
                <label for="Image">Image</label><br>
                <img src="<?=@$_GET['Photo'];?>" id="photoChange" class="ImageRonde" height="250" width="250" alt="Your image">
            </div>
            <div class="form-group" >
                Choisir une nouvelle photo: <input class="btn fontsize" type="file" name="addPhoto" onchange="readURL(this);">
            </div>
            <div class="form-group" >
                <label for="title"style="margin-top: 10px">Title</label><br>
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
            <div class="form-group">
                <a href="index.php?action=EditPlat&idPlat=0""><button type="button" class="btn" style="margin-bottom:  20px">Vider les champs</button></a>
                <input type="submit" class="btn" style="width: 100%; background-color: #b1dfbb">
            </div>
        </fieldset>
    </form>
</div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

