<?php
    require_once("../models/User.php");

    /* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/


    $test = new User();

    $user = $test->getUserById(2);

    echo $user->getLastName();


?>