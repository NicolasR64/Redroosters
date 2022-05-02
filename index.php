<?php

session_start();

require_once("app/controllers/isDisconnect.php");

?>

<!DOCTYPE html>

<html lang="fr">

<head>

  <?php require_once("app/views/includes/head.php"); ?>

  <title>Redroosters</title>

</head>

<body class="text-center text-light">

  <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
    <form class="form-signin" data-bitwarden-watching="1">
      <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
      <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
      <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/login">Connexion</a>
      <a class="btn btn-lg btn-secondary btn-block mt-1 mb-2 w-100" href="/register">Inscription</a>
      <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
    </form>
  </div>

</body>

</html>