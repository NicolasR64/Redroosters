<?php
//connection
require_once('Model.php');

class Message extends model{
    private $id;
    private $text;
    private $date;
    private $idUser;
    private $idEvent;   //pas besoin pour le chat global

    public function getMessage($lastId){
        // On initialise le filtre
        $filtre = ($lastId > 0) ? "WHERE `users`.`id` = `message`.`idUser` and `message`.`id`>$lastId" : '';

        // On écrit la requêt
        $sql = "SELECT `message`.`id`,`message`.`text`,`message`.`date`,`message`.`hours`,`users`.`firstName` FROM `message`,`users` WHERE `users`.`id` = `message`.`idUser` and `message`.`id`>$lastId order by `message`.`id` desc limit 5";

        // On récupère les données
        $messages = $this->executeRequest($sql) ;

        // On encode en JSON
        $messagesJson = json_encode($messages);

        // On envoie
        return $messagesJson;
        }

    public function addMessage($message,$user){
        $date = date('y-m-d');
        $time = date('H:i:s');
        $sql = "INSERT INTO `message`(`text`, `idUser`, `date`, `hours`) VALUES ('$message', '$user', '$date', '$time')";
        return $this->executeRequest($sql,false);
    }
}

?>