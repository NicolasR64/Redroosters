<?php

include_once('../models/model.php');

/* Actuellement sans utilisation de phpUnit en attendant que l'on ao acqui cette connaissance. 
 * NE PAS OUBLIER d'implémenter phpUnit quand possible.
*/

class TestModels extends Model
{
    private $conn = null;

    final public function TestGetBdd()
    {
        try{
            //Appel de la fonction de connection à la base de données
            $conn->getBdd();
            printf("Success connection BDD");
        }catch(PDOException $e){
            printf("!!Fail connection BDD!!");
        }
    }
}