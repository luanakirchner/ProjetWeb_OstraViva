<?php
ob_start();

?>
<div class="container-fluid text-left" style="padding-bottom: inherit;">
    <div class="TitreH2Border">
        <h2><?=@$_GET['nomChoixMenu'];?></h2>
    </div>
    <div >
        <div class="row">
            <div class="col-sm-12">
                <div class="margin30Top">
                    <div class="row RowMenu" style="background-color:#F2EBDF;">
                        <div class="col-sm-3 col-md-2 text-center">
                            <img src="Image/Caviar.jpg" class="img-circle" height="150" width="150" alt="Avatar">
                        </div>
                        <div class="col-sm-8" style="align-self:  center; margin-top: 5px;">
                            <table class="margin1Left20">
                                <tr style="background-color:; ">
                                    <td style="width: 100%; text-align: justify">egnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-1 col-md-2 text-center" style="align-self:  center;">
                            <p>22 CH</p>
                        </div>
                    </div>
                </div>
                <div class="margin30Top">
                    <div class="row RowMenu">
                        <div class="col-sm-3 col-md-2 text-center">
                            <img src="Image/Caviar.jpg" class="img-circle" height="150" width="150" alt="Avatar">
                        </div>
                        <div class="col-sm-8" style="align-self:  center; margin-top: 5px; color: black">
                            <table class="margin1Left20">
                                <tr style="background-color:; ">
                                    <td style="width: 100%; text-align: justify">egnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-1 col-md-2 text-center" style="align-self:  center;">
                           <p>22 CH</p>
                        </div>
                    </div>
                </div>
                <div class="margin30Top" >
                    <div class="row RowMenu" style="background-color:#D9CA82 ">
                        <div class="col-sm-3 col-md-2 text-center">
                            <img src="Image/Caviar.jpg" class="img-circle" height="150" width="150" alt="Huîtres">
                        </div>
                        <div class="col-sm-9" style="align-self:  center;margin-top: 5px; color: black;">
                            <table class="margin1Left20" >
                                <tr>
                                    <td style="width: 70%; text-align: justify">egnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard</td>
                                    <td style="width: 30%; text-align: center">22ch</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




<?php
$contenu = ob_get_clean();
require  "gabarit.php";
?>

