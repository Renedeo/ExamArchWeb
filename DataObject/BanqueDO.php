<?php

class Banque{

    private ?int $id_banque;
    
    private ?string $nomination;

    private ?string $localisation;
    
   
    function __construct(int $id_banque=null
                        , ?string $nomination=null
                        , ?string $localisation=null) {
        $this->id_banque = $id_banque;
        $this->nomination = $nomination;
        $this->localisation = $localisation;
    }

    function getid_banque(){
        return $this->id_banque;
    }

    function getnomination(){
        return $this->nomination;   
    }

    function getlocalisation(){
        return $this->localisation;
    }

    // private
    function setid_banque($id_banque){
        $this->id_banque = $id_banque;
    }

    function setnomination($nomination){
        $this->nomination = $nomination;
    }

    function setlocalisation($localisation){
        $this->localisation = $localisation;
    }
}