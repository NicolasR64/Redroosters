<?php
session_start();
require_once("../models/Event.php");
require_once("../controllers/isConnect.php");

$event = new Event();
if(empty($_POST['inputIdEvent2']) || !isset($_POST['inputIdEvent2'])){
    header("location: /events");
}else{
    $event->setId($_POST['inputIdEvent2']);
    $event->deleteEvent();
    header("location: /events");
}

?>