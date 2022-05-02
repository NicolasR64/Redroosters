<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once("../../vendor/autoload.php");
    require_once("../models/User.php");
    require_once("../models/staff.php");
    require_once("../models/player.php");
    require_once("../models/Participe.php");

    // récupère l'url de la page courante
    $url="";
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
    else  $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];

    $done = 0;
    $joueurs;

    if(isset($_POST["invit"]) && !empty($_POST["invit"])){
        if(isset($_POST["invite"]) && !empty($_POST["invite"])){
            $idEvent = $_GET["idEvent"];
            $url.="/app/views/event_list.php"; 
            $liste = $_POST["invite"];
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
                foreach($liste as $elem){
                    $user = new User();
                    $user = $user->getUserById($elem);
                    $mail->addAddress($user->getMail());     //Add a recipient
                    //ajout d'une entrée dans la table participe
                    $entry = new Participe();
                    $entry->addEntry($idEvent,$elem);
                };
               

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Nouvel evenement';
                $mail->Body    = "<h1>Changement de mot de passe</h1><br><p>Bonjour! Vous avez été invité à participer à un événement!
                N'oubliez pas d'aller signaler votre participation ou non sur ce <a href=$url>lien</a>.</p>";
                $mail->AltBody = "Bonjour! Vous avez été invité à participer à un événement!
                Pour signalez votre participation (ou non), suivez le lien suivant: $url";

                $mail->send();
                $done=1;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
        }
    }

    if($done == 0){
        $user = new User();
        $player = new Player();
        $staff = new Staff();
        $joueurs = $user->getAllUsers();
        foreach($joueurs as $elem){
            if($elem->getIsPlayer() == 1){
                $player = $player->getPlayerById($elem->getId());
                $pos = $player->getPosition($player->getIdPosition());
                $elem->setPlayer($pos->getName());
            } else $elem->setPlayer("N/A");
            if($elem->getIsStaff() == 1){
                $staff = $staff->getStaffById($elem->getId());
                $pos = $staff->getFunction($staff->getIdFunction());
                $elem->setStaff($pos->getName());
            } else $elem->setStaff("N/A");
        }
    }





?>