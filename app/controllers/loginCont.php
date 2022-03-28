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

    if(isset($_POST["login"]) && !empty($_POST["login"])){
        if(isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"])){
            $email = cleanData($_POST["inputEmail"]);
            if(isset($_POST["inputPassword"]) && !empty($_POST["inputPassword"])){
                $pwd = cleanData($_POST["inputPassword"]);
                $user = new User();
                $user = $user->userConnexion($email,$pwd);
                if($user != null){
                    $_SESSION["user"]=serialize($user);
                    header("Location: /home");
                }
            }
        }
    }



?>