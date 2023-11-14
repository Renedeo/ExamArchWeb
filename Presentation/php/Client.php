<?php 

require_once dirname(dirname(__FILE__)) ."/php/Convert.php";




$liste_DO = Client_find_All();

if ($liste_DO){
    foreach($liste_DO as $key => $DO) {
        $liste_DO[$key] = ClientDO_to_BO($DO);
    }
    echo json_encode($liste_DO);
}
else {
    echo json_encode([array("Aucun client trouvées"=>"")]);
}

