<?php
    require_once("../models/player.php");

    /* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/


    $test = new Player();

    $test->setId(2);
    $test->setSeasonArrived("2022-03-01");
    $test->setSize(163);
    $test->setJerseyNumber(2);
    $test->setLicensenumber(4598);
    $test->setIsCarpooling(1);
    $test->setWeight(46.3);
    $test->setIsSick(0);
    $test->setIsBan(0);
    $test->setHandedness(1);
    $test->setIdPosition(1);

    $test->addPlayer();


?>