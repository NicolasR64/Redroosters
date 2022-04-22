<?php

session_set_cookie_params(6000);
session_start();

require_once("../models/User.php");

// Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $step = 1;

  if(isset($_POST["inputPwd"]) && !empty($_POST["inputPwd"])){
    if(isset($_POST["inputCPwd"]) && !empty($_POST["inputCPwd"])){
        $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
        $pwd  = cleanData($_POST["inputPwd"]);
        $cPwd = cleanData($_POST["inputCPwd"]);
        if(preg_match($pattern,$pwd) && strcmp($pwd,$cPwd) == 0){
                $user = unserialize($_SESSION["user"]);
                $pwd = password_hash($pwd,PASSWORD_DEFAULT);
                $user->setPassword($pwd);
                $user->updatePwd2();
                $step=2;
            }
        }
    }




?>