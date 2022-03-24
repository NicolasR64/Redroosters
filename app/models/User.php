<?php
require_once('Model.php');

class User extends Model{
    /* SELECT */
    
    /* FAIRE TEST */
    function getUserByID($id){
        $sql = "SELECT * FROM  `user` WHERE id=$id";
        return $sql;
    }
}