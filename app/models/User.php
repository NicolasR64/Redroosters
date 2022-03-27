<?php
require_once('Model.php');

class User extends Model{

    private $id;
    private $mail;
    private $password;
    private $token;
    private $firstName;
    private $lastName;
    private $nickname;
    private $dateBirth;
    private $phone;
    private $isAdmin;
    private $emergencyMail;
    private $parentMail;
    private $isPlayer;
    private $isStaff;
    private $joueur;
    private $staff;


    /* SELECT */
    
    /* FAIRE TEST */
    function getUserByID($id){
        $sql = "SELECT * FROM  `users` WHERE id=$id";
        $data = $this->executeRequest($sql);
        $user = new User();
        $user->fillObject($data[0]);
        return $user;
    }

    /* INSERT */
    public function addUser(){
        $sql = "INSERT INTO users(mail,`password`,token,firstName,lastName,nickname,dateBirth,phone,emergencyMail,parentMail,isPlayer,isStaff)
                VALUES ('$this->mail','$this->password','$this->token','$this->firstName','$this->lastName','$this->nickname','$this->dateBirth','$this->phone','$this->emergencyMail','$this->parentMail','$this->isPlayer','$this->isStaff')";
        $this->executeRequest($sql,false);
    }

    /* Connexion */
    public function userConnexion($email,$pwd){
        $sql="SELECT * FROM `users` WHERE mail='$email'";
        $data = $this->executeRequest($sql);
        if(!empty($data)){
            $user = new User();
            $user->fillObject($data[0]);
            if(password_verify($pwd, $user->password)){
            return $user; 
            }
        }  
        return null;
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
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get the value of staff
     */ 
    public function getStaff()
    {
        return $this->staff;
    }

    public function setStaff($staff)
    {
        $this->staff = $staff;
    }

    /**
     * Get the value of joueur
     */ 
    public function getJoueur()
    {
        return $this->joueur;
    }

    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
    }

    /**
     * Get the value of isStaff
     */ 
    public function getIsStaff()
    {
        return $this->isStaff;
    }

    public function setIsStaff($isStaff)
    {
        $this->isStaff = $isStaff;
    }

    /**
     * Get the value of isPlayer
     */ 
    public function getIsPlayer()
    {
        return $this->isPlayer;
    }

    public function setIsPlayer($isPlayer)
    {
        $this->isPlayer = $isPlayer;
    }

    /**
     * Get the value of parentMail
     */ 
    public function getParentMail()
    {
        return $this->parentMail;
    }

    public function setParentMail($parentMail)
    {
        $this->parentMail = $parentMail;
    }

    /**
     * Get the value of emergencyMail
     */ 
    public function getEmergencyMail()
    {
        return $this->emergencyMail;
    }

    public function setEmergencyMail($emergencyMail)
    {
        $this->emergencyMail = $emergencyMail;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get the value of dateBirth
     */ 
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;
    }

    /**
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }
}