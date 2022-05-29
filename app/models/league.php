<?php
require_once('Model.php');

class League extends Model{

    private $id;
    private $seasonYear;
    private $category;

    /* SELECT */
    
    // get data about current season
    function getCurrentSeason(){
        $year=date("Y");
        $sql = "SELECT * FROM  `league` WHERE `seasonYear`=$year";
        $resultat = $this->executeRequest($sql);
        if(empty($resultat)){
            $league = "";
        }else{
            $league = new League();
            $league->fillObject($resultat[0]);
        }
        return $league;
    }

    // get data about a specific season
    function getSeasonByYear($year){
        $sql = "SELECT * FROM  `league` WHERE `seasonYear`=$year";
        $resultat = $this->executeRequest($sql);
        $league = $this->fillObject($resultat[0]);
        return $league;
    }

    //get a specific league
    function getLeagueById($id){
        $sql = "SELECT * FROM  `league` WHERE `id`='$id'";
        $resultat = $this->executeRequest($sql);
        $league = new League();
        $league->fillObject($resultat[0]);
        return $league;
    }

    // Hydratation
    public function fillObject(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }else{
                echo $key;
                echo 'Nom de champs invalide';
            }
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id){
        $this->id = $id;
    }

    /**
     * Get the value of seasonYear
     */ 
    public function getSeasonYear()
    {
        return $this->seasonYear;
    }

    /**
     * Set the value of seasonYear
     */ 
    public function setSeasonYear($seasonYear)
    {
        $this->seasonYear = $seasonYear;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of token
     *
     */ 
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * add data to the db
     */
    public function addLeague()
    {
        $sql = "INSERT INTO league (seasonYear, category)
     VALUES ('$this->seasonYear','$this->category')";
        $id = $this->executeRequest($sql, false);
        $this->id = $id;
    }
}