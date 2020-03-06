
<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Login administrateur</h2>
        <?php if(@$_GET['loginError'] == true): ?>
            <p style='color : red;'>Login refusé</p>
        <?php endif; ?>
    </div>
</div>

    <table class="LoginAdm">
        <form method='POST' action='index.php?action=LoginAdmPrive'>

            <tr>
                <td><label for="username" class="labelFormulaire">Login:</label><br><input type="text" name="username" id="username" placeholder="" value="<?=@$_GET['username'];?>"></td> <!-- Si l'utilisateur a mis le nom mais pas le password, le nom va etre afficher -->
            </tr>
            <tr>
                <td><label for="password" class="labelFormulaire">Password:</label><br><input type="password" name="password" id="password" placeholder=""></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btnFormulaire" value="Login"></td>

        </tr>
    </table>
<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>
