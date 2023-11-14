<?php

require_once dirname(dirname(__FILE__)) ."/../DataAccessObject/ClientDAO.php";
require_once dirname(dirname(__FILE__)) ."/../DataAccessObject/BanqueDAO.php";
require_once dirname(dirname(__FILE__)) ."/../DataAccessObject/TransactionDAO.php";
require_once dirname(dirname(__FILE__)) ."/../DataAccessObject/CompteClientDAO.php";


function ClientDO_to_BO(Client $client) {
    return array(
        "id"=> $client->getid_client(),
        "nom" => $client->getnom(),
        "prenom" => $client->getprenom(),
        "date_de_naissance" => $client->getdate_de_naissance()->format('Y-m-d'),
    );
}
function BanqueDO_to_BO(Banque $banque) {
    return array(
        "id"=>$banque->getid_banque(),
        "nom" => $banque->getnomination(),
        "localisation" => $banque->getlocalisation(),
    );
}
function CompteClientDO_to_BO(CompteClient $compte) {
    return array(
        "id_compte" => $compte->getid_compte(),
        "id_client" => $compte->getid_client(),
        "id_banque" => $compte->getid_banque(),
        "solde" => $compte->getsolde(),
        "date_creation" => $compte->getdate_creation()->format('Y-m-d'),
        "date_resiliation" => $compte->getdate_resiliation()->format('Y-m-d'),
        "type_de_compte" => $compte->gettype_de_compte()
    );
}
function TransactionDO_to_BO(Transaction $transaction) {
    return array(
        "id_transactions"=> $transaction->getid_transaction(),
        "id_compte_dest" => $transaction->getid_compte_dest(),
        "id_compte_exp" => $transaction->getid_compte_exp(),
        "montant" => $transaction->getmontant(),
        "motif" => $transaction->getmotif(),
        "date_de_transaction" => $transaction->getdate_de_transaction()->format("Y-m-d")
    );
}

