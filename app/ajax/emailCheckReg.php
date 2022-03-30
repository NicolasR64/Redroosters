<?php
require_once("../models/User.php");


if(isset($_GET["email"]) && !empty($_GET["email"])){
    $email=$_GET["email"];
    $user = new User();
    $existe = 'false';
    if($user->checkMail($email)) {
        $existe = 'true';
    }
    echo $existe;
}




?>