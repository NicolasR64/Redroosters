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

    // GET OBJECT TEAM

    // FAIRE TEST
    //récupère la liste des équipes
    public function getAllTeamSorteBypts(){
        require_once('../models/team.php');
        $teamMod = new Team();
        //data est un tableau de données
        $data = $teamMod->getAllTeam();
        //transformation en tableau d'object
        $i=0;
        foreach($data as $key){
            $teamList[$i] = new Team();
            $teamList[$i]->fillObject($key);
            $i++;
        }
        return $teamList;
    }
}