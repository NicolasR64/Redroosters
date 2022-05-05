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

        if(isset($_GET["delete"]) && !empty($_GET["delete"]) && unserialize($_SESSION["user"])->getIsAdmin() == 1){
            $id = $_GET["delete"];
            if($id != unserialize($_SESSION["user"])->getId()) $user->deleteUser($id);
            $url = strtok($url, '?');
            header("Location: $url");
        }

        if(isset($_GET["changePlayerState"]) && !empty($_GET["changePlayerState"]) && unserialize($_SESSION["user"])->getIsAdmin() == 1){
            $id = $_GET["changePlayerState"];
            $user->changePlayerState($id);
            if($id == unserialize($_SESSION["user"])->getId()){
                if(unserialize($_SESSION["user"])->getIsPlayer() == 1) {
                    $copy = unserialize($_SESSION["user"]);
                    $copy->setIsPlayer(0);
                    $_SESSION["user"]=serialize($copy);
                } else {
                    $copy = unserialize($_SESSION["user"]);
                    $copy->setIsPlayer(1);
                    $_SESSION["user"]=serialize($copy);
                }
            }
            $url = strtok($url, '?');
            header("Location: $url");
        }

        if(isset($_GET["changeAdminState"]) && !empty($_GET["changeAdminState"]) && unserialize($_SESSION["user"])->getIsAdmin() == 1){
            $id = $_GET["changeAdminState"];
            $nbAdmin = $user->checkNumberOfAdmin();
            if($nbAdmin > 1){
                $user->changeAdminState($id);
                if($id == unserialize($_SESSION["user"])->getId()) {
                    $copy = unserialize($_SESSION["user"]);
                    $copy->setIsAdmin(0);
                    $_SESSION["user"]=serialize($copy);
                }
            } else if($id != unserialize($_SESSION["user"])->getId()) $user->changeAdminState($id);
            $url = strtok($url, '?');
            header("Location: $url");
        }

?>