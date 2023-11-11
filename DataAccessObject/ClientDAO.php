<?php

require_once dirname(dirname(__FILE__)) . '/DataObject/ClientDO.php';
require_once dirname(dirname(__FILE__)) .'/DataAccessObject/ConnectionBD.php';

function Client_find_by_id($id) {
    try {
        global $pdo;
        $request = "SELECT * FROM Client WHERE id_client = $id;"; 
        $response = $pdo->query($request);
        
        if ($response->rowCount() == 0) {
            echo"Aucun client avec l'id '$id'";
            return null;
        }
        $row = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return new Client(
            $row["id_client"],
            $row["nom"],
            $row["prenom"],
            new DateTime($row["date_de_naissance"]),
            $row["situation_maritale"]
        );
    
    } catch (PDOException $th) {
        echo "Client FIND ID ERROR" . $th->getMessage();
    }
}

function Client_insert(Client $client) {
    try {
        global $pdo;
        $request = "INSERT INTO Client (id_client, nom, prenom, date_de_naissance, situation_maritale) 
                    VALUES (:id, :nom, :prenom, date(:date_de_naissance), :situation_maritale);";
        $stmt = $pdo->prepare($request);
        
        $id = $client->getid_client();
        $nom = $client->getnom();
        $prenom = $client->getprenom();
        $date_de_naissance = $client->getdate_de_naissance()->format('d/m/Y');
        $situation_maritale = $client->getsituation_maritale();
        
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->bindParam("nom", $nom, PDO::PARAM_STR);
        $stmt->bindParam("prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindParam("date_de_naissance", $date_de_naissance, PDO::PARAM_STR);
        $stmt->bindParam("situation_maritale", $situation_maritale, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->closeCursor();

        echo "Adding Client with id ".$client->getid_client()." successed\n";
    } catch (PDOException $th) {
        echo "Client INSERT ERROR : " . $th->getMessage();
    }
}

function Client_remove(int $id) {
    try {
        global $pdo;
        $request = "DELETE FROM client WHERE id_client=:id";
        $stmt = $pdo->prepare($request);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        echo "Removing Client with id $id successed\n";;
    } catch (PDOException $th) {
        echo "Client INSERT ERROR : " . $th->getMessage();
    }
}

function Client_update(Client $client) {
    try {
        global $pdo;
        $request = "UPDATE client 
        SET id_client=:id
            , nom=:nom
            , prenom=:prenom
            , date_de_naissance=:date_de_naissance
            , situation_maritale=:situation_maritale
        WHERE id_client=:id";
        $stmt = $pdo->prepare($request);
        
        $id = $client->getid_client();
        $nom = $client->getnom();
        $prenom = $client->getprenom();
        $date_de_naissance = $client->getdate_de_naissance()->format('d/m/Y');
        $situation_maritale = $client->getsituation_maritale();
        
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->bindParam("nom", $nom, PDO::PARAM_STR);
        $stmt->bindParam("prenom", $prenom, PDO::PARAM_STR);
        $stmt->bindParam("date_de_naissance", $date_de_naissance, PDO::PARAM_STR);
        $stmt->bindParam("situation_maritale", $situation_maritale, PDO::PARAM_STR);
        
        $stmt->execute();
        $stmt->closeCursor();
        echo "Updating Client with id ".$client->getid_client()." successed\n";;
        
    } catch (PDOException $th) {
        echo "Client UPDATE ERROR : ". $th->getMessage();
    }   
}