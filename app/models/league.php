<?php
require_once('Model.php');

class League extends Model{

    private $id;
    private $seasonYear;
    private $category;
    private $isCurrentSeason;


    /* SELECT */
    
    // FAIRE TEST
    function getCurrentSeason(){
        $sql = 'SELECT * FROM  `season` WHERE date("Y")';
        $resultat = $this->executeRequest($sql);
        return $resultat;
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