<?php

session_start();

require_once("../controllers/isConnect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <?php require_once("../views/includes/head.php"); ?>

  <title>Liste des membres | Redroosters</title>

</head>

<body class="text-center text-light">

  <?php

  $active = "memberlist";
  require_once("../views/includes/header.php");

  ?>

  <h1>Liste des membres</h1>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>