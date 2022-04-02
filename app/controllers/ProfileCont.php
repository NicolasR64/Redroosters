<?php

class ProfileCont {

    // FAIRE TEST
    // récupération des données de l'utilisateur
    function getUser(){
        //vérification que l'id est présent
        //mettre quand test fini
        // unserialize($_SESSION['user']->getId())
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

    // FAIRE TEST
    // récupération des données du joueur par son id
    function getPlayerById($id){
        require_once('../models/Player.php');
        //récupération du joueur
        $player = new Player();
        $resultat = $player->getPlayerById($id);
        return $resultat;
    }

    // FAIRE TEST
    // récupére la position du joueur
    function getPositionPlayer($idPosition){
        require_once('../models/Position.php');
        //récupération du joueur
        $player = new Player();
        $resultat = $player->getPosition($idPosition);
        return $resultat;
    }

    // FAIRE TEST
    // récupération des données du staff par son id
    function getStaffById($id){
        require_once('../models/Staff.php');
        //récupération du Staff
        $staff = new Staff();
        $resultat = $staff->getStaffById($id);
        return $resultat;
    }

    // FAIRE TEST
    // récupère la fonction du staff
    function getFunctionStaff($idFunction){
        require_once('../models/Functions.php');
        //récupération du joueur
        $staff = new Staff();
        $resultat = $staff->getFunction($idFunction);
        return $resultat;
    }

    //FAIRE TEST
    // vérifie si l'utiliateur est en droit d'accéder à la page profileManagement
    function isEligibleToModify(){
        if(isset($_GET['id'])){
            
        }else{
            $can = false;
        }

        return $can;
    }
}