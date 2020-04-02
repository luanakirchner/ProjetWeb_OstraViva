<?php
ob_start();
?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Réservations des tables</h2>
    </div>
    <div style="margin-left: 25px">Vous pouvez réserver une table en ligne chez nous</div>
    <p class="ErreurReservation"><?=@$_GET['ErreurReservation']; ?></p>
</div>

<div class="FormReservation">
    <form  method='POST' action='index.php?action=ReservationClient' style="width: 80%; max-width: 500px;">
        <fieldset>
            <div class="form-group">
                <label for="Date">Choisir le jour * </label><br>
                <input type="Date" name="Date" id="Date"  value="<?=@$_GET['Date'];?>" class="form-Horaire-Nbrpersonnes">
            </div>
            <div class="form-group">
                <label for="Horaire">Choisir votre horaire *</label>
                <select id="Horaire" name="Horaire"  class="form-Horaire-Nbrpersonnes">
                    <option value=""></option>
                    <option value="11:30"<?=@$_GET['11:00']?> >11:30</option>
                    <option value="12:00"<?=@$_GET['12:00']?>>12:00</option>
                    <option value="12:30"<?=@$_GET['12:30']?>>12:30</option>
                    <option value="13:00"<?=@$_GET['13:00']?>>13:00</option>
                    <option value="13:30"<?=@$_GET['13:30']?>>13:30</option>
                    <option value="14:00"<?=@$_GET['14:00']?>>14:00</option>
                    <option value="14:30"<?=@$_GET['14:30']?>>14:30</option>
                    <option value="18:00"<?=@$_GET['18:00']?>>18:00</option>
                    <option value="18:30"<?=@$_GET['18:30']?>>18:30</option>
                    <option value="19:00"<?=@$_GET['19:00']?>>19:00</option>
                    <option value="19:30"<?=@$_GET['19:30']?>>19:30</option>
                </select>
            </div>

            <div class="form-group" >
                <label for="NbrPersonnes">Nombre des personnes *</label><br>
                <input type="number" name="NbrPersonnes" min="1" max="30" id="NbrPersonnes" value="<?=@$_GET['NbrPersonnes'];?>" class="form-Horaire-Nbrpersonnes">
            </div>
            <div class="form-group" style="margin-top: 40px">
                <input type="text"  id="Prenom" name="Prenom" class="Formulairephone FormulairePrenom" placeholder="Prénom *" value="<?=@$_GET['Prenom'];?>">
                <input type="text" id="Nom" name="Nom" placeholder="Nom *" class="Formulairephone FormulaireNom" value="<?=@$_GET['Nom'];?>" >
            </div>
            <div class="form-group">
                <input type="Email" id="Email" name="Email" placeholder="Email *" value="<?=@$_GET['Email'];?>" style="width: 100%">
            </div>
            <div class="form-group">
                <input type="text" id="TelephoneCode" name="TelephoneCode" placeholder="+41" value="<?=@$_GET['TelephoneCode'];?>" style="width: 30%; margin-bottom: 3px;">
                <input type="text" id="Telephone" name="Telephone" placeholder="Téléphone *" class="Formulairephone FormulaireTel" value="<?=@$_GET['Telephone'];?>">
            </div>
            <div class="form-group">
                <textarea name="Descpription" id="Description"placeholder="Description ou demande partoiculiére" <?=@$_GET['Descpription'];?> style="width: 100%"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" style="width: 100%">
            </div>
        </fieldset>
    </form>
    <?=@ $_GET['ReservationOK'];?>
</div>


<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
