<?php
session_start();
//Ajouter vérification admin//
require_once("../models/Event.php");

$eventManager = new Event();

if (!isset($_GET['id']) && empty($_GET['id'])) {
    header("location: /events");
}

$event = $eventManager->getEventById($_GET['id']);
?>
