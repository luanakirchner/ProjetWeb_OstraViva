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
    $menus = 'SELECT ` id`, `Name`, `price`, `description`, `photo`, `categorys_id` FROM `dishes` WHERE categorys_id = (SELECT id FROM categorys WHERE categorys.category= '.$strSeparator.$category.$strSeparator.');';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}
function DisplayMenuWhereAutres(){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $menus = 'SELECT  ` id`, `Name`, `price`, `description`, `photo`, `Categorys_id` FROM `dishes` WHERE Categorys_id != 2 AND Categorys_id != 7 AND Categorys_id != 3; ';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}

function SelectCustomersWhereEmail($Email){

    $strSeparator = '\'';
    $Customer= 'SELECT * FROM customers WHERE email ='.$strSeparator.$Email.$strSeparator.';';

    require_once  'model/dbconnection.php';

    $queryResult = executeQuerySelect($Customer);

    return $queryResult;

}

function InsertCustomers($Customers,$userHashEmail){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $client = 'INSERT INTO `customers`(`firstname`, `lastname`, `email`, `telephone`, `emailHash`) VALUES ('.$strSeparator.addslashes($Customers["Prenom"]).$strSeparator.','.$strSeparator.addslashes($Customers["Nom"]).$strSeparator.','.$strSeparator.$Customers["Email"].$strSeparator.','.$strSeparator.$Customers["Telephone"].$strSeparator.','.$strSeparator.$userHashEmail.$strSeparator.')';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($client);

    if($queryResult){
        $getlastid = MaxId();
        $idClient = $getlastid[0]['id'];
    }

    return $idClient;
}

function MaxId(){

    $req = 'SELECT MAX(id)as id FROM `customers`;';
    $resultats = executeQuerySelect($req);
    echo $req;
    return $resultats;
}
function MaxIdDishes(){
    $req = 'SELECT MAX(` id`)as id FROM `dishes`;';
    $resultats = executeQuerySelect($req);
    echo $req;
    return $resultats;
}

function SelectSeasons($date){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $seasons = 'SELECT * FROM `seasons` WHERE seasons.dateBegin <= '.$strSeparator.$date.$strSeparator.' AND seasons.dateEnd >= '.$strSeparator.$date.$strSeparator.'';
    $resultats = executeQuerySelect($seasons);
    return $resultats;
}

function CreateReservation($Reservation,$idCustomer,$idSeason){

    $confirmation = false;
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultReservation = 'INSERT INTO `reservations`(`date`, `time`, `nbrPeople`, `confirmation`, `description`, `Customers_id`, `Seasons_id`) VALUES ('.$strSeparator.$Reservation["Date"].$strSeparator.','.$strSeparator.$Reservation["Horaire"].$strSeparator.','.$strSeparator.$Reservation["NbrPersonnes"].$strSeparator.',0,'.$strSeparator.addslashes($Reservation["Descpription"]).$strSeparator.','.$strSeparator.$idCustomer.$strSeparator.','.$strSeparator.$idSeason.$strSeparator.')';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($resultReservation);
    if($queryResult){
        $confirmation = true;
    }
    return $confirmation;
}

function SelectReservationAndCustomersWhereDate($date){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $seasons = 'SELECT reservations.id, reservations.date, reservations.time,reservations.nbrPeople, reservations.description,customers.firstname, customers.lastname, customers.email,customers.telephone FROM reservations INNER JOIN customers on customers.id = reservations.Customers_id WHERE reservations.date ='.$strSeparator.$date.$strSeparator.' AND `confirmation` = 1 ORDER BY  reservations.time ';
    $resultats = executeQuerySelect($seasons);
    return $resultats;
}

function SelectDateReservations(){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $Dates = 'SELECT reservations.date FROM reservations Where reservations.date >= '.$strSeparator.date("Y-m-d").$strSeparator.' AND `confirmation` = 1 GROUP BY reservations.date ORDER by reservations.date';
    $resultats = executeQuerySelect($Dates);
    return $resultats;

}

function DeleteReservation($id){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultReservation = 'DELETE FROM `reservations` WHERE `id` ='.$strSeparator.$id.$strSeparator.';';
    executeQueryIDU($resultReservation);
}

function SelectDishesWhereId($id){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $Dates = 'SELECT * FROM dishes WHERE ` id`='.$strSeparator.$id.$strSeparator.';';
    $resultats = executeQuerySelect($Dates);
    return $resultats;
}

function InsertDishes($infos){

    $confirmation = false;
    $strSeparator = '\'';
    $resultInsert = 'INSERT INTO `dishes`(`Name`, `price`, `description`, `photo`, `Categorys_id`) VALUES ('.$strSeparator.addslashes($infos['title']).$strSeparator.','.$infos['Prix'].','.$strSeparator.addslashes($infos['Description']).$strSeparator.','.$strSeparator.$infos['Photo'].$strSeparator.','.$strSeparator.$infos['Categories'].$strSeparator.');';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($resultInsert);
    if($queryResult){
        $confirmation = true;
    }
    return $confirmation;
}
function UpdateDishes($infos){

    $confirmation = false;
    $strSeparator = '\'';
    $resultUpdate = 'UPDATE `dishes` SET `Name`='.$strSeparator.addslashes($infos['title']).$strSeparator.',`price`='.$strSeparator.$infos['Prix'].$strSeparator.',`description`='.$strSeparator.addslashes($infos['Description']).$strSeparator.',`photo`='.$strSeparator.$infos['Photo'].$strSeparator.',`Categorys_id`='.$strSeparator.$infos['Categories'].$strSeparator.'WHERE ` id`='.$strSeparator.$infos['idPlat'].$strSeparator.';';

    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($resultUpdate);
    if($queryResult){
        $confirmation = true;
    }
    return $confirmation;
}

function DeletDishes($id){
    $confirmation = false;
    $resultDelet = 'DELETE FROM `dishes` WHERE ` id` ='.$id.';';
    require_once  'model/dbconnection.php';
    executeQueryIDU($resultDelet);

}

function SelectReservationWhereDate($date){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultReservation = 'SELECT * FROM `reservations` WHERE reservations.date ='.$strSeparator.$date.$strSeparator.';';
    $resultats = executeQuerySelect($resultReservation);
    return $resultats;
}

function UpdateCustomer($Customer,$id){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultUpdate = 'UPDATE `customers` SET `firstname`='.$strSeparator.$Customer["Prenom"].$strSeparator.', `lastname`='.$strSeparator.$Customer["Nom"].$strSeparator.',`telephone`='.$strSeparator.$Customer["Telephone"].$strSeparator.' WHERE id='.$id.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($resultUpdate);

}

function ControlerEmail($email){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultReservation = 'SELECT * FROM `customers` WHERE emailHash ='.$strSeparator.$email.$strSeparator.';';
    $resultats = executeQuerySelect($resultReservation);
    return $resultats;
}
function ConfirmedReservation($idClient){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultConfirm = 'UPDATE `reservations` SET `confirmation`= 1 WHERE `Customers_id` = '.$strSeparator.$idClient.$strSeparator.';';
    require_once  'model/dbconnection.php';
    $queryResult = executeQueryIDU($resultConfirm);
    return $queryResult;

}