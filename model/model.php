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
    $menus = 'SELECT  ` id`, `Name`, `price`, `description`, `photo`, `Categorys_id` FROM `Dishes` WHERE `Categorys_id` = (SELECT id FROM Categorys WHERE Categorys.category= '.$strSeparator.$category.$strSeparator.');';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}
function DisplayMenuWhereAutres(){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $menus = 'SELECT  ` id`, `Name`, `price`, `description`, `photo`, `Categorys_id` FROM `Dishes` WHERE Categorys_id != 2 AND Categorys_id != 7 AND Categorys_id != 3; ';
    $resultatsmenu = executeQuerySelect($menus);
    return $resultatsmenu;
}

function ReservationTables($reservation){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';


}
function SelectCustomersWhereEmail($Email){

    $strSeparator = '\'';
    $Customer= 'SELECT * FROM customers WHERE email ='.$strSeparator.$Email.$strSeparator.';';

    require_once  'model/dbconnection.php';

    $queryResult = executeQuerySelect($Customer);

    return $queryResult;

}

function InsertCustomers($Customers){

    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $client = 'INSERT INTO `customers`(`firstname`, `lastname`, `email`, `telephone`) VALUES ('.$strSeparator.$Customers["Prenom"].$strSeparator.','.$strSeparator.$Customers["Nom"].$strSeparator.','.$strSeparator.$Customers["Email"].$strSeparator.','.$strSeparator.$Customers["Telephone"].$strSeparator.')';

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
    $resultReservation = 'INSERT INTO `reservations`(`date`, `time`, `nbrPeople`, `confirmation`, `description`, `Customers_id`, `Seasons_id`) VALUES ('.$strSeparator.$Reservation["Date"].$strSeparator.','.$strSeparator.$Reservation["Horaire"].$strSeparator.','.$strSeparator.$Reservation["NbrPersonnes"].$strSeparator.',0,'.$strSeparator.$Reservation["Descpription"].$strSeparator.','.$strSeparator.$idCustomer.$strSeparator.','.$strSeparator.$idSeason.$strSeparator.')';

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
    $seasons = 'SELECT reservations.id, reservations.date, reservations.time,reservations.nbrPeople, reservations.description,customers.firstname, customers.lastname, customers.email,customers.telephone FROM reservations INNER JOIN customers on customers.id = reservations.Customers_id WHERE reservations.date ='.$strSeparator.$date.$strSeparator.' ORDER BY  reservations.time ';
    $resultats = executeQuerySelect($seasons);
    return $resultats;
}

function SelectDateReservations(){

    require_once  'model/dbconnection.php';
    $Dates = 'SELECT reservations.date FROM reservations GROUP BY reservations.date ORDER by reservations.date';
    $resultats = executeQuerySelect($Dates);
    return $resultats;

}

function DeleteReservation($id){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $resultReservation = 'DELETE FROM `reservations` WHERE ` id` ='.$strSeparator.$id.$strSeparator.';';
    executeQueryIDU($resultReservation);
}

function SelectDishesWhereId($id){
    require_once  'model/dbconnection.php';
    $strSeparator = '\'';
    $Dates = 'SELECT * FROM dishes WHERE ` id`='.$strSeparator.$id.$strSeparator.';';
    $resultats = executeQuerySelect($Dates);
    return $resultats;
}