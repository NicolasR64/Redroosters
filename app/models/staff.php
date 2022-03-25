<?php
require_once('Model.php');

class Staff extends Model{

    private $id;
    private $seasonArrived;
    private $idFonction;


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
     * Get the value of idFonction
     */ 
    public function getIdFonction()
    {
        return $this->idFonction;
    }

    public function setIdFonction($idFonction)
    {
        $this->idFonction = $idFonction;
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

    public function addStaff(){
        $sql = "INSERT INTO staff (id,seasonArrived,idFonction) Values ('$this->id','$this->seasonArrived','$this->idFonction')";
        $this->executeRequest($sql,false);
    }
}

?>