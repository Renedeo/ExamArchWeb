<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/BanqueDO.php';
require_once dirname(dirname(__FILE__)) . '/DataAccessObject/ConnectionBD.php';

/**
 * Renvoie une liste d'éléments de la table Banque sous forme de liste exambdgestionbanque.BanqueDO
 *
 * @param integer|null $limit
 * @return array|null
 */

function Banque_find_all(?int $limit = null)
{
    try {
        global $pdo;
        $res = array();
        if ($limit !== null) {
            $request = "SELECT * FROM Banque LIMIT $limit;";
        } else {
            $request = "SELECT * FROM Banque;";
        }

        $response = $pdo->query($request);

        if ($response->rowCount() == 0) {
            return null;
        }
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $banque = new Banque(
                $row["id_banque"],
                $row["nom"],
                $row["localisation"]
            );
            $res[] = $banque;
        }
        $response->closeCursor();

        return $res;

    } catch (PDOException $th) {
        echo "Banque FIND ALL ERROR" . $th->getMessage();
    }
}

/**
 * Renvoie l'objet DO de la banque correspondant à l'id fourni
 *
 * @param integer $id
 * @return void|Banque
 */
function Banque_find_by_id(int $id)
{
    global $pdo;
    $request = "SELECT * FROM banque WHERE id_banque =" . $id . ";";
    $response = $pdo->query($request);

    if ($response->rowCount() == 0) {
        return null;
    }
    $row = $response->fetch(PDO::FETCH_ASSOC);
    $response->closeCursor();
    return new Banque(
        $row['id_banque'],
        $row['nom'],
        $row['localisation']
    );
}

/**
 * Cette fonction permet d'insérer une banque DO dans la table
 *
 * @param Banque $banque
 * @return void
 */
function Banque_insert(Banque $banque)
{
    try {
        global $pdo;
        $id = $banque->getid_banque();
        $nomination = $banque->getnomination();
        $localisation = $banque->getlocalisation();

        $request = "INSERT INTO banque(id_banque, nom, localisation) VALUES (:id, :nom, :localisation);";
        $stmt = $pdo->prepare($request);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nom", $nomination, PDO::PARAM_STR);
        $stmt->bindParam(":localisation", $localisation, PDO::PARAM_STR);
        $stmt->execute();

    } catch (PDOException $th) {
        echo "Erreur d'INSERT : " . $th->getMessage();
    }
}

/**
 * Fonction permettant de supprimer la banque avec l'identifiant fourni en argument
 *
 * @param integer|null $id
 * @return void
 */
function Banque_remove(?int $id)
{
    try {
        global $pdo;
        $request = "DELETE FROM banque 
                    WHERE id_banque = :id";

        $stmt = $pdo->prepare($request);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $th) {
        echo "Erreur de SUPPRESSION : " . $th->getMessage();
    }
}

/**
 * Permet de mettre à jour les informations d'une banque avec l'identifiant fourni en argument
 *
 * @param integer $id
 * @param string|null $nomination
 * @param string|null $localisation
 * @return void
 */
function Banque_update(int $id, ?string $nomination, ?string $localisation)
{
    try {
        global $pdo;

        $request = "UPDATE banque 
                    SET nom=:nom
                        , localisation=:localisation 
                    WHERE id_banque=:id;";

        $stmt = $pdo->prepare($request);
        $stmt->bindParam(":nom", $nomination, PDO::PARAM_STR);
        $stmt->bindParam(":localisation", $localisation, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

    } catch (PDOException $th) {
        echo "Erreur de MISE À JOUR : " . $th->getMessage();
    }
}
