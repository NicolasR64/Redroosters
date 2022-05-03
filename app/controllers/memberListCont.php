<?php

require_once("../models/User.php");
require_once("../models/staff.php");
require_once("../models/player.php");

$user = new User();
        $player = new Player();
        $staff = new Staff();
        $joueurs = $user->getAllUsers();
        foreach($joueurs as $elem){
            if($elem->getIsPlayer() == 1){
                $player = $player->getPlayerById($elem->getId());
                $pos = $player->getPosition($player->getIdPosition());
                $elem->setPlayer($pos->getName());
            } else $elem->setPlayer("N/A");
            if($elem->getIsStaff() == 1){
                $staff = $staff->getStaffById($elem->getId());
                $pos = $staff->getFunction($staff->getIdFunction());
                $elem->setStaff($pos->getName());
            } else $elem->setStaff("N/A");
        }


?>