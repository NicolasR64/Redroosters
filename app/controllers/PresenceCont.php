<?php
session_start();
/* S'occupe de mettre présent ou absent un joueur pour un évènement donné */
require_once("../models/User.php");
$sessionUser = unserialize($_SESSION['user']);
require_once("../models/Participe.php");
$participate = new Participe();


if($_POST['inputIdEvent'] != null) {
    $data = $participate->getEntryByUserIdAndEventId($sessionUser->getId(), $_POST['inputIdEvent']);
    $isDispo = 0;
    $isAnswer = 1;
    
    if($data[0]['isDispo'] == 0){
        $isDispo = 1;
    }
    
    $participate->UpdateEntryByUserIdAndEventId($sessionUser->getId(), $_POST['inputIdEvent'], $isDispo, $isAnswer);
    
    header('location: /event/'.$_POST['inputIdEvent'].'');
} else {
    $data = $participate->getEntryByUserIdAndEventId($_GET['idPlayer'], $_GET['idEvent']);
    $isSelected = 1 ;
    
    if($data[0]['isSelected'] == 1){
        $isSelected = 0;
    }
    
    $participate->UpdateEntryByUserIdAndEventIdOther($_GET['idPlayer'], $_GET['idEvent'], $isSelected);
    
    header('location: /event/'.$_GET['idEvent'].'');
}
