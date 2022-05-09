<?php

    require_once("../models/Team.php");

    // Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $step = 1;

    if(isset($_POST["change"]) && !empty($_POST["change"])){
        $code ="";
        $ok = true;
        if(empty($_POST["inputCode"])){
            $code = openssl_random_pseudo_bytes(7);
            $code = bin2hex($code); 
        } else {
            $code = cleanData($_POST["inputCode"]);
            if(strlen($code)<8 || strlen($code)>15) $ok =false;
        } if ($ok){
            $step = 2;
            $team = new Team();
            $team->changeCodeRegister($code);
        }
    }


?>