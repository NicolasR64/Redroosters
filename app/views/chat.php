<?php

session_start();

require_once("../controllers/isConnect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <?php require_once("../views/includes/head.php"); ?>

  <title>Chat | Redroosters</title>

  <script src="/app/js/chat.js" async></script>

</head>

<body class="text-center">

  <?php

  $active = "chat";
  require_once("../views/includes/header.php");

  ?>

  <div class="container align-items-center align-middle d-grid mx-auto w-100 vh-100">

    <h1>Je suis la page du chat</h1>

    <div class="col-12 my-1">
      <div class="p-2" id="discussion">
      </div>
    </div>
    <div class="col-12 saisie">
      <div class="input-group">
        <input type="text" class="form-control" id="texte" placeholder="Entrez votre texte">
        <div class="input-group-append">
          <span class="input-group-text" id="valid"><i class="fa-solid fa-check"></i></span>
        </div>
      </div>
    </div>

  </div>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>