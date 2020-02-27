<?php
?>
<?php
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2>Login administrateur</h2>
    </div>
</div>

    <table class="LoginAdm">
        <form method='POST' action='index.php?action=loginAdm'>
            <?php if(@$_GET['loginError'] == true): ?>
                <p style='color : red;'>Login refusé</p>
            <?php endif; ?>

            <tr>
                <td><label for="username" class="labelFormulaire">Login:</label><br><input type="email" name="username" id="username" placeholder="" value="<?=@$_GET['username'];?>"></td> <!-- Si l'utilisateur a mis le nom mais pas le password, le nom va etre afficher -->
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
