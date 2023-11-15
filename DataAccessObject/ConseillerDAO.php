<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/ConseillerDO.php';

/**
 * Renvoie une liste de DO des conseillers de la table exambdgestionbanque.Conseiller
 *
 * @param integer|null $limit
 * @return array | void
 */
function Conseiller_find_All(?int $limit = null)
{
    try {
        global $pdo;
        $res = array();
        if ($limit !== null) {
            $request = "SELECT * FROM conseillers LIMIT $limit;";
        } else {
            $request = "SELECT * FROM conseillers;";
        }

        $response = $pdo->query($request);

        if ($response->rowCount() == 0) {
            return null;
        }
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $conseiller = new Transaction(
                $row["id_conseiller"],
                $row["id_banque"],
                $row["nom"],
                $row["prenom"]
            );
            $res[] = $conseiller;
        }
        $response->closeCursor();

        return $res;

    } catch (PDOException $th) {
        echo "Conseiller FIND ALL ERROR" . $th->getMessage();
    }
}

/**
 *  Renvoie le conseiller correpondant à l'id 
 * passer en argument
 *
 * @param integer $id
 * @return Conseiller|void
 */
function Conseiller_find_by_id(int $id)
{
    try {
        global $pdo;
        $request = "SELECT * FROM conseiller WHERE id_conseiller = $id;";
        $reponse = $pdo->query($request);
        if ($reponse->rowCount() == 0) {
            return null;
        }
        $row = $reponse->fetch(PDO::FETCH_ASSOC);
        return new Conseiller(
            $row["id_conseiller"],
            $row["id_banque"],
            $row["nom"],
            $row["prenom"]
        );

    } catch (PDOException $th) {
        echo "Conseiller FIND ID ERROR: " . $th->getMessage();
    }
}

/**
 * Insert un conseiller dans la table exambdgestionbanque.Conseiller.
 * 
 * !!! Attention la banque concernés par le conseiller doivent etre des banques existantes 
 *
 * @param Conseiller $conseiller
 * @return void
 */
function Conseiller_insert(Conseiller $conseiller)
{
    try {
        global $pdo;
        $request = "INSERT INTO conseiller(   id_conseiller
                                            , id_banque
                                            , nom
                                            , prenom)
                    VALUES (  :id_conseiller
                            , :id_banque
                            , :nom
                            , :prenom);";
        $stmt = $pdo->prepare($request);

        $id_conseiller = $conseiller->getid_conseiller();
        $id_banque = $conseiller->getid_banque();
        $nom = $conseiller->getnom();
        $prenom = $conseiller->getprenom();


        $stmt->bindParam("id_conseiller", $id_conseiller, PDO::PARAM_INT);
        $stmt->bindParam("id_banque", $id_banque, PDO::PARAM_INT);
        $stmt->bindParam("nom", $nom, PDO::PARAM_STR);
        $stmt->bindParam("prenom", $prenom, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();

    } catch (PDOException $th) {
        echo "Conseiller INSERT ERROR : " . $th->getMessage();
    }
}

/**
 * Supprime le conseiller correspondant à l'id passer en argument
 *
 * @param integer $id
 * @return void
 */
function Conseiller_remove(int $id)
{
    try {
        global $pdo;
        $request = "DELETE FROM conseiller WHERE id_conseiller = $id;";
        $response = $pdo->query($request);
        $response->closeCursor();
    } catch (PDOException $th) {
        echo "Conseiller REMOVE ERROR: " . $th->getMessage();
    }
}
function Conseiller_update(Conseiller $conseiller)
{
    try {
        global $pdo;
        $request = "UPDATE Conseiller
                    SET   id_conseiller = :id_conseiller
                        , id_banque = :id_banque
                        , nom = :nom
                        , prenom = :prenom
                    WHERE id_conseiller = :id_conseiller ;";

        $stmt = $pdo->prepare($request);
        $id_conseiller = $conseiller->getid_conseiller();
        $id_banque = $conseiller->getid_banque();
        $nom = $conseiller->getnom();
        $prenom = $conseiller->getprenom();


        $stmt->bindParam("id_conseiller", $id_conseiller, PDO::PARAM_INT);
        $stmt->bindParam("id_banque", $id_banque, PDO::PARAM_INT);
        $stmt->bindParam("nom", $nom, PDO::PARAM_STR);
        $stmt->bindParam("prenom", $prenom, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();

    } catch (PDOException $th) {
        echo "Conseiller UPDATE ERROR : " . $th->getMessage();
    }
}