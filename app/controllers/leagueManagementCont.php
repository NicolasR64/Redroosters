<?php
    require_once("../models/league.php");

    if(isset($_POST['form-league'])){
        if(isset($_POST["inputCategorie"]) && $_POST["inputCategorie"] != "" ){
            if(isset($_POST["inputSeasonYear"]) && $_POST["inputSeasonYear"] != ""){
                //Create Event object//

                $league = new League();
                
                //clean data
                $category = htmlspecialchars($_POST["inputCategorie"]);
                $seasonYear= htmlspecialchars($_POST["inputSeasonYear"]);

                
                //add data to the object
                $league->setCategory($category);
                $league->setSeasonYear($seasonYear);
                
                $league->addLeague();
                header('Location: /home'); //TODO demander pour avoir redirection pour créer d'autres league
    
            }   
        }
    }