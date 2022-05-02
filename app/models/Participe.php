<?php
require_once('Model.php');

class Participe extends Model{

    private $idUser;
    private $idEvent;
    private $isDispo;

    /**
     * Get the value of isDispo
     */ 
    public function getIsDispo()
    {
        return $this->isDispo;
    }

    public function setIsDispo($isDispo)
    {
        $this->isDispo = $isDispo;
    }

    /**
     * Get the value of idEvent
     */ 
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /* Ajout d'une entrée*/
    public function addEntry($event,$user){
        $sql = "INSERT INTO participe (idEvent, idUser, isDispo) VALUES ('$event','$user',0)";
        $this->executeRequest($sql,false);
    }
}



?>