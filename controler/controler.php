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
    if(isset($LoginRequest["username"])&& isset($LoginRequest["password"])){
        $username = $LoginRequest["username"];
        $password = $LoginRequest["password"];

        if (IsLoginCorrect($username,$password)){

            createSession($username);
            // Header("Location:Index.php?action=home");
            $_GET['loginError'] = false;
            $_GET['action'] = "home";
            require 'View/home.php';
        }
        else{
            $_GET['loginError'] = true;
            $_GET['action'] = "LoginAdmPrive";
            require 'View/LoginAdmPrive.php';
        }
    }
    else{
        $_GET['action'] = "LoginAdmPrive";
        require 'View/LoginAdmPrive.php';
    }

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

       //Recuperer le id de la season en cours et la quantite de personnes disponibles
       $saison = SelectSeasons($Reservation["Date"]);

       if(count($saison) == 1){
           $id=  $saison[0]['id'];
           $nbrPersonnesDispo = $saison[0]['nbrPeopleAvailableDay'];
       }
       else{
           throw  new  Exception ('Insérer une autre date'.$Reservation["Date"].'');
       }

       if($nbrPersonnesDispo <= $Reservation["NbrPersonnes"]){
           throw  new  Exception ('désolé, limite de capacité atteinte. Quantité disponible pour les réservations le jour choisi: '.$nbrPersonnesDispo.'');

       }
       else{
           throw  new  Exception ('OK');
       }

       $ResultSelectClient = SelectCustomersWhereEmail($Reservation["Email"]);
       $idClient=0;
       //Voir si l'utilisateur existe déjà -> Recuperer son id
       if(count($ResultSelectClient)==1){
           $idClient = $ResultSelectClient[0]["id"];
       }
       //Créer l'utilisateur
       else{
           $idClient = InsertCustomers($Reservation);
       }


    }
    catch (Exception $e){
        $_GET["Nom"] = @$Reservation["Nom"];
        $_GET["Prenom"] = @$Reservation["Prenom"];
        $_GET["Email"] = @$Reservation["Email"];
        $_GET["Telephone"] = @$Reservation["Telephone"];
        $_GET["Date"] = @$Reservation["Date"];
        $_GET["NbrPersonnes"] = @$Reservation["NbrPersonnes"];
        $_GET['ErreurReservation'] = $e->getMessage();
        require "View/Reservations.php";
    }
}