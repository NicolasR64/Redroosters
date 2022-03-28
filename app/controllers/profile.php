<?php

class profile {

    // FAIRE TEST
    // récupération des données de l'utilisateur par son id
    function getUserById(){
        //vérification que l'id est présent
        if(isset($_SESSION['id'])){

            require_once('../models/User.php');
            $user = new User();

            //récupération de l'utilisateur
            if(isset($_GET['id'])){   
                $resultat = $user->getUserById($_GET['id']);
            }else{
                $resultat = $user->getUserById($_SESSION['id']);
            }
            
            return $resultat;
        }else{
            /*
             * Cela signifie qu'il y a une erreur! 
             */
            // TODO : regarder la manière dont on renverra l'erreur!
        }
    }

    // FAIRE TESt
    // récupération des données du joueur par son id
    function getPlayerById($userMail){
        require_once('../models/Player.php');
        $user = new User();

        //récupération du joueur
        $resultat = $player->getPlayerById($userMail);
            
        return $resultat;
    }
}