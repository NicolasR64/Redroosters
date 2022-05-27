<?php
// Ce fichier reçoit les données en json et enregistre le message
session_start();
require_once("../models/Message.php");
require_once("../models/User.php");

// On vérifie la méthode
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // On vérifie si l'utilisateur est connecté
    if(!empty($_SESSION['user'])){
        // L'utilisateur est connecté
        // On récupère le message
        $donneesJson = file_get_contents('php://input');
        
        // On convertit les données en objet PHP
        $donnees = json_decode($donneesJson);

        // On vérifie si on a un message
        if(isset($donnees->message) && !empty($donnees->message)){
            // On a un message
            // On le stocke
            // On se connecte
            $id = null;
           
            $obj= new Message();
            $id = $obj->addMessage(strip_tags($donnees->message),unserialize($_SESSION['user'])->getId());




            // On exécute en vérifiant si ça fonctionne
            if($id != null){
                http_response_code(201);
                echo json_encode(['message' => 'Enregistrement effectué']);
            }else{
                http_response_code(400);
                echo json_encode(['message' => 'Une erreur est survenue']);
            }
        }else{
            // Pas de message
            http_response_code(400);
            echo json_encode(['message' => 'Le message est vide']);
        }
    }else{
        // Non connecté
        http_response_code(400);
        echo json_encode(['message' => 'Vous devez vous connecter']);
    }
}else{
    // Mauvaise méthode
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}