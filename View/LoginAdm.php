<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();

?>
    <div class="container-fluid text-left" style="padding-bottom: inherit;">
        <div class="TitreH2Border">
            <h2>ADM</h2>
        </div>
    </div>
    <div class="ContenuPage" style="width: 90%">
        <?php  foreach ($DatesReservations as $resultat) :
            $resultarsReservations = SelectReservationAndCustomersWhereDate($resultat["date"]);
        ?>

            <div class="DateReservation"> <?= $resultat["date"] ?></div>

                <div class="col-sm-12"  >
                 <table class="table" style="text-align: center">
                     <thead>
                         <tr>
                             <th>Nom</th>
                             <th>Nbr personnes</th>
                             <th>Horaire</th>
                             <th>Email</th>
                             <th>Téléphone</th>
                             <th>Description</th>
                             <th>Annulation</th>
                         </tr>
                     </thead>
                    <?php $count = 0; foreach ($resultarsReservations as $reservation) :   ?>
                     <tbody>
                        <tr <?php if ($count%2 == 0):?>style="background-color:#D9D5D4;"<?php endif; ?> style="background-color: white;";>
                            <td data-label="Nom"><?=$reservation["firstname"] ?> <?=$reservation["lastname"] ?></td>
                            <td data-label="Nbr personnes"><?=$reservation["nbrPeople"] ?></td>
                            <td data-label="Horaire"><?=$reservation["time"] ?></td>
                            <td data-label="Email"><?=$reservation["email"] ?></td>
                            <td data-label="Téléphone"><?=$reservation["telephone"] ?></td>
                            <td data-label="Description" style="min-height:  40px"><?=$reservation["description"] ?></td>
                            <td data-label="Annulation" style="min-height:  40px"><a href="index.php?action=DeletReservation&idReservation=<?=$reservation["id"]?>"><img src="Image/Delet.png" width="20px"></a></td>

                        </tr>
                     </tbody>
                    <?php $count++; endforeach ?>
                 </table>
            </div>
            <?php endforeach ?>
    </div>

<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>