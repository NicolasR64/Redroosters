<?php
require_once('Model.php');

class Staff extends Model{

    private $id;
    private $seasonArrived;
    private $idFunction;


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
    public function getIdFunction()
    {
        return $this->idFunction;
    }

    public function setIdFunction($idFunction)
    {
        $this->idFunction = $idFunction;
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

    public function addStaff(){
        $sql = "INSERT INTO staff (id,seasonArrived,idFonction) Values ('$this->id','$this->seasonArrived','$this->idFonction')";
        $this->executeRequest($sql,false);
    }

    // SELECT

    public function getStaffById($id){
        $sql = "SELECT * FROM `staff` WHERE id=$id";
        $data = $this->executeRequest($sql);
        $staff = new Staff();
        $staff->fillObject($data[0]);
        return $staff;
    }

    public function getFunction($idFunction){
        $sql = "SELECT * FROM `function` WHERE id=$idFunction";
        $data = $this->executeRequest($sql);
        require_once('Functions.php');
        $function = new Functions();
        $function->fillObject($data[0]);
        return $function;
    }

}

?>