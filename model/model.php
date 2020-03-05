<?php

function IsLoginCorrect($username,$password){

    $result = false;
    $strSeparator = '\'';
    $loginQuery = 'SELECT * FROM administrator WHERE login ='.$strSeparator.$username.$strSeparator.';';

    require_once  'model/dbconnection.php';
    echo $loginQuery;
    $queryResult = executeQuerySelect($loginQuery);


    if(count($queryResult) == 1){
        $userHashPsw = $queryResult[0]['password'];
        $hashpasswordDebug = password_hash($password, PASSWORD_DEFAULT);
        $result = password_verify($password, $userHashPsw);
        return $result;
    }
    else{
        return $result;
    }
}
function createSession($username){

    $_SESSION['username'] = $username;
}

function DisplayMenuWhereCategory($category){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $menus = 'SELECT `name`,`description`,`price`,`photo` FROM `Dishes` WHERE `Categorys_id` = (SELECT id FROM Categorys WHERE Categorys.category= '.$strSeparator.$category.$strSeparator.');';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}
function DisplayMenuWhereAutres(){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $menus = 'SELECT `name`,`description`,`price`,`photo` FROM `Dishes` WHERE Categorys_id != 2 AND Categorys_id != 7 AND Categorys_id != 3; ';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}