<?php
    require_once("../models/Team.php");

    /* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/


    $test = new Team();

    $team = $test->getTeam(1);

    echo $team->getCodeRegister();


?>