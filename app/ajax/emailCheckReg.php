<?php
require_once("../models/User.php");

function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if(isset($_GET["email"]) && !empty($_GET["email"])){
    $email=cleanData($_GET["email"]);
    $user = new User();
    $existe = 'false';
    if($user->checkMail($email)) {
        $existe = 'true';
    }
    echo $existe;
}




?>