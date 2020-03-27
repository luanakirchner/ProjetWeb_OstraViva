<?php
require 'model/model.php';

function home(){
    require 'View/home.php';
}
function QuiSommesNous(){
    require 'View/QuiSommesNous.php';
}
function Contact(){
    require 'View/Contact.php';
}
function LoginAdmPrive($LoginRequest){

    if(isset($_SESSION['username'])){
        $DatesReservations = SelectDateReservations();
        $_GET['action'] = "PageADM";
        require 'View/LoginAdm.php';
    }
    else {

        if (isset($LoginRequest["username"]) && isset($LoginRequest["password"])) {
            $username = $LoginRequest["username"];
            $password = $LoginRequest["password"];

            if (IsLoginCorrect($username, $password)) {

                createSession($username);
                $DatesReservations = SelectDateReservations();
                // Header("Location:Index.php?action=home");
                $_GET['loginError'] = false;
                $_GET['action'] = "PageADM";
                require 'View/LoginAdm.php';
            } else {
                $_GET['loginError'] = true;
                $_GET['action'] = "LoginAdmPrive";
                require 'View/LoginAdmPrive.php';
            }
        } else {
            $_GET['action'] = "LoginAdmPrive";
            require 'View/LoginAdmPrive.php';
        }
    }

}
function PageADM(){
    $DatesReservations = SelectDateReservations();
    require 'View/LoginAdm.php';
}
function NousMenus(){
    require 'View/NousMenus.php';
}
function Logout(){
    $_SESSION = array();
    session_destroy();
    $_GET['action'] = "home";
    require 'View/home.php';
}
function Menu($choix){
    $_GET['nomChoixMenu'] = $choix;
    require 'View/Menu.php';
}

function DisplayMenu($category){


    if($category =="Autres"){
        $resultMenus = DisplayMenuWhereAutres();
    }
    else{
        $resultMenus = DisplayMenuWhereCategory($category);
    }
    $_GET['nomChoixMenu'] = $category;
    if(isset($_SESSION['username'])) {
        require  "View/MenuAdm.php";
    }
    else {
        require "View/Menu.php";
    }
}

function Reservations(){
    require 'View/Reservations.php';
}
function ReservationClient($Reservation){

   try {
       if(@$Reservation["Date"] == ""){ throw  new  Exception ('Insérer une date');}
       if(@$Reservation["Horaire"] == ""){ throw  new  Exception ('Choisir un horaire');}
       if(@$Reservation["NbrPersonnes"] == ""){ throw  new  Exception ('Insérer le nombre des personnes');}
       if(@$Reservation["Nom"] == ""){ throw  new  Exception ('Insérer un nom');}
       if(@$Reservation["Prenom"] == ""){ throw  new  Exception ('Insérer un Prénom');}
       if(@$Reservation["Email"] == ""){ throw  new  Exception ('Insérer un Email');}
       if(@$Reservation["Telephone"] == ""){ throw  new  Exception ('Insérer un numéro de téléphone');}


        $idSaison =  ControlerSaison($Reservation);
        $idCustomers =  ControlerCustomers($Reservation);

        $Confirmation = CreateReservation($Reservation,$idCustomers,$idSaison);

        if($Confirmation) {
            EnvoyerEmail($Reservation);
            $_GET['ReservationOK'] = "<div class='alert alert-success'>Merci pour votre réservation, vous allez recevoir une <strong>email de confirmation</strong>. Confirmer la réservation par email </div>";
            require "View/Reservations.php";
        }
        else{
            throw new Exception("Erreur se produit");
        }


    }
    catch (Exception $e){
        $_GET["Nom"] = @$Reservation["Nom"];
        $_GET["Prenom"] = @$Reservation["Prenom"];
        $_GET["Email"] = @$Reservation["Email"];
        $_GET["Telephone"] = @$Reservation["Telephone"];
        $_GET["Date"] = @$Reservation["Date"];
        $_GET["NbrPersonnes"] = @$Reservation["NbrPersonnes"];
        $_GET["Descpription"] = @$Reservation["Descpription"];
        $_GET['ErreurReservation'] = $e->getMessage();
        require "View/Reservations.php";
    }
}
function ControlerCustomers($customer){

    $ResultSelectClient = SelectCustomersWhereEmail($customer["Email"]);
    $idClient=0;
    //Voir si l'utilisateur existe déjà -> Recuperer son id
    if(count($ResultSelectClient)==1){
        $idClient = $ResultSelectClient[0]["id"];
        //Changer les infos d'utilisateur
        UpdateCustomer($customer,$idClient);
    }
    //Créer l'utilisateur
    else{
        $idClient = InsertCustomers($customer);
    }
    return $idClient;
}
function ControlerSaison($Date){

    // Si la date choisi est déjà passée
    if($Date["Date"] <= date("Y-m-d") ){
        throw  new  Exception ('Insérer une autre date');
    }
    //Récupérer le id de la season en cours et la quantite des personnes disponibles
    $saison = SelectSeasons($Date["Date"]);

    if(count($saison) == 1){
        $id=  $saison[0]['id'];
        $OpenWeek = $saison[0]['openWeek'];
        $nbrPersonnesDispo = $saison[0]['nbrPeopleAvailableDay'];
    }
    else{
        throw  new  Exception ('Insérer une autre date');
    }
    if($OpenWeek == 0){
        $day = date('w', strtotime($Date["Date"]));
        if($day != 0 && $day != 6){
            throw  new  Exception ('Desolé, nous sommes ouverts seulement les weekends');
        }
    }
    //Récupérer une reservation dans la date choisi
    $resultReservationWhereData = SelectReservationWhereDate($Date["Date"]);
    $nbrPeople = 0;
    foreach ($resultReservationWhereData as $reservation){
        $nbrPeople += $reservation["nbrPeople"];
    }
    $nbrPersonnesDispo = $nbrPersonnesDispo - $nbrPeople;
    if($nbrPersonnesDispo < $Date["NbrPersonnes"]){
        throw  new  Exception ('désolé, limite de capacité atteinte. Quantité disponible pour les réservations le jour choisi: '.$nbrPersonnesDispo.'');

    }
    return $id;

}

