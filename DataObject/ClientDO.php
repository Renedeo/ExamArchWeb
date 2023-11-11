<?php

class Client{

    private ?int $id_client;

    private ?string $nom;
    
    private ?string $prenom;

    private ?Datetime $date_de_naissance;

    private ?string $situation_maritale;

    function __construct(int $id_client = null
                        , ?string $nom = null
                        , ?string $prenom = null
                        , ?Datetime $date_de_naissance = null
                        , ?string $situation_maritale = null
    ) {
        $this->id_client = $id_client;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_de_naissance = $date_de_naissance;
        $this->situation_maritale = $situation_maritale;
    }

    public function getid_client(){
        return $this->id_client;
    }

    function getnom(){
        return $this->nom;
    }

    function getprenom(){
        return $this->prenom;
    }
    function getdate_de_naissance(){
        return $this->date_de_naissance;
    }
    function getsituation_maritale(){
        return $this->situation_maritale;
    }

    public function setid_client($id_client){
        $this->id_client = $id_client;
    }

    function setnom($nom){
        $this->nom = $nom;
    }
    
    function setprenom($prenom){
        $this->prenom = $prenom;
    }
    function setdate_de_naissance($date_de_naissance){
        $this->date_de_naissance = $date_de_naissance;
    }
    function setsituation_maritale($situation_maritale){
        $this->situation_maritale = $situation_maritale;
    }
};