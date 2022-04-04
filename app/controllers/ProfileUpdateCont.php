<?php
/* Check si le formulaire d'update du profile est correctement remplit */

// Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
function cleanData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Potentiel erreur
$error=false;

//FAIRE TEST
//vérification nom
if( isset($_POST["inputFirstName"]) && !empty($_POST["inputFirstName"]) )
{
    if(!strlen($_POST["inputFirstName"]) > 2 && !strlen($_POST["inputFirstName"]) < 51){
        $error=true;
    }
}

//FAIRE TEST
//vérification prénom
if( isset($_POST["inputLastName"]) && !empty($_POST["inputLastName"]) )
{
    if(!strlen($_POST["inputLastName"]) > 2 && !strlen($_POST["inputLastName"]) < 51){
        $error=true;
    }
}

//FAIRE TEST
//vérification surnom
if( isset($_POST["inputNickName"]) && !empty($_POST["inputNickName"]) )
{
    if(!strlen($_POST["inputNickName"]) > 2 && !strlen($_POST["inputNickName"]) < 51){
        $error=true;
    }
}

//FAIRE TEST
//vérification date
if( isset($_POST["inputDateBirth"]) && !empty($_POST["inputDateBirth"]) )
{
    //TO DO
}

//FAIRE TEST
//vérification téléphone
if( isset($_POST["inputPhone"]) && !empty($_POST["inputPhone"]) )
{
    if(!strlen($_POST["inputPhone"]) < 16){
        $error=true;
    }

    //TO DO
}

//FAIRE TEST
//vérification email
if( isset($_POST["inputMail"]) && !empty($_POST["inputMail"]) )
{
    if(!strlen($_POST["inputMail"]) < 256){
        $error=true;
    }

    //TO DO
}

//FAIRE TEST
//vérification EmergencyEmail
if( isset($_POST["inputEmergencyMail"]) && !empty($_POST["inputEmergencyMail"]) )
{
    if(!strlen($_POST["inputEmergencyMail"]) < 256){
        $error=true;
    }

    //TO DO
}

//FAIRE TEST
//vérification ParentEmail
if( isset($_POST["inputParentMail"]) && !empty($_POST["inputParentMail"]) )
{
    if(!strlen($_POST["inputParentMail"]) < 256){
        $error=true;
    }

    //TO DO
}

//FAIRE TEST
//Vérification si c'est un joueur
$contProfile = new ProfileCont();
$user = $contProfile->getUser();
if($user->getIsPlayer() == 1){

    //FAIRE TEST
    //vérification seasonArrived
    if( isset($_POST["inputSeasonArrivedPlayer"]) && !empty($_POST["inputSeasonArrivedPlayer"]) )
    {
        if(!strlen($_POST["inputSeasonArrivedPlayer"]) == 4){
            $error=true;
        }
        //TO DO
    }

    //FAIRE TEST
    //vérification position
    if( isset($_POST["inputPosition"]) && !empty($_POST["inputPosition"]) )
    {
        //TO DO
    }

    //FAIRE TEST
    //vérification jersey number
    if( isset($_POST["inputJerseyNumber"]) && !empty($_POST["inputJerseyNumber"]) )
    {
        //TO DO
    }

    //FAIRE TEST
    //vérification license number
    if( isset($_POST["inputLicenseNumber"]) && !empty($_POST["inputLicenseNumber"]) )
    {
        if(!strlen($_POST["inputLicenseNumber"]) < 11){
            $error=true;
        }
        //TO DO
    }

    //FAIRE TEST
    //vérification handedness
    if( isset($_POST["inputHandedness"]) && !empty($_POST["inputHandedness"]) )
    {
        if($_POST["inputHandedness"] == 1 || $_POST["inputHandedness"] == 0){
            $error=true;
        }
        //TO DO
    }

    //FAIRE TEST
    //vérification size
    if( isset($_POST["inputSize"]) && !empty($_POST["inputSize"]) )
    {
        if($_POST["inputSize"] >= 100 && $_POST["inputSize"] <= 250){
            $error=true;
        }
        //TO DO
    }

    //FAIRE TEST
    //vérification weight
    if( isset($_POST["inputWeight"]) && !empty($_POST["inputWeight"]) )
    {
        if($_POST["inputWeight"] >= 30 && $_POST["inputWeight"] <= 150){
            $error=true;
        }
        //TO DO
    }

}
else
{
    //vérification seasonArrived
    if( isset($_POST["inputSeasonArrivedStaff"]) && !empty($_POST["inputSeasonArrivedStaff"]) )
    {
        if(!strlen($_POST["inputSeasonArrivedStaff"]) == 4){
            $error=true;
        }
        //TO DO
    }

    //FAIRE TEST
    //vérification function
    if( isset($_POST["inputFunction"]) && !empty($_POST["inputFunction"]) )
    {
        //TO DO
    }
}
