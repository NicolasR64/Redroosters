<?php
session_start();
require_once("../models/Event.php");

$eventManager = new Event();

$data = intval($_GET['id']);

$event = $eventManager->getEventById($data);

if (empty($event)) {
    header('Location: /events');
}
