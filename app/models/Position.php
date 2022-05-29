<?php
require_once('Model.php');

class Position extends model{

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

    // Récupère l'ensemble des positions existante
    public function getAllPosition(){
        $sql = "SELECT * FROM `position`";
        $data = $this->executeRequest($sql);
        return $data;
    }
}


?>