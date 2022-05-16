<?php
require_once("../models/Event.php");
require_once("../controllers/eventEditCont.php");

$event = new Event();

$event->setRdvHours("24:52:00");
$event->setHours("2");

$result = calculateEndHour($event);

echo $result;

?>