<?php
// On vérifie la méthode utilisée
require_once('../models/Message.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On est en GET
    // On vérifie si on a reçu un id
    if(isset($_GET['lastId'])){
        // On récupère l'id et on le nettoie
        $lastId = (int)strip_tags($_GET['lastId']);


        // On se connecte à la base
        $obj = new Message();
        echo $obj->getMessage($lastId);


    }
}else{
    // Mauvaise méthode
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}