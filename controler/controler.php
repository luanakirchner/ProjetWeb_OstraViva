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
    require "View/Menu.php";
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
            $_GET['ReservationOK'] = "<div class='alert alert-success'>Merci pour votre réservation, vous allez recevoir un <strong>email de confirmation</strong>. Confirmer la réservation par email </div>";
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
    }
    //Créer l'utilisateur
    else{
        $idClient = InsertCustomers($customer);
    }
    return $idClient;
}
function ControlerSaison($Date){

    //Recuperer le id de la season en cours et la quantite de personnes disponibles
    $saison = SelectSeasons($Date["Date"]);

    if(count($saison) == 1){
        $id=  $saison[0]['id'];
        $nbrPersonnesDispo = $saison[0]['nbrPeopleAvailableDay'];
    }
    else{
        throw  new  Exception ('Insérer une autre date'.$Date["Date"].'');
    }

    if($nbrPersonnesDispo <= $Date["NbrPersonnes"]){
        throw  new  Exception ('désolé, limite de capacité atteinte. Quantité disponible pour les réservations le jour choisi: '.$nbrPersonnesDispo.'');

    }
    return $id;

}