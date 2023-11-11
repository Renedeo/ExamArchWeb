<?php
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/BanqueDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ClientDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataAccessObject/CompteClientDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataObject/TransactionDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/TransactionDAO.php';

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
echo "Testing Banque DO ...\n";
// var_dump($Banque);

// Client

$Client->setid_client(1);
$Client->setnom("test");
$Client->setprenom("test");
$Client->setdate_de_naissance(new Datetime(date("m/d/y")));
$Client->setsituation_maritale("test");
echo "testing Client DO\n";
// var_dump($Client);

// CompteClient 
$CompteClient->setid_compte(1);
$CompteClient->setid_banque(1);
$CompteClient->setid_client(1);
$CompteClient->setdate_creation(new Datetime(date("m/d/y")));
$CompteClient->setdate_resiliation(new Datetime(date("m/d/y")));
$CompteClient->settype_de_compte("compte");
echo "testing CompteClient DO\n";
// var_dump($CompteClient);
var_dump($CompteClient);

// Transactions
$Transaction->setid_transaction(1);
$Transaction->setid_compte_exp(1);
$Transaction->setid_compte_dest(2);
$Transaction->setmontant(120);
$Transaction->setmotif("Achat");
$Transaction->setdate_de_transaction(new Datetime(date("m/d/y")));
echo "testing Transactions DO\n";
// var_dump($Transaction);

/**
 * Test des DAO 
 */

// // Banque 
// echo "testing Banque DAO\n";
// Banque_insert($Banque);
// var_dump(Banque_find_by_id(1));
// Banque_update(1, "test_update", 'test_update');
// var_dump(Banque_find_by_id(1));
// Banque_remove(1);

// // Client

// echo "testing Client DAO\n";
// Client_insert($Client);
// var_dump(Client_find_by_id(1));
// Client_update(
//     new Client(1
//         ,"test_update"
//         ,'test_update'
//         ,new Datetime(date("m/d/Y"))
//         ,"maried"
//     )
// );
// var_dump(Client_find_by_id(1));
// Client_remove(1);

// // CompteClient

// echo "testing CompteClient DAO\n";

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
