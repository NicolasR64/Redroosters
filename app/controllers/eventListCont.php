<?php
    require_once("../models/Event.php");
    require_once("../models/User.php");

    $event = new Event();
    $userManager = new User();
    $upcomingEvents = $event->getEventAsc();
    $pastEvents = $event->getEventDesc(); 
    $user = unserialize($_SESSION["user"]);

    function calculateDays($dateBegin){

       $dateExplode = explode("-", $dateBegin);
       $m = $dateExplode[1];

       $today = date('Y-m-d');
       $begin = new DateTime($dateBegin);
       $end = new DateTime($today);

       $interval = $begin->diff($end);

       if($interval->y >= 1){
            return $interval->y." année(s), ".$interval->m." mois et ".$interval->d." jours";
       }elseif($interval->m >= 1){
            return $interval->m." mois et ".$interval->d." jours";
       }else{
            return $interval->d." jours";
       }
    }

?>