<?php

    // récupère l'url de la page courante
    $url="";
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')  $url = "https://";   
    else  $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];




    
?>