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
                    $dateB = cleanData($_POST["inputDateBirth"]);
                    $data = explode("-",$dateB);
                    if(count($data) == 3){
                        if(checkdate($data[1],$data[2],$data[0])){
                            if(isset($_POST["inputPhone"]) && !empty($_POST["inputPhone"])){
                                $pattern="/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im";
                                $phone = cleanData($_POST["inputPhone"]);
                                if(preg_match($pattern,$phone)){
                                    if(isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"])){
                                        $user = new User();
                                        $mail = cleanData($_POST["inputEmail"]);
                                        if(filter_var($mail,FILTER_VALIDATE_EMAIL) && !($user->checkMail($mail))){
                                            if(isset($_POST["inputPassword"]) && !empty($_POST["inputPassword"])){
                                                $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
                                                $pwd  = cleanData($_POST["inputPassword"]);
                                                if(preg_match($pattern,$pwd)){
                                                    if(isset($_POST["inputPasswordConfirm"]) && !empty($_POST["inputPasswordConfirm"])){
                                                        $confPwd = cleanData($_POST["inputPasswordConfirm"]);
                                                        if(strcmp($pwd,$confPwd) == 0){
                                                            $step = 3;
                                                            

                                                            $firstN = cleanData($_POST["inputFirstName"]);
                                                            $lastN = cleanData($_POST["inputLastName"]);
                                                            $user->setMail($mail);
                                                            $pwd = password_hash($pwd,PASSWORD_DEFAULT);
                                                            $user->setPassword($pwd);
                                                            $user->setPhone($phone);
                                                            $user->setFirstName($firstN);
                                                            $user->setLastName($lastN);
                                                            $user->setDateBirth($dateB);
                                                            $user->setIsPlayer(0); $user->setIsStaff(0); $user->setEmergencyMail("Non Renseignée"); $user->setParentMail("Non renseignée");
                                                            do{
                                                            $token = openssl_random_pseudo_bytes(16);
                                                            $token = bin2hex($token); 
                                                            } while ($user->checkToken($token));
                                                            
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
            }
        }
    }



?>