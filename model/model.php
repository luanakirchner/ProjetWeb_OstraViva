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