function DeletReservation($id){
    DeleteReservation($id);
    $DatesReservations = SelectDateReservations();
    $_GET['action'] = "PageADM";
    require 'View/LoginAdm.php';
}

//Recupeper le id du plat selectionner dans menu // Add un nouveau plat
function EditPlat($id){
    if($id != 0){
        $PlatEdit = SelectDishesWhereId($id);
        $_GET['idPlat'] = $id;
        $_GET['Photo'] = $PlatEdit[0]['photo'];
        $_GET['title'] = $PlatEdit[0]['Name'];
        $_GET['Description'] = $PlatEdit[0]['description'];
        $_GET['Prix'] = $PlatEdit[0]['price'];
        $_GET[$PlatEdit[0]['Categorys_id']] = "selected";
        $_GET['PlatEdit'] = true;
    }
    else{
        $_GET['Photo'] = "Image/SansPhotoTransparance.png";
    }

    $_GET['PlatEdit'] = false;
    require 'View/EditPlat.php';

}

function PlatEdite($infos){

    try {

        //Si un image a été selectionnée
        if(is_uploaded_file($_FILES['addPhoto']['tmp_name'])) {
            //Recuperer le nom de l'image
            $nameImage = $_FILES['addPhoto']['name'];
            //Transferer l'image dans le dossier image
            if(move_uploaded_file($_FILES['addPhoto']['tmp_name'], "Image/$nameImage")){
                $infos['Photo'] = "Image/$nameImage";
            }
            else{
                throw  new  Exception("Problème recontré avec la photo");
            }
        }
        if(@$infos['Categories'] ==""){throw  new  Exception("Insérer une categories");}
        if(@$infos['title'] ==""){throw  new  Exception("Inéserer un title");}
        if(@$infos['Prix'] ==""){$infos['Prix'] = 0;}

        $idDishes = @$infos['idPlat'];

        //------------Nouveau plat -----------------------
        if(@$infos['idPlat']==0){
            $confirm = InsertDishes($infos);
            if($confirm){
                $_GET['Reussi'] = "<div class='alert alert-success'>Vous donnez ont été sauvegarder</div>";
                $id = MaxIdDishes();
                $idDishes = $id[0]['id'];
            }
        }
        //----------Modifier le plat-----------------------
        else{
            $confirm = UpdateDishes($infos);
            if($confirm){
                $_GET['Reussi'] = "<div class='alert alert-success'>Vous donnez ont été sauvegarder</div>";;
            }
            //----------Recuperer les infos du plat ------------

        }
        $Plat = SelectDishesWhereId($idDishes);

        $_GET['idPlat'] =  $Plat[0][' id'];
        $_GET['Photo'] = $Plat[0]['photo'];
        $_GET['title'] = $Plat[0]['Name'];
        $_GET['Description'] = $Plat[0]['description'];
        $_GET['Prix'] = $Plat[0]['price'];
        $_GET[$Plat[0]['Categorys_id']] = "selected";
        require 'View/EditPlat.php';
    }
    catch (Exception $e){
        $_GET[@$infos['Categories']] = "selected";
        $_GET['idPlat'] = @$infos['idPlat'];
        $_GET['Photo'] = @$infos['Photo'];
        $_GET['title'] =  @$infos['title'];
        $_GET['Description'] = @$infos['Description'];
        $_GET['Prix'] = @$infos['Prix'];
        $_GET['Erreur'] = $e->getMessage();
        require 'View/EditPlat.php';
    }
}

function SuppPlat($idPlat, $category){
        DeletDishes($idPlat);
        DisplayMenu($category);
}
function EnvoyerEmail($Client){

    $Nom = $Client["Nom"];

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    $to = $Client["Email"];

    $subject = "Confirmer votre réservation";
    $message ="<HTML><BODY>";
    $message .= "Bonjour Mr(Mme) $Nom <br/>";
    $message .= "Veuillez cliquez sur le lien ci-dessous pour confirmer votre réservation dans notre restaurant Ostra Viva <br/>";
    $message .= "<a href = 'http://resto.mycpnv.ch' >Je confirme ma réservation</a><br/>";
    $message .= "Merci pour votre confiance<br/>";
    $message .= "Ostra Viva";
    $message .="</BODY></HTML>";

    $headers = "From: \"expediteur moi\"<luana.kirchner-bannwart@resto.mycpnv.ch>\n";
    $headers .= "Reply-To: luana.kirchner-bannwart@resto.mycpnv.ch\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

    mail($to,$subject,$message, $headers);

}