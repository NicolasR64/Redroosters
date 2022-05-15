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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value of ice rink id 
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the name of ice rink
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of ice rink
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get value of the city ice rink  
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set value of city ice rink
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get value of street ice rink
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set value of street ice rink
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }
    
    /**
     * Get value of postal code  ice rink
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set value of postal code ice rink
     */
    public function setPostalCode($postalCode)
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
        $iceList = array();
        $sql = "SELECT * FROM `ice_rink`";
        $data = $this->executeRequest($sql);
        foreach($data as $elem){
            $iceRink = new IceRink();
            $iceRink->fillObject($elem);
            array_push($iceList,$iceRink);
        }
        return $iceList;
    }
    
    /**
     * add ice rink data to the db 
     */
    public function addIceRink(){
        $sql = "INSERT INTO ice_rink (name,city,street,postalCode)  VALUES ('$this->name','$this->city',$this->street,$this->postalCode)";
        $id = $this->executeRequest($sql, false);
        $this->id = $id;
    }

}

?>