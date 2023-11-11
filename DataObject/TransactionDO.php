<?php

class Transaction{
    private ?int $id_transaction;
    private ?int $id_compte_exp;
    private ?int $id_compte_dest;
    
    private ?float $montant;
    private ?string $motif;
    private ?DateTime $date_de_transaction;

    function __construct(int $id_transaction = null
                        , ?int $id_compte_exp = null
                        , ?int $id_compte_dest = null
                        , ?int $montant = null
                        , ?string $motif = null
                        , ?DateTime $date_de_transaction = null
    ) {
        $this->id_transaction = $id_transaction;
        $this->id_compte_exp = $id_compte_exp;
        $this->id_compte_dest = $id_compte_dest;
        $this->montant = $montant;
        $this->motif = $motif;
        $this->date_de_transaction = $date_de_transaction;
    }

    function getid_transaction(){
        return $this->id_transaction;
    } 
    function getid_compte_exp(){
        return $this->id_compte_exp;
    }
    function getid_compte_dest(){
        return $this->id_compte_dest;
    }
    function getmontant(){
        return $this->montant;
    }
    function getmotif(){
        return $this->motif;
    }
    function getdate_de_transaction(){
        return $this->date_de_transaction;
    }

    function setid_transaction($id_transaction){
        $this->id_transaction = $id_transaction;
    }
    function setid_compte_exp($id_compte_exp){
        $this->$id_compte_exp = $id_compte_exp;
    }
    function setid_compte_dest($id_compte_dest){
        $this->id_compte_dest = $id_compte_dest;
    }
    function setmontant($montant){
        $this->montant = $montant;
    }
    function setmotif($motif){
        $this->motif = $motif;
    }
    function setdate_de_transaction($date_de_transaction){
        $this->date_de_transaction = $date_de_transaction;
    }
}