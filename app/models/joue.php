<?php
require_once('Model.php');

class Joue extends Model{
    private $idPlayer;
    private $idMatch;
    private $notation;

    /**
     * Get the value of idPlayer
     */ 
    public function getIdPlayer()
    {
        return $this->idPlayer;
    }

    /**
     * Set the value of idPlayer
     *
     */ 
    public function setIdPlayer($idPlayer)
    {
        $this->idPlayer = $idPlayer;
    }

    /**
     * Get the value of idMatch
     */ 
    public function getIdMatch()
    {
        return $this->idMatch;
    }

    /**
     * Set the value of idMatch
     *
     */ 
    public function setIdMatch($idMatch)
    {
        $this->idMatch = $idMatch;

    }

    /**
     * Get the value of notation
     */ 
    public function getNotation()
    {
        return $this->notation;
    }

    /**
     * Set the value of notation
     *
     */ 
    public function setNotation($notation)
    {
        $this->notation = $notation;
    }

    public function addEntry(){
        $sql="INSERT INTO `joue` (`idMatch`,`idPlayer`,`notation`) VALUES('$this->idMatch','$this->idPlayer','$this->notation')";
        $this->executeRequest($sql, false);
    }

    public function deleteEntryByid(){
        $sql = "DELETE FROM `joue` WHERE idPlayer=$this->idPlayer";
        $this->executeRequest($sql, false);
    }
}

?>