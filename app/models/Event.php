<?php
require_once('Model.php');

class Event extends Model{

    private $id;
    private $method;
    private $rdvDate;
    private $rdvHours;
    private $rdvCity;
    private $rdvStreet;
    private $rdvPostalCode;
    private $name;
    private $hours;
    private $street;
    private $city;
    private $postalCode;
    private $description;
    private $dateBegin;
    private $dateEnd;


    //Hydratation//

   public function fillObject(array $data){
       foreach($data as $key => $value){
           $method = 'set'.ucfirst($key);
           if(method_exists($this,$method)){
            $this->$method($value);
        }else{
            echo 'Nom de champs invalide';
        }
     }
   }

   // A tester //

    public function getEventById($id){
           $sql = "SELECT * FROM `event` WHERE id=$id";
           $data = $this->executeRequest($sql);
           $event = new Event();
           $event->fillObject($data[0]);
           return $event;
}

 
    //Getters and setters//

    public function getId()
    {
        return $this->id;
    }
   
  
    public function setId($id)
    {
        $this->id = $id;
   
    }


    public function getRdvDate()
    {
        return $this->rdvDate;
    }
   
  
    public function setRdvDate($rdvDate){
        $this->rdvDate = $rdvDate;
   
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setDateBegin($dateBegin){
        $this->dateBegin = $dateBegin;
    }

    public function getDateBegin(){
        return $this->dateBegin;
    }

    public function setDateEnd($dateEnd){
        $this->dateEnd = $dateEnd;
    }

    public function getDateEnd(){
        return $this->dateEnd;
    }

    public function setRdvHours($rdvHours){
        $this->rdvHours = $rdvHours;
    }

    public function getRdvHours(){
        return $this->rdvHours;
    }

    public function setStreet($street){
        $this->street = $street;
    }

    public function getStreet(){
        return $this->street;
    }

    public function setRdvCity($rdvCity){
        $this->rdvCity = $rdvCity;
    }

    public function getRdvCity(){
        return $this->rdvCity;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getCity(){
        return $this->city;
    }

    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }

    public function getPostalCode(){
        return $this->postalCode;
    }

    public function setRdvStreet($rdvStreet){
        $this->rdvStreet = $rdvStreet;
    }

    public function getRdvStreet(){
        return $this->rdvStreet;
    }

    public function setHours($hours){
        $this->hours = $hours;
    }

    public function getHours(){
        return $this->hours;
    }


    public function setRdvPostalCode($rdvPostalCode){
        $this->rdvPostalCode = $rdvPostalCode;
    }

    public function getRdvPostalCode(){
        return $this->rdvPostalCode;
    }

    
    public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }
}

?>