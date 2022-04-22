<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once("../models/User.php");
    require_once("../../vendor/autoload.php");

    $step=1;

    // Elimine les dangers éventuelles pouvant provenir des données entrée par l'utilisateur
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // récupère l'url de la page courante
    $url="";
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
    else  $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];


        if(isset($_POST["inputEmail"]) && !empty($_POST["inputEmail"])){
            $user = new User();
            $email = cleanData($_POST["inputEmail"]);
            if(filter_var($email,FILTER_VALIDATE_EMAIL) && $user->checkMail($email)){
                $token = $user->getTokenByMail($email);
                $url = $url."?token=".$token;
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'mailymaylou@gmail.com';                     //SMTP username
                    $mail->Password   = 'cbpvourcozgxqycu';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('mailymaylou@gmail.com', 'RedRoosters');
                    $mail->addAddress($email);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Mot de passe oublie';
                    $mail->Body    = "<h1>Changement de mot de passe</h1><br><p>Bonjour! Vous avez fait une demande de changement de mot de passe de votre compte sur le site de l'équipe RedRoosters.
                    Pour compléter le processus, cliquez sur ce <a href=$url>lien</a>.</p>";
                    $mail->AltBody = "Bonjour! Vous avez fait une demande de changement de mot de passe de votre compte sur le site de l'équipe RedRoosters.
                    Pour compléter le processus, suivez le lien suivant: $url";

                    $mail->send();
                    $step=2;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
    
    if(isset($_GET["token"]) && !empty($_GET["token"])){
        $step=3;
        $token=cleanData($_GET["token"]);
        if(isset($_POST["inputPwd"]) && !empty($_POST["inputPwd"])){
            if(isset($_POST["inputCPwd"]) && !empty($_POST["inputCPwd"])){
                $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/";
                $pwd  = cleanData($_POST["inputPwd"]);
                $cPwd = cleanData($_POST["inputCPwd"]);
                if(preg_match($pattern,$pwd) && strcmp($pwd,$cPwd) == 0){
                    $user = new User();
                    if($user->checkToken($token)){
                        $pwd = password_hash($pwd,PASSWORD_DEFAULT);
                        do{
                            $newToken = openssl_random_pseudo_bytes(16);
                            $newToken = bin2hex($newToken); 
                        } while ($user->checkToken($newToken));
                        $user->updatePwd($pwd,$token,$newToken);
                        $step=4;
                    }
                }
            }
        }
    }


?>