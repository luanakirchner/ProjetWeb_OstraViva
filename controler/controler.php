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
            require 'view/home.php';
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