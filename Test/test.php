<?php

require_once dirname(dirname(__FILE__)) . '/DataAccessObject/BanqueDAO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ClientDAO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/CompteClientDAO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/TransactionDAO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ConseillerDAO.php';

/**
 * Test des DO 
 */

$Banque = new Banque();
$Client = new Client();
$CompteClient = new CompteClient();
$Transaction = new Transaction();

// Banque
$Banque->setid_banque(1);
$Banque->setnomination("test");
$Banque->setlocalisation('test');
// Client
$Client->setid_client(1);
$Client->setnom("test");
$Client->setprenom("test");
$Client->setdate_de_naissance(new DateTime(date("m/d/y")));
$Client->setsituation_maritale("test");

// CompteClient 
$CompteClient->setid_compte(1);
$CompteClient->setid_banque(1);
$CompteClient->setid_client(1);
$CompteClient->setdate_creation(new DateTime(date("m/d/y")));
$CompteClient->setdate_resiliation(new DateTime(date("m/d/y")));
$CompteClient->settype_de_compte("compte");

// Transactions
$Transaction->setid_transaction(1);
$Transaction->setid_compte_exp(1);
$Transaction->setid_compte_dest(1);
$Transaction->setmontant(120);
$Transaction->setmotif("Achat");
$Transaction->setdate_de_transaction(new DateTime(date("m/d/y")));

// Conseiller
$Conseiller = new Conseiller();
$Conseiller->setid_Conseiller(1);
$Conseiller->setid_banque(1);
$Conseiller->setnom("test");
$Conseiller->setprenom("test");

/**
 * Test des DAO 
 */

// // Banque 
// echo "--------------------------------------------------------------------------------------";
// echo "Testing Banque DAO ----------------------------------------------------------------------\n";
// Banque_insert($Banque);
// var_dump(Banque_find_by_id(1));
// Banque_update(1, "test_update", 'test_update');
// var_dump(Banque_find_by_id(1));
// Banque_remove(1);

// Client
// echo "--------------------------------------------------------------------------------------";
// echo "Testing Client DAO ----------------------------------------------------------------------\n";
// Client_insert($Client);
// var_dump(Client_find_by_id(1));
// Client_update(
//     new Client(1
//         ,"test_update"
//         ,'test_update'
//         ,new DateTime(date("m/d/Y"))
//         ,"maried"
//     )
// );
// var_dump(Client_find_by_id(1));
// Client_remove(1);

// Conseiller
echo "--------------------------------------------------------------------------------------";
echo "Testing Conseiller DAO ----------------------------------------------------------------------\n";
Banque_insert($Banque);
Conseiller_insert($Conseiller);
var_dump(Conseiller_find_by_id(1));
Conseiller_update(
    new Conseiller(
        1
        , 1
        ,"test_update"
        ,'test_update'
    )
);
var_dump(Conseiller_find_by_id(1));
Conseiller_remove(1);
Banque_remove(1);

// // CompteClient
// echo "--------------------------------------------------------------------------------------";
// echo "Testing CompteClient DAO ----------------------------------------------------------------------\n";

// Banque_insert($Banque);
// Client_insert($Client);
// CompteClient_insert($CompteClient);
// var_dump(CompteClient_find_by_id(1));
// CompteClient_update(
//     new CompteClient(
//         1, 1, 1, 20,
//         date_create("19-10-2001"),
//         date_create("19-10-2001"),
//         "compte_tiers"
//     )
// );
// var_dump(CompteClient_find_by_id(1));
// CompteClient_remove(1);
// Banque_remove(1);
// Client_remove(1);

// // Transactions
// echo "--------------------------------------------------------------------------------------";
// echo "Testing Transactions DAO ----------------------------------------------------------------------\n";

// Banque_insert($Banque);
// Client_insert($Client);
// CompteClient_insert($CompteClient);
// $CompteClient->setid_compte(2);
// CompteClient_insert($CompteClient);

// $Transaction->setid_compte_dest(2);
// Transaction_insert($Transaction);

// var_dump(Transaction_find_by_id(1));

// Transaction_update(
//     new Transaction(
//         1, 2, 1, 20,
//         "compte_tiers",
//         date_create("19-10-2001")
//         )
//     );
// var_dump(Transaction_find_by_id(1));

// Transaction_remove(1);

// CompteClient_remove(1);
// CompteClient_remove(2);

// Banque_remove(1);
// Client_remove(1);

// echo "--------------------------------------------------------------------------------------";

// Test insertion pour affichage
// Transaction_remove(1);

// CompteClient_remove(1);
// CompteClient_remove(2);

// Banque_remove(1);

// Client_remove(1);
// Client_remove(2);

// Banque_insert($Banque);

// Client_insert($Client);
// $Client->setid_client(2);
// $Client->setnom("Test");
// Client_insert($Client);

// CompteClient_insert($CompteClient);
// $CompteClient->setid_compte(2);
// CompteClient_insert($CompteClient);

// $Transaction->setid_compte_dest(2);
// Transaction_insert($Transaction);