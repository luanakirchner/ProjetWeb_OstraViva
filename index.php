<?php

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
        default:
            home();
    }
}
else{
    home();
}
?>