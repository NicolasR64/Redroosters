<?php

session_set_cookie_params(6000);
session_start();

require_once("../controllers/isDisconnect.php");

?>

<!DOCTYPE html>
<?php
    require_once("../controllers/loginCont.php");
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="/app/css/style.css" rel="stylesheet">
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="/app/js/checkInputLogin.js" async></script>

    <title>Connexion</title>
</head>
<body class="text-center text-light">

    <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
      <form class="form-signin" data-bitwarden-watching="1" method="post" name="log" id="log">
        <img src="/assets/img/logos/logo_icon_text.png" height="100px" loading="lazy"/>
        <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
        <label for="inputEmail" class="sr-only">E-Mail</label>
        <input type="email" id="inputEmail" name = "inputEmail"class="form-control" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name ="inputPassword" class="form-control" required="">
        <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" id="logButton"name="login" value="log">Se connecter</button>
        <a class="btn btn-lg btn-secondary btn-block mt-1 mb-2 w-100" href="/register">S'inscrire</a>
        <a class="btn btn-lg btn-link btn-block mt-1 mb-2 w-100" href="/forgot-password">Mot de passe oublié</a>
        <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
      </form>
    </div>

</body>
</html>