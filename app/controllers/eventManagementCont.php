<?php

    require_once("../models/Event.php");


    function compareDate($dateRdv, $dateBegin){
        if($dateRdv > $dateBegin){
            return false;
        }
        return true;
    }

    function calculateInterval($beginDate, $endDate){
        
        $begin = new DateTime($beginDate);
        $end = new DateTime($endDate);

        $interval = $begin->diff($end);
        return $interval;
    }

    function calculateHour($t1 , $t2){
         
        $tab=explode(":", $t1); 
        $tab2=explode(":", $t2); 
        
        $h=$tab[0]; 
        $h2=$tab2[0]; 
       
        if ($h>=$h2) { 
        $h2=$h2+24; 
        } 
        
        $ht=$h2-$h; 
  
        return $ht;  
     }
 
     //The function calculates the total number of hours of the event

     function calculateTotalTimeEvent($duration1, $duration2){

        $day = $duration1->d;

        //Verification if we have 24h with the time

        if($duration2==24 && $day>0){
            $duration2=0;
            $hours = $day * 24 - $duration2;
        }
        //Verification if the end hour is less or equals to 12 hours

        elseif($duration2 > 13){
            $duration2 = 24 - $duration2; 
            $hours = $day * 24 - $duration2;
        }else{
            $hours = $day * 24 + $duration2;
        }
        
        return $hours;
    }

    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // Check if form is completed //

      if(isset($_POST['form-event'])){
        if(isset($_POST["inputName"])){
            if(isset($_POST["inputBeginDate"])){
                if(isset($_POST["inputEndDate"])){
                    if(isset($_POST["inputRdvHours"])){
                        if(isset($_POST["inputEndHour"])){
                            if(isset($_POST["inputStreet"])){
                                if(isset($_POST["inputCity"])){
                                    if(isset($_POST["inputPostalCode"])){
                                        if(isset($_POST["inputRdvStreet"])){
                                            if(isset($_POST["inputRdvCity"])){
                                                if(isset($_POST["inputRdvCity"])){
                                                    if(isset($_POST["inputRdvPostalCode"])){
                                                        if(isset($_POST["inputRdvDate"])){

                                                            //Create Event object//

                                                            $event = new Event();

                                                             //Clean data//

                                                            $name = cleanData($_POST["inputName"]);
                                                            $beginDate = cleanData($_POST["inputBeginDate"]);
                                                            $endDate = cleanData($_POST["inputEndDate"]);
                                                            $rdvHours = cleanData($_POST["inputRdvHours"]);
                                                            $endHours = cleanData($_POST["inputEndHour"]);
                                                            $street = cleanData($_POST["inputStreet"]);
                                                            $city = cleanData($_POST["inputCity"]);
                                                            $postalCode = cleanData($_POST["inputPostalCode"]);
                                                            $rdvStreet = cleanData($_POST["inputRdvStreet"]);
                                                            $rdvCity = cleanData($_POST["inputRdvCity"]);
                                                            $rdvPostalCode = cleanData($_POST["inputRdvPostalCode"]);
                                                            $description = cleanData($_POST["inputDescription"]);
                                                            $rdvDate = cleanData($_POST["inputRdvDate"]);
                                                     
                                                            //Calculation of total hours//

                                                            $duration = calculateInterval($beginDate, $endDate);
                                                            $durationHours = calculateHour($rdvHours, $endHours);
                                                            $totalHours = calculateTotalTimeEvent($duration,$durationHours);

                                                            //Add data to the object//

                                                            $event->setName($name);
                                                            $event->setRdvDate($rdvDate);
                                                            $event->setDateBegin($beginDate);
                                                            $event->setDateEnd($endDate);
                                                            $event->setRdvHours($rdvHours);
                                                            $event->setStreet($street);
                                                            $event->setCity($city);
                                                            $event->setPostalCode($postalCode);
                                                            $event->setRdvStreet($rdvStreet);
                                                            $event->setRdvCity($rdvCity);
                                                            $event->setRdvPostalCode($rdvPostalCode);
                                                            $event->setDescription($description);
                                                            $event->setHours($totalHours);
                                                            $event->addEvent();

                                                            $error = "Evènement créé";
                                                            $_SESSION["error"]=$error;
                                                            header("Location:../views/event_management.php");

                                                        }else{
                                                            $error = "Le champs 'Date de rendez-vous' n'est pas rempli";  
                                                            $_SESSION["error"]=$error;
                                                            header("Location:../views/event_management.php");
                                                        }

                                                    }else{
                                                        $error = "Le champs 'Code postal du rendez-vous' n'est pas rempli";
                                                        $_SESSION["error"]=$error;
                                                        header("Location:../views/event_management.php");
                                                    }

                                                }else{
                                                    $error = "Le champs 'Ville de rendez-vous' n'est pas rempli";
                                                    $_SESSION["error"]=$error;
                                                    header("Location:../views/event_management.php");
                                                }

                                            }else{
                                                $error = "Le champs 'Rue de rendez-vous' n'est pas rempli";
                                                $_SESSION["error"]=$error;
                                                header("Location:../views/event_management.php");
                                            }

                                        }else{
                                            $error = "Le champs 'Rue de rendez-vous' n'est pas rempli";
                                            $_SESSION["error"]=$error;
                                            header("Location:../views/event_management.php");
                                        }

                                    }else{
                                        $error = "Le champs 'Code Postal' n'est pas rempli";
                                        $_SESSION["error"]=$error;
                                        header("Location:../views/event_management.php");
                                    }

                                }else{
                                    $error = "Le champs 'Ville de l'évènement' n'est pas rempli";
                                    $_SESSION["error"]=$error;
                                    header("Location:../views/event_management.php");
                                }

                            }else{
                                $error = "Le champs 'Rue de l'évènement' n'est pas rempli";
                                $_SESSION["error"]=$error;
                                header("Location:../views/event_management.php");
                            }

                        }else{
                            $error = "Le champs 'Heure de fin' n'est pas rempli";
                            $_SESSION["error"]=$error;
                            header("Location:../views/event_management.php");
                        }

                    }else{
                        $error = "Le champs 'Heure du rendez-vous' n'est pas rempli";
                        $_SESSION["error"]=$error;
                        header("Location:../views/event_management.php");
                    }

                }else{
                    $error = "Le champs 'Date de fin' n'est pas rempli";
                    $_SESSION["error"]=$error;
                    header("Location:../views/event_management.php");
                }

            }else{
                $error ="Le champs 'Date de début' n'est pas rempli";
                $_SESSION["error"]=$error;
                header("Location:../views/event_management.php");
            }
        }else{
            $error = "Le champs 'Nom' n'est pas rempli";
            $_SESSION["error"]=$error;
            header("Location:../views/event_management.php");
        }
    }else{
        $error = "Le champs 'complet' n'est pas rempli";
}

?>