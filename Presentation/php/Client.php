<?php 

require_once dirname(dirname(__FILE__)) ."../../Test/test.php";
require_once dirname(dirname(__FILE__)) ."/php/Convert.php";

Client_insert($Client);
$liste_DO = Client_find_All();

if ($liste_DO){
    foreach($liste_DO as $key => $DO) {
        $liste_DO[$key] = ClientDO_to_BO($DO);
    }
    echo json_encode($liste_DO);
}
Client_remove(1);

