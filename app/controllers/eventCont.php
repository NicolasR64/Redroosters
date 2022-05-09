<?php
session_start();
require_once("../models/Event.php");

function calculateDays($h){

    if ($h >= 8760) {
        $hour = round($h/8760);
        return "Dans ".$h." année(s)";
    } elseif( $h >= 730 && $h < 8760) {
        $hour = round($h/730);
        return "Dans ".$h." mois";
    } elseif($h >= 168 && $h < 730){
        $hour = round($h/168);
        return "Dans ".$h. " semaine(s)";
    } elseif($h >= 24 && $h < 168){
        $hour = round($h/24);
        return  "Dans ".$hour." jour(s)";
    }else{
        return "Dans ".$h." heure(s)";
    }
}

$eventManager = new Event();

$data = intval($_GET['id']);
$event = $eventManager->getEventById($data);
echo $event->getHours();
$totalHours = calculateDays($event->getHours());

if (empty($event)) {
    header('Location: /events');
}
