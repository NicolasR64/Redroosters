<?php
    require_once("../models/staff.php");

    /* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/

$test = new Staff();

$test->setId(2);
$test->setSeasonArrived('2022-03-01');
$test->setIdFonction(1);

$test->addStaff();

?>