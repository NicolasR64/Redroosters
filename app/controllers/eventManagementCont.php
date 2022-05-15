<?php

require_once("../models/Event.php");
require_once("../models/Matchs.php");
require_once("../models/league.php");
require_once("../models/Team.php");
require_once("../models/IceRink.php");

function compareDate($dateRdv, $dateBegin)
{
    if ($dateRdv > $dateBegin) {
        return false;
    }
    return true;
}

function calculateInterval($beginDate, $endDate)
{

    $begin = new DateTime($beginDate);
    $end = new DateTime($endDate);

    $interval = $begin->diff($end);
    return $interval;
}

function calculateHour($t1, $t2)
{

    $tab = explode(":", $t1);
    $tab2 = explode(":", $t2);

    $h = $tab[0];
    $h2 = $tab2[0];

    if ($h >= $h2) {
        $h2 = $h2 + 24;
    }

    $ht = $h2 - $h;

    return $ht;
}

//The function calculates the total number of hours of the event

function calculateTotalTimeEvent($duration1, $duration2)
{

    $days = $duration1->days;
    //Verification if we have 24h with the time

    if ($duration2 == 24 && $days > 0) {
        $duration2 = 0;
        $hours = $days * 24 - $duration2;
    }
    //Verification if the end hour is less or equals to 12 hours
    elseif ($duration2 > 13) {
        $duration2 = 24 - $duration2;
        $hours = $days * 24 - $duration2;
    } else {
        $hours = $days * 24 + $duration2;
    }

    return $hours;
}

function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkValidDate($d1, $d2, $d3)
{
    $date1 = explode("-", $d1);
    $date2 = explode("-", $d2);
    $date3 = explode("-", $d3);
    $year = date("Y");

    if (($date1[0] < ($year - 10) || $date1[0] > ($year + 5)) || ($date2[0] < ($year - 10) || $date2[0] > ($year + 5)) || ($date3[0] < ($year - 10) || $date3[0] > ($year + 5))) {
        return 1;
    }
    return 0;
}

//Retrieval of the complete list of teams, ice rinks and leagues for the creation of a match
$ice = new IceRink();
$listeIceRink = $ice->getAllIceRink();

$team = new Team();
$listeTeam = $team->getAllOpponents();

// Check if form is completed //
if (isset($_POST['form-event']) && !empty($_POST['form-event'])) {
    if (
        isset(
            $_POST["inputName"],
            $_POST["inputBeginDate"],
            $_POST["inputEndDate"],
            $_POST["inputRdvHours"],
            $_POST["inputEndHour"],
            $_POST["inputStreet"],
            $_POST["inputCity"],
            $_POST["inputPostalCode"],
            $_POST["inputRdvStreet"],
            $_POST["inputRdvCity"],
            $_POST["inputRdvPostalCode"],
            $_POST["inputRdvDate"]
        ) && (!empty($_POST["inputName"]) && !empty($_POST["inputBeginDate"]) && !empty($_POST["inputEndDate"]) && !empty($_POST["inputRdvHours"])
            && !empty($_POST["inputEndHour"]) && !empty($_POST["inputStreet"]) && !empty($_POST["inputCity"]) && !empty($_POST["inputPostalCode"])
            && !empty($_POST["inputRdvStreet"])
            && !empty($_POST["inputRdvCity"]) && !empty($_POST["inputRdvPostalCode"]) && !empty($_POST["inputRdvDate"])
        )
    ) {

        //Create Event object//

        $event = new Event();

        //Clean data + add anti slashes//

        $name = addslashes(cleanData($_POST["inputName"]));
        $beginDate = cleanData($_POST["inputBeginDate"]);
        $endDate = cleanData($_POST["inputEndDate"]);
        $rdvHours = cleanData($_POST["inputRdvHours"]);
        $endHours = cleanData($_POST["inputEndHour"]);
        $street = addslashes(cleanData($_POST["inputStreet"]));
        $city = addslashes(cleanData($_POST["inputCity"]));
        $postalCode = cleanData($_POST["inputPostalCode"]);
        $rdvStreet = addslashes(cleanData($_POST["inputRdvStreet"]));
        $rdvCity = addslashes(cleanData($_POST["inputRdvCity"]));
        $rdvPostalCode = addslashes(cleanData($_POST["inputRdvPostalCode"]));
        $description = addslashes(cleanData($_POST["inputDescription"]));
        $rdvDate = cleanData($_POST["inputRdvDate"]);

        //Calculation of total hours//

        $duration = calculateInterval($beginDate, $endDate);
        $durationHours = calculateHour($rdvHours, $endHours);
        $totalHours = calculateTotalTimeEvent($duration, $durationHours);

        //Add data to the object//

        if(checkValidDate($beginDate,$endDate,$rdvDate) == 0){
            $event->setName($name);
            $event->setRdvDate($rdvDate);
            $event->setDateBegin($beginDate);
            $event->setDateEnd($endDate);
            $event->setRdvHours($rdvHours);
            $event->setStreet($street);
            $event->setCity($city);
            $event->setPostalCode($postalCode);
            $event->setRdvStreet($rdvStreet);
            $event->setRdvCity($rdvCity);
            $event->setRdvPostalCode($rdvPostalCode);
            $event->setDescription($description);
            $event->setHours($totalHours);
            $event->addEvent();
    
            $id = $event->getId();
    
            header("Location:/app/views/invitation.php?idEvent=$id");
        }else{
            $error = "L'une des dates entrées est invalide";
        } 
    } else {
        $error = "Impossible de créer l'évènement";
    }
}
