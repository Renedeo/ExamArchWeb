<?php 

require_once dirname(dirname(__FILE__)) ."../../Test/test.php";
require_once dirname(dirname(__FILE__)) ."/php/Convert.php";

Client_insert($Client);
Banque_insert($Banque);
CompteClient_insert($CompteClient);

$liste_DO = CompteClient_find_All();
if ($liste_DO){
    foreach($liste_DO as $key => $DO
    ) {
        $liste_DO[$key] = CompteClientDO_to_BO($DO);
    }
    echo json_encode($liste_DO);
}

CompteClient_remove(1);
Client_remove(1);
Banque_remove(1);