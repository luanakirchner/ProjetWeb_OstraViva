<?php
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
        default:
            home();
    }
}
else{
    home();
}
?>