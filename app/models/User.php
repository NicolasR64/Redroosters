<?php
require_once('Model.php');

class User extends Model{
    /* SELECT */
    
    function getUserByID($id){
        $sql = "SELECT * FROM  `user` WHERE id=$id";
        return $sql;
    }

}