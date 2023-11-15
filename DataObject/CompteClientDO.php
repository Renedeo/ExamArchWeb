<?php

class CompteClient{
    private ?int $id_compte;

    // private ?banque $banque;

    // private ?client $client;
    private ?int $id_banque;

    private ?int $id_client;

    private ?int $id_conseiller;

    private ?int $solde;

    private ?Datetime $date_creation;

    private ?Datetime $date_resiliation;

    private ?string $type_de_compte;

    function __construct(int $id_compte =  null
                        , ?int $id_banque = null
                        , ?int $id_client = null
                        , ?int $id_conseiller = null
                        , ?int $solde = 0
                        , ?Datetime $date_creation = null
                        , ?Datetime $date_resiliation = null
                        , ?string $type_de_compte = null
    ) {
        $this->id_compte = $id_compte;
        $this->id_banque = $id_banque;
        $this->id_conseiller = $id_conseiller;
        $this->id_client = $id_client;
        $this->solde = $solde;
        $this->date_creation = $date_creation;
        $this->date_resiliation = $date_resiliation;
        $this->type_de_compte = $type_de_compte;
    }

    function getid_compte(){
        return $this->id_compte;
    }

    function getid_banque(){
        return $this->id_banque;
    }

    function getid_client(){
        return $this->id_client;
    }

    function getid_conseiller(){
        return $this->id_conseiller;
    }

    function getsolde(){
        return $this->solde;
    }
    function getdate_creation(){
        return $this->date_creation;
    }
    function getdate_resiliation(){
        return $this->date_resiliation;
    }
    function gettype_de_compte(){
        return $this->type_de_compte;
    }

    function setid_compte($id_compte){
        $this->id_compte = $id_compte;
    }

    function setid_banque($id_banque){
        $this->id_banque = $id_banque;
    }

    function setid_conseiller($id_conseiller){
        $this->id_conseiller = $id_conseiller;
    }

    function setid_client($idclient){
        $this->id_client = $idclient;
    }
    function setsolde($solde){
        $this->solde= $solde;
    }

    function setdate_creation($data_creation){
        $this->date_creation = $data_creation;
    }
    function setdate_resiliation($date_resiliation){
        $this->date_resiliation = $date_resiliation;
    }
    function settype_de_compte($type_de_compte){
        $this->type_de_compte = $type_de_compte; 
    }




}