<?php

    require_once("../models/User.php");

    // Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // récupère l'url de la page courante
    $url="";
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
    else  $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];


        if(isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"])){
            $user = new User();
            $mail = cleanData($_POST["inputEmail"]);
            if(filter_var($mail,FILTER_VALIDATE_EMAIL) && $user->checkMail($mail)){
                $token = $user->getTokenByMail($mail);
                echo $token;
            }
        }


?>