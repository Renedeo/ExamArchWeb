<?php 

require_once dirname(dirname(__FILE__)) ."../../Test/test.php";
require_once dirname(dirname(__FILE__)) ."/php/Convert.php";


$liste_DO = Banque_find_All();
if ($liste_DO){
    foreach($liste_DO as $key => $DO
    ) {
        $liste_DO[$key] = BanqueDO_to_BO($DO);
    }
    echo json_encode($liste_DO);
}
else {
    echo json_encode(array("Aucune banque trouvées"=>""));
}

