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

  require_once("../views/includes/header.php");

  ?>

  <h1>Liste des patinoires</h1>

  <div class="infos-brick-grid">

    <a href="#" class="infos-brick-cell">
      <h2>NAME</h2>
      <span class="address">
        Rue Trieux Kaisin
        <br>6061 - Montignies-sur-Sambre
      </span>
    </a>
    <div class="buttons-brick-cell">
      <a class="btn btn-primary mt-1 mb-1" href="http://redroosters.be/memberlist?changeStaffState=1"><i class="fa-solid fa-circle-minus"></i>&nbsp;Destituer membre du personnel</a>
      <a class="btn btn-danger mt-1 mb-1" href="http://redroosters.be/memberlist?delete=1"><i class="fa-solid fa-trash"></i>&nbsp;Supprimer</a>
    </div>

  </div>

  <a href="/event/edit/7" rel="nofollow" class="btn-fixed" title="Editer l'évènement"><i class="fa-solid fa-pen-to-square"></i></a>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>