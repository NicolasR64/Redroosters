<?php
    require_once("../models/User.php");

    /* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/


   $test = new User();

   /* $user = $test->getUserById(2);

    echo $user->getLastName(); */

   /*
    $test->setPassword("testmdp");
    $test->setMail("test@mail.la");
    $test->setEmergencyMail("e@a.sport");
    $test->setParentMail("p@m.parent");
    $test->setIsPlayer(1);
    $test->setIsStaff(0);
    $test->setFirstName("Sky");
    $test->setLastName("Storm");
    $test->setNickname("Bobo");
    $test->setPhone("0245896314");
    $test->setDateBirth("2001-05-02");
    $test->setToken("isdufvygzerg");

    $test->addUser(); */

    /*$pwd = "wxcVBN123";
    $email = "Soul@hotmail.fr";
    
    $user = $test->userConnexion($email,$pwd);

    echo $user->getLastName();

    $user = $test->userConnexion("non","existence");

    if($user == null)echo "<br>vide";*/

    $existe = $test->checkMail("Soul@hotmai.fr");

    if($existe) echo "existe";
    else echo "inconnu";


?>