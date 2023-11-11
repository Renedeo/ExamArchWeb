<?php

class CompteClient{
    private ?int $id_compte;

    // private ?banque $banque;

    // private ?client $client;
    private ?int $id_banque;

    private ?int $id_client;

    private ?int $solde;

    private ?Datetime $date_creation;

    private ?Datetime $date_resiliation;

    private ?string $type_de_compte;

    function __construct(int $id_compte =  null
                        , ?int $id_banque = null
                        , ?int $id_client = null
                        , ?int $solde = null
                        , ?Datetime $date_creation = null
                        , ?Datetime $date_resiliation = null
                        , ?string $type_de_compte = null
    ) {
        $this->id_compte = $id_compte;
        $this->id_banque = $id_banque;
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

    function setid_client($idclient){
        $this->id_client = $idclient;
    }
    function setsolde($solde){
        $this->solde= $solde;
    }

    function setdata_de_creation($data_de_creation){
        $this->date_de_creation = $data_de_creation;
    }
    function setdate_de_resiliation($date_de_resiliation){
        $this->date_de_resiliation = $date_de_resiliation;
    }
    function settype_de_compte($type_de_compte){
        $this->type_de_compte = $type_de_compte; 
    }




}