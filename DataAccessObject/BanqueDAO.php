<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/BanqueDO.php';
require_once dirname(dirname(__FILE__)) .'/DataAccessObject/ConnectionBD.php';

/**
 * Renvoie l'ojet DO banque de l'individue 
 * avec l'id corresdant
 *
 * @param integer $id
 * @return void|Banque
 */
function banque_find(int $id){
    global $pdo;
    $request = "SELECT * FROM banque WHERE id_banque =". $id .";";
    $response = $pdo->query($request);
    if($response->rowCount() == 0){
        echo "Aucun Utilisateur ne correspond à l'id ". $id ."\n";
        return null;
    }
    $row = $response->fetch(PDO::FETCH_ASSOC);
    return new Banque($row['id_banque']
                    , $row['nom']
                    , $row['localisation']);
}

/**
 * Cette fonction permet d'inserer 
 * un individu DO dans la table  
 *
 * @param string $nomination
 * @param string $localisation
 * @return void
 */
function banque_insert(Banque $elmt){
    try {
        global $pdo;
        $id = $elmt->getid_banque();
        $nomination = $elmt->getnomination();
        $localisation = $elmt->getlocalisation();

        $request = "INSERT INTO banque(id_banque, nom, localisation) VALUES (:id, :nom, :localisation);";
        $stmt = $pdo->prepare($request);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->bindParam("nom", $nomination, PDO::PARAM_STR);
        $stmt->bindParam("localisation", $localisation, PDO::PARAM_STR);
        $stmt->execute();
        
        echo "Adding banque with nom \" ". $nomination .
                " \" and  localisation \" ".$localisation."\" successed\n";;
    } catch (PDOException $th) {
        echo "INSERT Error : ".$th->getMessage();
    }
}

/**
 * Fonciton permettant de supprimer la banque 
 * avec l'identifiant passer en argument 
 *
 * @param integer|null $id
 * @return void
 */
function banque_remove(?int $id){
    try {
        global $pdo;
        $request = "DELETE FROM banque 
                    WHERE id_banque = :id";

        $stmt = $pdo->prepare($request);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Banque with id_banque ".$id." removed successfully\n";
    } catch (PDOException $th) {
        echo "REMOVE Error : ".$th->getMessage();
    }
} 
/**
 * Permet de mettre à jour les informations d'une banque
 * avec l'identifiant passer en argument 
 *
 * @param integer $id
 * @param string|null $nomination
 * @param string|null $localisation
 * @return void
 */
function banque_update(int $id, ?string $nomination, ?string $localisation){
    try {
        global $pdo;

        $request = "UPDATE banque 
                    SET nom=:nom
                        , localisation=:localisation 
                    WHERE id_banque=:id;";

        $stmt = $pdo->prepare($request);
        $stmt->bindParam("nom", $nomination, PDO::PARAM_STR);
        $stmt->bindParam("localisation", $localisation, PDO::PARAM_STR);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Banque with id_banque ".$id." updated successfully\n";
    } catch (PDOException $th) {
        echo "UPDATE Error :".$th->getMessage();
    }
}