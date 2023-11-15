<?php 

class Conseiller {
    private ?int $id_conseiller;
    private ?int $id_banque;
    private ?string $nom;
    private ?string $prenom;

    function __construct($id_conseiller = null
                        , ?int $id_banque = null
                        , ?string $nom = null
                        , ?string $prenom = null
                        ) 
    {
        $this->id_conseiller = $id_conseiller;
        $this->id_banque = $id_banque;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    function getid_conseiller(){
        return $this->id_conseiller;
    }

    function getid_banque(){
        return $this->id_banque;
    }

    function getnom(){
        return $this->nom;
    }

    function getPrenom(){
        return $this->prenom;
    }

    function setid_Conseiller(int $id_conseiller){
        $this->id_conseiller = $id_conseiller;
    }

    function setid_banque(int $id_banque){
        $this->id_banque = $id_banque;
    }

    function setnom(string $nom){
        $this->nom = $nom;
    }

    function setprenom(string $prenom){
        $this->prenom = $prenom;
    }


}