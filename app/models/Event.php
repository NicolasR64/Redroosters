<?php
require_once('Model.php');

class Event extends Model{

    private $id;
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
           $exec = 'set'.ucfirst($key);
           if(method_exists($this,$method)){
            $this->$method($value);
        }else{
            echo 'Nom de champs invalide';
        }
     }
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
        return $this->getRdvDate;
    }
   
  
    public function setRdvDate($rdvDate)
    {
        $this->rdvDate = $rdvDate;
   
    }

    public setName($name){
        $this->name = $name;
    }

    public getName(){
        return $this->name;
    }

    public setDateBegin($dateBegin){
        $this->dateBegin = $dateBegin;
    }

    public getDateBegin(){
        return $this->dateBegin;
    }

    public setDateEnd($dateEnd){
        $this->dateBegin = $dateBegin;
    }

    public getDateEnd(){
        return $this->dateEnd;
    }

    public setRdvHours($rdvHours){
        $this->rdvHours = $rdvHours;
    }

    public getRdvHours(){
        return $this->rdvHours;
    }

    public setStreet($street){
        $this->street = $street;
    }

    public getStreet(){
        return $this->street;
    }

    public setRdvCity($rdvCity){
        $this->rdvCity = $rdvCity;
    }

    public getRdvCity(){
        return $this->rdvCity;
    }

    public setCity($city){
        $this->city = $city;
    }

    public getCity(){
        return $this->city;
    }

    public setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }

    public getPostalCode(){
        return $this->postalCode;
    }

    public setRdvStreet($rdvStreet){
        $this->rdvStreet = $rdvStreet;
    }

    public getRdvStreet(){
        return $this->rdvStreet;
    }

    public setHours($hours){
        $this->hours = $hours;
    }

    public getHours(){
        return $this->hours;
    }


    public setRdvPostalCode($rdvPostalCode){
        $this->rdvPostalCode = $rdvPostalCode;
    }

    public getRdvPostalCode(){
        return $this->rdvPostalCode;
    }

    
    public setDescription($description){
        $this->description = $description;
    }

    public getDescription(){
        return $this->description;
    }
}

?>