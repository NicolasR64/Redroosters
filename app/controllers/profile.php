<?php

class profile {

    //FAIRE TEST
    /* récupération d'un joueur par son id */
    function getUserById(){
        //vérification que l'id est présent
        if(isset($_GET['id'])){
            //import du model et création de l'objet model
            require_once('../models/User.php');
            $user = new User();
            //récupération de l'utilisateur
            $resultat = $user->getUserByID($_GET['id']);
            // TODO : regarder si $resultat = $user->getUserByID($_GET['id']); marche aussi.
            return $resultat;
        }else{
            // TODO : regarder la manière dont on renverra l'erreur!
        }
    }
}