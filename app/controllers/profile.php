<?php

class profile {

    // FAIRE TEST
    // récupération des données du joueur par son id
    function getUserById(){
        //vérification que l'id est présent
        if(isset($_GET['id']) && isset($_SESSION['id'])){

            //importation du model
            require_once('../models/User.php');
            $user = new User();

            //récupération de l'utilisateur
            $resultat = $user->getUserByID($_GET['id']);
            // TODO : regarder si $resultat = $user->getUserByID($_GET['id']); marche aussi.
            return $resultat;
        }else{
            /*
             * Cela signifie qu'il y a une erreur! 
             */
            // TODO : regarder la manière dont on renverra l'erreur!
        }
    }

    //vérifie si l'utiliseur demande à voir son propre profil
    function isDataUser(){
        if(isset($_GET['id']) && isset($_SESSION['id'])){
            return 1;
        }else{
            /*
             * Cela signifie qu'il y a une erreur! 
             */
            // TODO : regarder la manière dont on renverra l'erreur!
        }
    }
}