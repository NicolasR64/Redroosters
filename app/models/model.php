<?php
abstract class Model{

    //Connection à la base de données  
    /* REMETTRE PRIVATE QUAND TESTS FINI!! */  
    private static function getBdd() {
        //informations de connection
        $servername = 'localhost';
        $bdname = 'redroosters';
        $username = 'root';
        $password = '';
        //test connection
        try{
            $dbco = new PDO("mysql:host=$servername;dbname=$bdname;charset=utf8", $username, $password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbco;
        }catch(PDOException $e){
            echo 'ERROR : '.$e->getMessage();
        }
    }

    //exécute la requête qui lui est passée
    protected function executeRequest($sql,$result = true) {
        //connection BDD
        $bdd = $this->getBdd();
        $sth = $bdd->prepare($sql);//préparation requête
        $sth-> execute();//exécution requête
        $resultat=null;
        if($result) $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);//réception données

        //ferme connection BDD
        $bdd = null;
        return $resultat;
    }
    
}