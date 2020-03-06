<?php
ob_start();
?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Réservations des tables</h2>
    </div>
</div>
<div class="FormulaireReservation">
    <p>Vous pouvez réserver une table en ligne chez nous</p>
    <form>
        <table>
            <tr>
                <td><label for="Horaire">Choisir votre horaire</label></td>
            </tr>
            <tr>
                <td> <select id="Horaire" name="Horaire">
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="NbrPersonnes">Nombre des personnes</label></td>
            </tr>
            <tr>
                <td> <input type="text" id="NbrPersonnes" name="NbrPersonnes"></td>
            </tr>

            <input type="text" id="Nom" name="Nom">
            <input type="text" id="Prenom" name="Prenom">
            <input type="text" id="Email" name="Email">
            <input type="text" id="TelephoneCode" name="TelephoneCde">
            <input type="text" id="Telephone" name="Telephone">
            <textarea name="Description"></textarea>
            <input type="submit">
        </table>
    </form>

</div>


<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
