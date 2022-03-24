<?php
require_once('Model.php');

class League extends Model{

    private $id;
    private $seasonYear;
    private $category;
    private $isCurrentSeason;


    /* SELECT */
    
    // FAIRE TEST
    // get data about current season
    function getCurrentSeason(){
        $sql = 'SELECT * FROM  `season` WHERE `seasonYear`=date("Y")';
        $resultat = $this->executeRequest($sql);
        $league = $this->fillObject($resultat[0]);
        return $league;
    }

    // FAIRE TEST
    // get data about a specific season
    function getSeasonByYear($year){
        $sql = "SELECT * FROM  `season` WHERE `seasonYear`=$year";
        $resultat = $this->executeRequest($sql);
        $league = $this->fillObject($resultat[0]);
        return $league;
    }

    // FAIRE TEST
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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

        return $this;
    }
}