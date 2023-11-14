<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/CompteClientDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ConnectionBD.php';

/**
 * Renvoie une liste de DO des comptes clients de la table exambdgestionbanque.compte_client
 *
 * @param integer|null $limit
 * @return array | void
 */
function CompteClient_find_All(?int $limit = null)
{
    try {
        global $pdo;
        $res = array();
        if ($limit !== null) {
            $request = "SELECT * FROM compte_client LIMIT $limit;";
        } else {
            $request = "SELECT * FROM compte_client;";
        }

        $response = $pdo->query($request);

        if ($response->rowCount() == 0) {
            return null;
        }
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $compte = new CompteClient(
                $row["id_compte"],
                $row["id_banque"],
                $row["id_client"],
                $row["solde"],
                date_create($row["date_creation"]),
                date_create($row["date_resiliation"]),
                $row["type_de_compte"]
            );
            $res[] = $compte;
        }
        $response->closeCursor();

        return $res;

    } catch (PDOException $th) {
        echo "CompteClient FIND ALL ERROR" . $th->getMessage();
    }
}

/**
 * Renvoie le compte correspondant à l'id passé en argument
 *
 * @param integer $id
 * @return CompteClient|void
 */
function CompteClient_find_by_id(int $id)
{
    try {
        global $pdo;
        $request = "SELECT * FROM compte_client WHERE id_compte = $id";
        $stmt = $pdo->query($request);

        if ($stmt->rowCount() == 0) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return new CompteClient(
            $row["id_compte"],
            $row["id_banque"],
            $row["id_client"],
            $row["solde"],
            new DateTime($row["date_creation"]),
            new DateTime($row["date_resiliation"]),
            $row["type_de_compte"]
        );
    } catch (PDOException $th) {
        echo "CompteClient FIND ID ERROR : " . $th->getMessage();
    }
}

/**
 * Insérer un compte client dans la table exambdgestionbanque.Compte_client * 
 * !! Attention, la banque et le client doivent exister pour la création du compte
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

    } catch (PDOException $th) {
        echo "CompteClient INSERT ERROR : " . $th->getMessage();
    }
}

/**
 * Supprime le compte correspondant à l'id passé en argument
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

    } catch (PDOException $th) {
        echo "CompteClient REMOVE ERROR : " . $th->getMessage();
    }
}

/**
 * Met à jour la table exambdgestionbanque.Compte_client
 * en modifiant les informations du client associé à 
 * l'id du compte passé en argument
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
    
        $stmt->bindParam("id_compte", $id_compte, PDO::PARAM_INT);
        $stmt->bindParam("id_banque", $id_banque, PDO::PARAM_INT);
        $stmt->bindParam("id_client", $id_client, PDO::PARAM_INT);
        $stmt->bindParam("solde", $solde, PDO::PARAM_INT);
        $stmt->bindParam("date_creation", $date_creation, PDO::PARAM_STR);
        $stmt->bindParam("date_resiliation", $date_resiliation, PDO::PARAM_STR);
        $stmt->bindParam("type_de_compte", $type_de_compte, PDO::PARAM_STR);
    
        $stmt->execute();
        $stmt->closeCursor();
        
    } catch (PDOException $th) {
        echo "CompteClient UPDATE ERROR : " . $th->getMessage();
    }
}
