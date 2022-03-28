<?php
    
    require_once("../models/Event.php");
    require_once("../controllers/eventManagementCont.php");

    /* Liste des tests pour Event */

    $test = new Event();

    /*Tests getters et setters */

    $test->setId(3);
    $test->setRdvDate(20220328);
    $test->setName("Rdv gare du nord");
    $test->setDateBegin(20220202);
    $test->setDateEnd(20220503);
    $test->setRdvHours("8h30");
    $test->setStreet("Rue de la gare");
    $test->setRdvCity("Charleroi");
    $test->setCity("Chatelet");
    $test->setPostalCode("6200");
    $test->setRdvStreet("Farciennes");
    $test->setHours("10h40");
    $test->setRdvPostalCode(6240);
    $test->setDescription("Ceci est un test des getters et setters");

    print_r($test->getEventById(2));

    echo "<br>";
    $value = calculateInterval("2022-02-02","2022-05-07");
    print_r($value);

    echo "<br>";
    $heure = calculateHour("10:25","22:35");
    echo $heure;
?>
