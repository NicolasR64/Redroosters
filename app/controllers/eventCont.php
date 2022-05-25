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

if(empty($_GET['id'])){
    header('Location: /events');
}
$data = intval($_GET['id']);
$event = $eventManager->getEventById($data);
if($event->getIsMatch() == 1){
    require_once("../models/Matchs.php");
    require_once("../models/play.php");
    require_once("../models/Team.php");
    require_once("../models/IceRink.php");
    require_once("../models/league.php");
    $match = new Matchs();
    $match = $match->getMatchById($event->getId());
    $scoresTotH = $match->getHomeScoreTiersTemps1() + $match->getHomeScoreTiersTemps2() + $match->getHomeScoreTiersTemps3();
    $scoresTotV = $match->getVisitorScoreTiersTemps1() + $match->getVisitorScoreTiersTemps2() + $match->getVisitorScoreTiersTemps3();
    if($match->getIsVisitor() == 0){
        if ($scoresTotH > $scoresTotV) $statut = "Victoire";
        else if ($scoresTotH < $scoresTotV) $statut = "Défaite";
            else $statut = "Egalité";
    } else {
        if ($scoresTotH < $scoresTotV) $statut = "Victoire";
        else if ($scoresTotH > $scoresTotV) $statut = "Défaite";
            else $statut = "Egalité";
    }
    $play = new Play();
    $play = $play->getPlayById($event->getId());
    $opponent = $play->getIdTeam();
    $equipe = new Team();
    $equipe = $equipe->getTeam($opponent);
    $league = new League();
    $league = $league->getLeagueById($match->getIdLeague());
    $iceRink = new IceRink();
    $iceRink = $iceRink->getIceRink($match->getIdIceRink());
}
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
