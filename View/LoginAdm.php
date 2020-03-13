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
    <div class="ContenuPage">

        <?php $modulo = 0; foreach ($DatesReservations as $resultat) :

           $resultarsReservations = SelectReservationAndCustomersWhereDate($resultat["date"]);
           ?>
             <div><?= $resultat["date"] ?></div>
             <table>
                <?php foreach ($resultarsReservations as $reservation) :   ?>
                <tr>
                    <td><?=$reservation["firstname"] ?> <?=$reservation["lastname"] ?></td>
                    <td><?=$reservation["nbrPeople"] ?></td>
                    <td><?=$reservation["time"] ?></td>
                    <td><?=$reservation["email"] ?></td>
                    <td><?=$reservation["telephone"] ?></td>
                    <td><?=$reservation["description"] ?></td>
                </tr>
                <?php endforeach ?>
             </table>
        <?php endforeach ?>

    </div>



<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>