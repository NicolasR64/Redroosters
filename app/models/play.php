<?php
require_once('Model.php');

class Play extends Model{
    private $idTeam;
    private $idMatch;
    private $notation;

    //Hydratation
    public function fillObject(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }else{
                echo 'Nom de champs invalide';
            }
        }
    }

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

    //Obtient un jeu grâce à son ID
    public function getPlayById($ID){
        $sql="SELECT * FROM `play` WHERE `idMatch` = $ID";
        $data = $this->executeRequest($sql);
        if (!empty($data)) {
            $play = new Play();
            $play->fillObject($data[0]);
        }
        return $play;
    }

    //Modifie un jeu
    public function updatePlay(){
        $sql = "UPDATE `play` SET `idTeam` = '$this->idTeam', `notation` = '$this->notation' WHERE `idMatch`= '$this->idMatch'";
        $this->executeRequest($sql,false);
    }
}

?>