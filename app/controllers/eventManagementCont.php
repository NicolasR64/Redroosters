<?php

    require_once("../models/Event.php");

    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // Check if form is completed //

      if(isset($_POST["form-event"])){
        if(isset($_POST["inuptName"])){
            if(isset($_POST["inputBeginDate"])){
                if(isset($_POST["inputEndDate"])){
                    if(isset($_POST["inputRdvHours"])){
                        if(isset($_POST["inputEndHours"])){
                            if(isset($_POST["inputStreet"])){
                                if(isset($_POST["inputCity"])){
                                    if(isset($_POST["inputPostalCode"])){
                                        if(isset($_POST["inputRdvStreet"])){
                                            if(isset($_POST["inputRdvCity"])){
                                                if(isset($_POST["inputRdvCity"])){
                                                    if(isset($_POST["inputRdvPostalCode"])){

                                                    //Create Event object//
                                                     $event = new Event();

                                                     //Clean data//
                                                     $name = cleanData($_POST["inputName"]);
                                                     $beginDate = cleanData($_POST["inputBeginDate"]);
                                                     $endDate = cleanData($_POST["inputEndDate"]);
                                                     $rdvHours = cleanData($_POST["inputRdvHours"]);
                                                     $endHours = cleanData($_POST["inputEndHours"]);
                                                     $street = cleanData($_POST["inputCity"]);
                                                     $postalCode = cleanData($_POST["inputPostalCode"]);
                                                     $rdvStreet = cleanData($_POST["inputRdvStreet"]);
                                                     $rdvCity = cleanData($_POST["inputRdvCity"]);
                                                     $rdvPostalCode = cleanData($_POST["inputRdvPostalCode"]);


                                                    }else{
                                                        $error = "Le champs 'Code postal du rendez-vous' n'est pas rempli";
                                                    }

                                                }else{
                                                    $error = "Le champs 'Ville de rendez-vous' n'est pas rempli";
                                                }

                                            }else{
                                                $error = "Le champs 'Rue de rendez-vous' n'est pas rempli";
                                            }

                                        }else{
                                            $error = "Le champs 'Rue de rendez-vous' n'est pas rempli";
                                        }

                                    }else{
                                        $error = "Le champs 'Code Postal' n'est pas rempli";
                                    }

                                }else{
                                    $error = "Le champs 'Ville de l'évènement' n'est pas rempli";
                                }

                            }else{
                                $error = "Le champs 'Rue de l'évènement' n'est pas rempli";
                            }

                        }else{
                            $error = "Le champs 'Heure de fin' n'est pas rempli";
                        }

                    }else{
                        $error = "Le champs 'Heure du rendez-vous' n'est pas rempli";
                    }

                }else{
                    $error = "Le champs 'Date de fin' n'est pas rempli";
                }

            }else{
                $error ="Le champs 'Date de début' n'est pas rempli";
            }
        }else{
            $error = "Le champs 'Nom' n'est pas rempli";
        }
    }
?>