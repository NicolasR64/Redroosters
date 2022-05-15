<?php
require_once('Model.php');

class Play extends Model{
    private $idTeam;
    private $idMatch;
    private $notation;


    /**
     * Get the value of idTeam
     */ 
    public function getIdTeam()
    {
        return $this->idTeam;
    }

    /**
     * Set the value of idTeam
     *
     */ 
    public function setIdTeam($idTeam)
    {
        $this->idTeam = $idTeam;
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
        $sql="INSERT INTO `play` (`idMatch`,`idTeam`,`notation`) VALUES('$this->idMatch','$this->idTeam','$this->notation')";
        $this->executeRequest($sql, false);
    }
}

?>