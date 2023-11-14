<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/TransactionDO.php';

function Transaction_find_All(?int $limit = null)
{
    try {
        global $pdo;
        $res = array();
        if ($limit !== null) {
            $request = "SELECT * FROM transactions LIMIT $limit;";
        } else {
            $request = "SELECT * FROM transactions;";
        }

        $response = $pdo->query($request);

        if ($response->rowCount() == 0) {
            // echo"Aucun client avec l'id '$id'";
            return null;
        }
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $transation = new Transaction(
                $row["id_transactions"],
                $row["id_compte_exp"],
                $row["id_compte_dest"],
                $row["montant"],
                $row["motif"],
                date_create($row["date_de_transaction"])
            );
            $res[] = $transation;
        }
        $response->closeCursor();

        return $res;

    } catch (PDOException $th) {
        echo "Transaction FIND ALL ERROR" . $th->getMessage();
    }
}

/**
 *  Renvoie la transaction correpondant à l'id 
 * passer en argument
 *
 * @param integer $id
 * @return Transaction|void
 */
function Transaction_find_by_id(int $id)
{
    try {
        global $pdo;
        $request = "SELECT * FROM Transactions WHERE id_transactions = $id;";
        $reponse = $pdo->query($request);
        if ($reponse->rowCount() == 0) {
            // echo "Aucune transaction avec l'id $id";
            return null;
        }
        $row = $reponse->fetch(PDO::FETCH_ASSOC);
        // echo "Finding account with id $id successed\n";
        return new Transaction(
            $row["id_transactions"]
            ,
            $row["id_compte_exp"]
            ,
            $row["id_compte_dest"]
            ,
            $row["montant"]
            ,
            $row["motif"]
            ,
            new Datetime($row["date_de_transaction"])
        );

    } catch (PDOException $th) {
        echo "Transactions FIND ID ERROR: " . $th->getMessage();
    }
}

/**
 * Insert une transaction dans la table exambdgestionbanque.Transactions .
 * 
 * !!! Attention le compte des clients concernés par la transaction doivent etre des comptes existants 
 *
 * @param Transaction $transaction
 * @return void
 */
function Transaction_insert(Transaction $transaction)
{
    try {
        global $pdo;
        $request = "INSERT INTO Transactions(id_transactions
                                            , id_compte_exp
                                            , id_compte_dest
                                            , montant
                                            , motif
                                            , date_de_transaction)
                    VALUES (:id_transactions
                            , :id_compte_exp
                            , :id_compte_dest
                            , :montant
                            , :motif
                            , date(:date_de_transaction));";
        $stmt = $pdo->prepare($request);
        $id_transactions = $transaction->getid_transaction();
        $id_compte_exp = $transaction->getid_compte_exp();
        $id_compte_dest = $transaction->getid_compte_dest();
        $montant = $transaction->getmontant();
        $motif = $transaction->getmotif();
        $date_de_transaction = $transaction->getdate_de_transaction()->format("Y-m-d");


        $stmt->bindParam("id_transactions", $id_transactions, PDO::PARAM_INT);
        $stmt->bindParam("id_compte_exp", $id_compte_exp, PDO::PARAM_INT);
        $stmt->bindParam("id_compte_dest", $id_compte_dest, PDO::PARAM_INT);
        $stmt->bindParam("montant", $montant, PDO::PARAM_INT);
        $stmt->bindParam("motif", $motif, PDO::PARAM_STR);
        $stmt->bindParam("date_de_transaction", $date_de_transaction, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();
        // echo "Adding account with id $id_transactions successed\n";

    } catch (PDOException $th) {
        echo "Transactions INSERT ERROR : " . $th->getMessage();
    }
}
/**
 * Supprime la transaction correspondant à l'id passer en argument
 *
 * @param integer $id
 * @return void
 */
function Transaction_remove(int $id)
{
    try {
        global $pdo;
        $request = "DELETE FROM Transactions WHERE id_transactions = $id;";
        $response = $pdo->query($request);
        $response->closeCursor();
        // echo "Removing account with id $id successed\n";
    } catch (PDOException $th) {
        echo "Transactions REMOVE ERROR: " . $th->getMessage();
    }
}
function Transaction_update(Transaction $transaction)
{
    try {
        global $pdo;
        $request = "UPDATE Transactions
                    SET   id_transactions = :id_transactions
                        , id_compte_exp = :id_compte_exp
                        , id_compte_dest = :id_compte_dest
                        , montant = :montant
                        , motif = :motif
                        , date_de_transaction = date(:date_de_transaction)
                    WHERE id_transactions = :id_transactions;";
        $stmt = $pdo->prepare($request);
        $id_transactions = $transaction->getid_transaction();
        $id_compte_exp = $transaction->getid_compte_exp();
        $id_compte_dest = $transaction->getid_compte_dest();
        $montant = $transaction->getmontant();
        $motif = $transaction->getmotif();
        $date_de_transaction = $transaction->getdate_de_transaction()->format("Y-m-d");


        $stmt->bindParam("id_transactions", $id_transactions, PDO::PARAM_INT);
        $stmt->bindParam("id_compte_exp", $id_compte_exp, PDO::PARAM_INT);
        $stmt->bindParam("id_compte_dest", $id_compte_dest, PDO::PARAM_INT);
        $stmt->bindParam("montant", $montant, PDO::PARAM_INT);
        $stmt->bindParam("motif", $motif, PDO::PARAM_STR);
        $stmt->bindParam("date_de_transaction", $date_de_transaction, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();

        // echo "Updating account with id $id_transactions successed\n";

    } catch (PDOException $th) {
        echo "Transactions UPDATE ERROR: " . $th->getMessage();
    }
}