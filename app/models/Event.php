<?php
require_once('Model.php');

class Event extends Model
{

    private $id;
    private $isMatch;
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

    public function fillObject(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                echo 'Nom de champs invalide';
            }
        }
    }

    // Get event with a specific id //

    public function getEventById($id)
    {
        $sql = "SELECT * FROM `event` WHERE `id` = $id";
        $data = $this->executeRequest($sql);
        if (!empty($data)) {
            $event = new Event();
            $event->fillObject($data[0]);
        }
        return $event;
    }

    // Get all events ordering by asc date //

    public function getEventAsc()
    {
        $tdsDate = date('Y-m-d');
        $sql = "SELECT * FROM `event` WHERE `dateBegin` >= '$tdsDate' ORDER BY `dateBegin` ASC";
        $arrayResult = $this->executeRequest($sql, PDO::FETCH_ASSOC);
        $data = array();

        foreach ($arrayResult as $elem) {
            $event = new Event();
            $event->fillObject($elem);
            array_push($data, $event);
        }

        return $data;
    }

    // Get all events ordering by desc date //

    public function getEventDesc()
    {
        $tdsDate = date('Y-m-d');
        $sql = "SELECT * FROM `event` WHERE `dateBegin` <= '$tdsDate' ORDER BY `dateBegin` Desc";
        $arrayResult = $this->executeRequest($sql, PDO::FETCH_ASSOC);
        $data = array();

        foreach ($arrayResult as $elem) {
            $event = new Event();
            $event->fillObject($elem);
            array_push($data, $event);
        }

        return $data;
    }

    //Insert function//

    public function addEvent()
    {
        $sql = "INSERT INTO `event` (`isMatch`,`rdvDate`, `rdvHours`, `rdvCity`, `rdvStreet`, `rdvPostalCode`, `name`, `hours`, `street`, `city`, `postalCode`, `description`, `dateBegin`, `dateEnd`)
     VALUES ('$this->isMatch','$this->rdvDate','$this->rdvHours','$this->rdvCity','$this->rdvStreet','$this->rdvPostalCode','$this->name','$this->hours','$this->street','$this->city','$this->postalCode','$this->description','$this->dateBegin','$this->dateEnd')";
        $id = $this->executeRequest($sql, false);
        $this->id = $id;
    }

    //Update event//

    public function updateEvent(){
        $sql = "UPDATE `event` SET `rdvDate` = '$this->rdvDate', `rdvHours` = '$this->rdvHours', `rdvCity` = '$this->rdvCity', `rdvStreet` = '$this->rdvStreet', `rdvPostalCode` = '$this->rdvPostalCode', `name` = '$this->name', `hours` = '$this->hours', `street` = '$this->street', `city` = '$this->city', `postalCode` = '$this->postalCode' , `description` = '$this->description', `dateBegin` = '$this->dateBegin', `dateEnd` = '$this->dateEnd' WHERE `id`= '$this->id'";
        $this->executeRequest($sql,false);
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


    public function setRdvDate($rdvDate)
    {
        $this->rdvDate = $rdvDate;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDateBegin($dateBegin)
    {
        $this->dateBegin = $dateBegin;
    }

    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    public function setRdvHours($rdvHours)
    {
        $this->rdvHours = $rdvHours;
    }

    public function getRdvHours()
    {
        return $this->rdvHours;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setRdvCity($rdvCity)
    {
        $this->rdvCity = $rdvCity;
    }

    public function getRdvCity()
    {
        return $this->rdvCity;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setRdvStreet($rdvStreet)
    {
        $this->rdvStreet = $rdvStreet;
    }

    public function getRdvStreet()
    {
        return $this->rdvStreet;
    }

    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    public function getHours()
    {
        return $this->hours;
    }


    public function setRdvPostalCode($rdvPostalCode)
    {
        $this->rdvPostalCode = $rdvPostalCode;
    }

    public function getRdvPostalCode()
    {
        return $this->rdvPostalCode;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of isMatch
     */ 
    public function getIsMatch()
    {
        return $this->isMatch;
    }

    /**
     * Set the value of isMatch
     *
     * @return  self
     */ 
    public function setIsMatch($isMatch)
    {
        $this->isMatch = $isMatch;

        return $this;
    }
}
