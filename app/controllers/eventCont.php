<?php
session_start();
require_once("../models/Event.php");

function calculateDays($h)
{

    if ($h >= 8760) {
        $hour = round($h / 8760);
        return "Durée : " . $h . " année(s)";
    } elseif ($h >= 730 && $h < 8760) {
        $hour = round($h / 730);
        return "Durée : " . $h . " mois";
    } elseif ($h >= 168 && $h < 730) {
        $hour = round($h / 168);
        return "Durée : " . $h . " semaine(s)";
    } elseif ($h >= 24 && $h < 168) {
        $hour = round($h / 24);
        return  "Durée : " . $hour . " jour(s)";
    } else {
        return "Durée : " . $h . " heure(s)";
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


function getListPlayerByEvent($eventId)
{
    require_once("../models/Participe.php");
    $participate = new Participe();
    return $participate->getEntryByEventId($eventId);
}

function getUserById($id)
{
    require_once("../models/User.php");
    $user = new User();
    return $user->getUserById($id);
}

function getPlayerById($id)
{
    require_once("../models/Player.php");
    $player = new Player();
    return $player->getPlayerById($id);
}

function getEntryByUserIdAndEventId($id, $event)
{
    require_once("../models/Participe.php");
    $participate = new Participe();
    return $participate->getEntryByUserIdAndEventId($id, $event);
}
