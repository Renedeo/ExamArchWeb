<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/CompteClientDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ConnectionBD.php';

/**
 * Renvoie le compte correspondant à l'id passer en argument
 *
 * @param integer $id
 * @return CompteClient|void
 */
function compteClient_find_by_id(int $id)
{
    try {
        global $pdo;
        $request = "SELECT * FROM compte_Client WHERE id_compte = $id";
        $stmt = $pdo->query($request);

        if ($stmt->rowCount() == 0) {
            // echo"Aucun compte client avec l'id '$id' \n";
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return new CompteClient(
            $row["id_compte"]
            ,
            $row["id_banque"]
            ,
            $row["id_client"]
            ,
            $row["solde"]
            ,
            new Datetime($row["date_creation"])
            ,
            new Datetime($row["date_resiliation"])
            ,
            $row["type_de_compte"]
        );
    } catch (PDOException $th) {
        echo "CompteClient FIND ID ERROR : " . $th->getMessage();
    }
}
/**
 * Insert un compte cient dans la table exambdgestionbanque.Compte_client
 * 
 * !! Attention la banque et le client doivent exister pour laa création du compte
 * 
 * @param CompteClient $compte
 * @return void
 */
function CompteClient_insert(CompteClient $compte)
{

    try {
        global $pdo;
        $request = "INSERT INTO Compte_Client (id_compte
                                            , id_banque
                                            , id_client
                                            , solde
                                            , date_creation
                                            , date_resiliation
                                            , type_de_compte) 
                    VALUES (:id_compte
                            , :id_banque
                            , :id_client
                            , :solde
                            , date(:date_creation)
                            , date(:date_resiliation)
                            , :type_de_compte);";
        $stmt = $pdo->prepare($request);
        $id_compte = $compte->getid_compte();
        $id_banque = $compte->getid_banque();
        $id_client = $compte->getid_client();
        $solde = $compte->getsolde();
        $date_creation = $compte->getdate_creation()->format('d/m/Y');
        $date_resiliation = $compte->getdate_resiliation()->format('d/m/Y');
        $type_de_compte = $compte->gettype_de_compte();

        $stmt->bindParam("id_compte", $id_compte, PDO::PARAM_INT);
        $stmt->bindParam("id_banque", $id_banque, PDO::PARAM_INT);
        $stmt->bindParam("id_client", $id_client, PDO::PARAM_INT);
        $stmt->bindParam("solde", $solde, PDO::PARAM_INT);
        $stmt->bindParam("date_creation", $date_creation, PDO::PARAM_STR);
        $stmt->bindParam("date_resiliation", $date_resiliation, PDO::PARAM_STR);
        $stmt->bindParam("type_de_compte", $type_de_compte, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();

        // echo "Adding account with id ".$compte->getid_compte()." successed\n";
    } catch (PDOException $th) {
        echo "CompteClient INSERT ERROR : " . $th->getMessage();
    }
}
/**
 * Supprime le compte correspondant à l'id passer en argument
 *
 * @param integer $id
 * @return void
 */
function CompteClient_remove(int $id)
{

    try {
        global $pdo;
        $request = "DELETE FROM Compte_Client WHERE id_compte = $id";
        $stmt = $pdo->prepare($request);
        $stmt->execute();
        $stmt->closeCursor();

        // echo "Removing account with id $id succesed\n";
    } catch (PDOException $th) {
        echo "CompteClient REMOVE ERROR : " . $th->getMessage();
    }
}

/**
 * Met à jour la table exambdgestionbanque.Compte_client
 * en modifiant les informations du client associé à 
 * l'id du compte passée en argument
 *
 * @param CompteClient $compte
 * @return void
 */
function CompteClient_update(CompteClient $compte)
{
    try {
        global $pdo;
        $request = "UPDATE Compte_Client 
                        SET id_compte = :id_compte
                            , id_banque = :id_banque
                            , id_client = :id_client
                            , solde = :solde
                            , date_creation = date(:date_creation)
                            , date_resiliation = date(:date_resiliation)
                            , type_de_compte = :type_de_compte
                        WHERE id_compte = :id_compte;";
        $stmt = $pdo->prepare($request);
    
        $id_compte = $compte->getid_compte();
        $id_banque = $compte->getid_banque();
        $id_client = $compte->getid_client();
        $solde = $compte->getsolde();
        $date_creation = $compte->getdate_creation()->format('Y-m-d');
        $date_resiliation = $compte->getdate_resiliation()->format('Y-m-d');
        $type_de_compte = $compte->gettype_de_compte();
    
        $stmt->bindParam("id_client", $id_client, PDO::PARAM_INT);
        $stmt->bindParam("id_compte", $id_compte, PDO::PARAM_INT);
        $stmt->bindParam("id_banque", $id_banque, PDO::PARAM_INT);
        $stmt->bindParam("solde", $solde, PDO::PARAM_INT);
        $stmt->bindParam("date_creation", $date_creation, PDO::PARAM_STR);
        $stmt->bindParam("date_resiliation", $date_resiliation, PDO::PARAM_STR);
        $stmt->bindParam("type_de_compte", $type_de_compte, PDO::PARAM_STR);
    
        $stmt->execute();
        $stmt->closeCursor();
        // echo "Updating account with id ".$compte->getid_compte()." succesed\n";
        
    } catch (PDOException $th) {
        echo "CompteClient UPDATE ERROR : " . $th->getMessage();
    }
}