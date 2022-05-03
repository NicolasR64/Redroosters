<?php

session_start();

require_once("../controllers/isConnect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <?php require_once("../views/includes/head.php"); ?>

  <title>Patinoires | Redroosters</title>

</head>

<body class="text-center text-light">

  <?php

  //$active = "ice_rink"; //TODO ?(memberlist)
  require_once("../views/includes/header.php");

  ?>

  <h1>Patinoires</h1>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>