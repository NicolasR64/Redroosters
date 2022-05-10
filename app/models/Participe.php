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

    /* Récupération d'entrée à partir de l'id d'un event*/
    public function getEntryByEventId($event){
        $sql = "SELECT * FROM `participe` WHERE idEvent = $event";
        $data = $this->executeRequest($sql);
        return $data;
    }

    /* modifier une entrée à partir de l'id d'un joueur */
    public function getEntryByUserIdAndEventId($user, $event){
        $sql = "SELECT * FROM `participe` WHERE idUser = $user AND idEvent = $event";
        $data = $this->executeRequest($sql);
        return $data;
    }

    /* modifier une entrée à partir de l'id d'un joueur */
    public function UpdateEntryByUserIdAndEventId($user, $event, $isDispo, $isAnswer){
        $sql = "UPDATE `participe` SET `isDispo`='$isDispo',`isAnswer`='$isAnswer' WHERE idUser = $user AND idEvent = $event";
        $data = $this->executeRequest($sql, false);
    }

    /* modifier une entrée à partir de l'id d'un joueur */
    public function UpdateEntryByUserIdAndEventIdOther($user, $event, $isSelected){
        $sql = "UPDATE `participe` SET isSelected='$isSelected' WHERE idUser = $user AND idEvent = $event";
        $data = $this->executeRequest($sql, false);
    }
}



?>