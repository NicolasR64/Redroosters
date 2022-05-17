<?php

require_once("../models/user.php");

if (unserialize($_SESSION["user"])->getIsAdmin() == 0) {
    header('Location: /home');
}