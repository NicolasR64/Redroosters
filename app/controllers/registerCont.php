<?php

    require_once("../models/User.php");
    require_once("../models/Team.php");

    $step = 1;


    // Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    if(isset($_POST["inputCode"]) && !empty($_POST["inputCode"])){
        $inputCode=$_POST["inputCode"];

        $team = new Team();

        $team = $team->getTeam(1);
        $code = $team->getCodeRegister();

        if(strcmp($inputCode,$code) == 0){
            $step = 2;
        }
    }

    if(isset($_POST["confStep2"]) && !empty($_POST["confStep2"])){
        $step = 2;
        if(isset($_POST["inputFirstName"]) && !empty($_POST["inputFirstName"])){
            if(isset($_POST["inputLastName"]) && !empty($_POST["inputLastName"])){
                if(isset($_POST["inputDateBirth"]) && !empty($_POST["inputDateBirth"])){
                    if(isset($_POST["inputPhone"]) && !empty($_POST["inputPhone"])){
                        if(isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"])){
                            $mail = cleanData($_POST["inputEmail"]);
                            if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
                                if(isset($_POST["inputPassword"]) && !empty($_POST["inputPassword"])){
                                    $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
                                    $pwd  = cleanData($_POST["inputPassword"]);
                                    if(preg_match($pattern,$pwd)){
                                        if(isset($_POST["inputPasswordConfirm"]) && !empty($_POST["inputPasswordConfirm"])){
                                            $confPwd = cleanData($_POST["inputPasswordConfirm"]);
                                            if(strcmp($pwd,$confPwd) == 0){
                                                $step = 3;
                                                $user = new User();
                                                $phone = cleanData($_POST["inputPhone"]);
                                                $firstN = cleanData($_POST["inputFirstName"]);
                                                $lastN = cleanData($_POST["inputLastName"]);
                                                $dateB = cleanData($_POST["inputDateBirth"]);
                                                $user->setMail($mail);
                                                $pwd = password_hash($pwd,PASSWORD_DEFAULT);
                                                $user->setPassword($pwd);
                                                $user->setPhone($phone);
                                                $user->setFirstName($firstN);
                                                $user->setLastName($lastN);
                                                $user->setFirstName($dateB);
                                                $user->setIsPlayer(0); $user->setIsStaff(0); $user->setEmergencyMail("Non Renseignée"); $user->setParentMail("Non renseignée");
                                                $token = openssl_random_pseudo_bytes(16);
                                                $token = bin2hex($token);
                                                $user->setToken($token);
                                                $user->addUser();
                                            }
                                        }
                                    }
                                }
                            }
                            
                        }
                    }
                }
            }
        }
    }



?>