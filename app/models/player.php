<?php
require_once('Model.php');

class Player extends model{

    private $id;
    private $seasonArrived;
    private $licenseNumber;
    private $jerseyNumber;
    private $size;
    private $isCarpooling;
    private $weight;
    private $isSick;
    private $isBan;
    private $handedness;
    private $idPosition;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of seasonArrived
     */ 
    public function getSeasonArrived()
    {
        return $this->seasonArrived;
    }

    public function setSeasonArrived($seasonArrived)
    {
        $this->seasonArrived = $seasonArrived;
    }

    /**
     * Get the value of licenseNumber
     */ 
    public function getLicenseNumber()
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber($licenseNumber)
    {
        $this->licenseNumber = $licenseNumber;
    }

    /**
     * Get the value of jerseyNumber
     */ 
    public function getJerseyNumber()
    {
        return $this->jerseyNumber;
    }

    public function setJerseyNumber($jerseyNumber)
    {
        $this->jerseyNumber = $jerseyNumber;
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Get the value of isCarpooling
     */ 
    public function getIsCarpooling()
    {
        return $this->isCarpooling;
    }

    public function setIsCarpooling($isCarpooling)
    {
        $this->isCarpooling = $isCarpooling;

    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get the value of isSick
     */ 
    public function getIsSick()
    {
        return $this->isSick;
    }

    public function setIsSick($isSick)
    {
        $this->isSick = $isSick;
    }

    /**
     * Get the value of isBan
     */ 
    public function getIsBan()
    {
        return $this->isBan;
    }
 
    public function setIsBan($isBan)
    {
        $this->isBan = $isBan;
    }

    /**
     * Get the value of handedness
     */ 
    public function getHandedness()
    {
        return $this->handedness;
    }

    public function setHandedness($handedness)
    {
        $this->handedness = $handedness;
    }

    /**
     * Get the value of idPosition
     */ 
    public function getIdPosition()
    {
        return $this->idPosition;
    }

    public function setIdPosition($idPosition)
    {
        $this->idPosition = $idPosition;
    }

    // Hydratation
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

    // ADD

    //ajoute un joueur dans la db
    public function addPlayer(){
        $sql = "INSERT INTO player(id,seasonArrived,licenseNumber,jerseyNumber,size,isCarpooling,`weight`,isSick,isBan,handedness,idPosition)
                Values('$this->id','$this->seasonArrived','$this->licenseNumber','$this->jerseyNumber','$this->size','$this->isCarpooling','$this->weight','$this->isSick','$this->isBan','$this->handedness','$this->idPosition')";
       $this->executeRequest($sql,false);
    }

    // SELECT

    //récupère un joueur par son id
    public function getPlayerById($id){
        $sql = "SELECT * FROM `player` WHERE id=$id";
        $data = $this->executeRequest($sql);
        $player = new Player();
        $player->fillObject($data[0]);
        return $player;
    }

    //récupère la position du joueur
    public function getPosition($idPosition){
        require_once('Position.php');
        $sql = "SELECT * FROM `position` WHERE id='$idPosition'";
        $data = $this->executeRequest($sql);
        $position = new Position();
        $position->fillObject($data[0]);
        return $position;
    }
}


?>