<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once("../../vendor/autoload.php");
    require_once("../models/Participe.php");
    require_once("../models/User.php");

    // récupère l'url de la page courante
    $url="";
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
    else  $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];

    $done = 0;
    $joueurs;

    if(isset($_GET["idEvent"]) && !empty($_GET["idEvent"])){
            $idEvent = $_GET["idEvent"];
            $url.="/app/views/event_list.php/$idEvent"; 
            //récupérer la liste des joueurs à qui envoyer le mail
            //TO DO
            $participate = new Participe();
            $liste = $participate->getMembersWithoutResponseToInvitation($idEvent);

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
                foreach($liste as $elems => $elem){
                    $user = new User();
                    $user = $user->getUserById($elem['idUser']);
                    $mail->addAddress($user->getMail());     //Add a recipient
                };
               

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Rappel évènement';
                $mail->Body    = "<h1>Rappel evenement</h1><br><p>Bonjour! Nous vous rappellons votre invitation à participer à un événement!
                N'oubliez pas d'aller signaler votre participation ou non sur ce <a href=$url>lien</a>.</p>";
                $mail->AltBody = "Bonjour! Vous avez été invité à participer à un événement!
                Pour signalez votre participation (ou non), suivez le lien suivant: $url";

                $mail->send();
                $done=1;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
    header('location:/event/'.$_GET['idEvent'].'');

    
?>