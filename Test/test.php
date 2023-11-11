<?php
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/BanqueDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataObject/ClientDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ClientDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataObject/CompteClientDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/CompteClientDAO.php';

require_once dirname(dirname(__FILE__)) . '/DataObject/TransactionDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/TransactionDAO.php';

/**
 * Test des DO 
 */
$Banque = new  Banque(); 
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
$CompteClient->setdata_de_creation(new Datetime(date("m/d/y")));
$CompteClient->setdate_de_resiliation(new Datetime(date("m/d/y")));
$CompteClient->settype_de_compte("compte");
echo "testing CompteClient DO\n";
// var_dump($CompteClient);


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

 echo "testing Banque DAO\n";
 banque_insert($Banque);
 var_dump(banque_find(1));
 banque_update(1, "test_update", 'test_update');
 var_dump(banque_find(1));
 banque_remove(1);