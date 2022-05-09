<?php

session_start();

require_once("../controllers/isConnect.php");

require_once("../controllers/memberListCont.php");

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
  <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">

    <div class="event-brick-grid">

      <?php
      if (!empty($joueurs)) {
        foreach ($joueurs as $row) {
      ?>

          <a href="/profile/<?php echo $row->getId(); ?>" class="event-brick-cell">
            <h2><?php echo $row->getFirstName() ?></h2>
            <span class="date"><?php echo $row->getPlayer(); ?></span>
            <span class="time-left">
              <?php echo $row->getStaff(); ?>
            </span>
          </a>

      <?php
        }
      }
      ?>

    </div>

  </div>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>