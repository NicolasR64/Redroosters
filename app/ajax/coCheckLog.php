<?php
require_once("../models/User.php");

function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    


if(isset($_GET["email"]) && !empty($_GET["email"])){
    if(isset($_GET["pwd"]) && !empty($_GET["pwd"])){
        $email=cleanData($_GET["email"]);
        $pwd=cleanData($_GET["pwd"]);
        $user = new User();
        $existe = 'false';
        if($user->userConnexion($email,$pwd)) {
            $existe = 'true';
        }
        echo $existe;
    }
    
}




?>