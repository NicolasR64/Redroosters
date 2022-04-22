<?php

require_once("Model.php");

class Functions extends model{

    private $id;
    private $name;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // FAIRE TEST
    // Récupère l'ensemble des functions existante
    public function getAllFunction(){
        $sql = "SELECT name FROM `function`";
        $data = $this->executeRequest($sql);
        return $data;
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


}