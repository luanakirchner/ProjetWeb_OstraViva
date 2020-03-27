<?php
/*Luana Kirchner Bannwart
 * 02/2020
 * Version 1.0
 */
session_start();
require 'controler/controler.php';
if(isset($_GET['action'])){
    $action = $_GET['action'];

    switch ($action){
        case 'home':
            home();
            break;
        case 'QuiSommesNous':
              QuiSommesNous();
              break;
        case 'Contact':
            Contact();
            break;
        case 'LoginAdmPrive':
            LoginAdmPrive($_POST);
            break;
        case 'NousMenus':
            NousMenus();
            break;
        case 'Logout':
            Logout();
            break;
        case 'Menu':
            Menu($_GET['choix']);
            break;
        case 'DisplayMenu':
            DisplayMenu($_GET['choix']);
            break;
        default:
            home();
        case 'Reservations':
            Reservations();
            break;
        case 'ReservationClient':
            ReservationClient($_POST);
            break;
        case 'PageADM':
              PageADM();
              break;
        case 'DeletReservation':
            DeletReservation($_GET['idReservation']);
            break;
        case 'EditPlat':
            EditPlat($_GET['idPlat']);
            break;
        case 'SuppPlat':
            SuppPlat($_GET['idPlat'],$_GET['choix']);
            break;
        case 'PlatEdite':
            PlatEdite($_POST);
            break;
    }
}
else{
    home();
}
?>