<?php
class LeagueCont {

    // GET OBJECT LEAGUE

    // FAIRE TEST
    //récupère la ligue de l'année courante
    public function getCurrentSeason(){
        require_once('../models/league.php');
        $leagueMod = new League();
        return $leagueMod->getCurrentSeason();
    }
}