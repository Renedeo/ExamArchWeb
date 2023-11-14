<?php 

require_once dirname(dirname(__FILE__)) ."../../Test/test.php";
require_once dirname(dirname(__FILE__)) ."/php/Convert.php";

Client_insert($Client);
$liste_de_client = Client_find_All();
if ($liste_de_client){
    foreach($liste_de_client as $key => $client) {
        $liste_de_client[$key] =ClientDO_to_BO($client);
    }
    echo json_encode($liste_de_client);
}
Client_remove(1);

