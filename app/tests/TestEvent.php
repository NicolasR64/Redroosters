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

   
   

    $h1 = compareDate("2022-05-03", "2022-02-03"); 
    $data = $test->getEventById("12");
    $data = $test->getEventAsc();
    $data = $test->getEventDesc();

    $value = calculateInterval("2022-02-02","2023-05-04");
    print_r($value);
    $heure = calculateHour("10:25","00:25");

    echo calculateTotalTimeEvent($value, $heure);

?>
