<?php

require_once("../models/User.php");
require_once("../models/staff.php");
require_once("../models/player.php");

// récupère l'url de la page courante
$url="";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
else  $url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];

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

        if(isset($_GET["delete"]) && !empty($_GET["delete"])){
            $id = $_GET["delete"];
            $user->deleteUser($id);
            $url = strtok($url, '?');
            header("Location: $url");
        }

?>