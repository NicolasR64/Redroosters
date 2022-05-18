<?php
require_once('Model.php');

class Matchs extends Model{

    private $id;
    private $homeScoreTiersTemps1;
    private $homeScoreTiersTemps2;
    private $homeScoreTiersTemps3;
    private $visitorScoreTiersTemps1;
    private $visitorScoreTiersTemps2;
    private $visitorScoreTiersTemps3;
    private $isAmical;
    private $isVisitor;
    private $idIceRink;
    private $idLeague;

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

    /// SELECT

    public function getAllMatchBySeason($year){
        $sql = "SELECT * FROM `team` WHERE ";
        $data = $this->executeRequest($sql);
        return $data;
    }

    //ajout d'un match
    public function addMatch(){
        $sql="INSERT INTO `match`(`id`, `homeScoreTiersTemps1`, `homeScoreTiersTemps2`, `homeScoreTiersTemps3`, `visitorScoreTiersTemps1`, `visitorScoreTiersTemps2`, `visitorScoreTiersTemps3`, `isAmical`, `isVisitor`, `idIceRink`, `idLeague`) 
        VALUES('$this->id','$this->homeScoreTiersTemps1','$this->homeScoreTiersTemps2','$this->homeScoreTiersTemps3','$this->visitorScoreTiersTemps1','$this->visitorScoreTiersTemps2','$this->visitorScoreTiersTemps3','$this->isAmical','$this->isVisitor','$this->idIceRink','$this->idLeague')";
        $this->executeRequest($sql,false);
    }

    //Obtient un match grâce à son ID
    public function getMatchById($ID){
        $sql="SELECT * FROM `match` WHERE `id` = $ID";
        $data = $this->executeRequest($sql);
        if (!empty($data)) {
            $match = new Matchs();
            $match->fillObject($data[0]);
        }
        return $match;
    }

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
     * Get the value of HomeScoreTiersTemps1
     */ 
    public function getHomeScoreTiersTemps1()
    {
        return $this->homeScoreTiersTemps1;
    }

    /**
     * Set the value of HomeScoreTiersTemps1
     */ 
    public function setHomeScoreTiersTemps1($homeScoreTiersTemps1)
    {
        $this->homeScoreTiersTemps1 = $homeScoreTiersTemps1;
    }

    /**
     * Get the value of HomeScoreTiersTemps2
     */ 
    public function getHomeScoreTiersTemps2()
    {
        return $this->homeScoreTiersTemps2;
    }

    /**
     * Set the value of HomeScoreTiersTemps2
     */ 
    public function setHomeScoreTiersTemps2($homeScoreTiersTemps2)
    {
        $this->homeScoreTiersTemps2 = $homeScoreTiersTemps2;
    }

     /**
     * Get the value of HomeScoreTiersTemps3
     */ 
    public function getHomeScoreTiersTemps3()
    {
        return $this->homeScoreTiersTemps3;
    }

    /**
     * Set the value of HomeScoreTiersTemps3
     */ 
    public function setHomeScoreTiersTemps3($homeScoreTiersTemps3)
    {
        $this->homeScoreTiersTemps3 = $homeScoreTiersTemps3;
    }

      /**
     * Get the value of visitorScoreTiersTemps1
     */ 
    public function getVisitorScoreTiersTemps1()
    {
        return $this->visitorScoreTiersTemps1;
    }

    /**
     * Set the value of visitorScoreTiersTemps1
     */ 
    public function setVisitorScoreTiersTemps1($visitorScoreTiersTemps1)
    {
        $this->visitorScoreTiersTemps1 = $visitorScoreTiersTemps1;
    }

      /**
     * Get the value of visitorScoreTiersTemps2
     */ 
    public function getVisitorScoreTiersTemps2()
    {
        return $this->visitorScoreTiersTemps2;
    }

    /**
     * Set the value of visitorScoreTiersTemps2
     */ 
    public function setVisitorScoreTiersTemps2($visitorScoreTiersTemps2)
    {
        $this->visitorScoreTiersTemps2 = $visitorScoreTiersTemps2;
    }

    /**
     * Get the value of visitorScoreTiersTemps3
     */ 
    public function getVisitorScoreTiersTemps3()
    {
        return $this->visitorScoreTiersTemps3;
    }

    /**
     * Set the value of visitorScoreTiersTemps3
     */ 
    public function setVisitorScoreTiersTemps3($visitorScoreTiersTemps3)
    {
        $this->visitorScoreTiersTemps3 = $visitorScoreTiersTemps3;
    }
    
    /**
     * Get the value of isAmical
     */ 
    public function getIsAmical()
    {
        return $this->isAmical;
    }

    /**
     * Set the value of isAmical
     */ 
    public function setIsAmical($isAmical)
    {
        $this->isAmical = $isAmical;
    }

    /**
     * Get the value of isVisitor
     */ 
    public function getIsVisitor()
    {
        return $this->isVisitor;
    }

    /**
     * Set the value of isVisitor
     */ 
    public function setIsVisitor($isVisitor)
    {
        $this->isVisitor = $isVisitor;
    }

    /**
     * Get the value of id
     */ 
    public function getIdIceRink()
    {
        return $this->idIceRink;
    }

    public function setIdIceRink($idIceRink)
    {
        $this->idIceRink = $idIceRink;
    }

     /**
     * Get the value of idLeague
     */ 
    public function getIdLeague()
    {
        return $this->idLeague;
    }

    /**
     * Set the value of idLeague
     */ 
    public function setIdLeague($idLeague)
    {
        $this->idLeague = $idLeague;
    }
}