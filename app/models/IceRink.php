<?php
require_once('Model.php');

class IceRink extends Model{
    private $id;
    private $name;
    private $city;
    private $street;
    private $postalCode;

    /**
     * Get value of ice rink id 
     */
    public function getIdIceRink()
    {
        return $this->id;
    }

    /**
     * Set value of ice rink id 
     */
    public function setIdIceRink($id)
    {
        $this->id = $id;
    }

    /**
     * Get the name of ice rink
     */ 
    public function getNameIceRink()
    {
        return $this->name;
    }

    /**
     * Set the name of ice rink
     */
    public function setNameIceRink($name)
    {
        $this->name = $name;
    }

    /**
     * Get value of the city ice rink  
     */
    public function getCityIceRink()
    {
        return $this->city;
    }

    /**
     * Set value of city ice rink
     */
    public function setCityIceRink($city)
    {
        $this->city = $city;
    }

    /**
     * Get value of street ice rink
     */
    public function getStreetIceRink()
    {
        return $this->street;
    }

    /**
     * Set value of street ice rink
     */
    public function setStreetIceRink($street)
    {
        $this->street = $street;
    }
    
    /**
     * Get value of postal code  ice rink
     */
    public function getPostalCodeIceRink()
    {
        return $this->postalCode;
    }

    /**
     * Set value of postal code ice rink
     */
    public function setPostalCodeIceRink($postalCode)
    {
        $this->postalCode = $postalCode;
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

    /* - - - - sql - - - - */
    //Get input 
    public function getIceRink($id){
        $sql = "SELECT * FROM  `ice_rink` WHERE id=$id";
        $data = $this->executeRequest($sql);
        $iceRink = new IceRink();
        $iceRink->fillObject($data[0]);
        return $iceRink;
    }

    public function getAllIceRink(){
        $sql = "SELECT * FROM `ice_rink`";
        $data = $this->executeRequest($sql);
        return $data;
    }
  

}

?>