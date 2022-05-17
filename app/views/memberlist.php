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

    <div class="infos-brick-grid">

      <?php
      if (!empty($joueurs)) {
        foreach ($joueurs as $row) {
      ?>

          <a href="/profile/<?php echo $row->getId(); ?>" class="infos-brick-cell">
            <h2><?php echo $row->getFirstName() ?></h2>
            <span class="date"><?php echo $row->getPlayer(); ?></span>
            <span class="time-left">
              <?php echo $row->getStaff(); ?>
            </span>
          </a>
          <?php if (unserialize($_SESSION["user"])->getIsAdmin()) { ?>
            <div class="buttons-brick-cell">
              <a class="btn btn-primary mt-1 mb-1" href='<?php echo $url; ?>?changePlayerState=<?php echo $row->getId(); ?>'><?php if ($row->getIsPlayer() == 0) { ?><i class="fa-solid fa-hockey-puck"></i>&nbsp;Promouvoir joueur<?php } else { ?>&nbsp;<i class="fa-solid fa-circle-minus"></i>&nbsp;Destituer Joueur<?php } ?></a>
              <a class="btn btn-primary mt-1 mb-1" href='<?php echo $url; ?>?changeAdminState=<?php echo $row->getId(); ?>'><?php if ($row->getIsAdmin() == 0) { ?><i class="fa-solid fa-crown"></i>&nbsp;Promouvoir administrateur<?php } else { ?><i class="fa-solid fa-circle-minus"></i>&nbsp;Destituer administrateur<?php } ?></a>
              <a class="btn btn-primary mt-1 mb-1" href='<?php echo $url; ?>?changeStaffState=<?php echo $row->getId(); ?>'><?php if ($row->getIsStaff() == 0) { ?><i class="fa-solid fa-user"></i>&nbsp;Promouvoir membre du personnel<?php } else { ?><i class="fa-solid fa-circle-minus"></i>&nbsp;Destituer membre du personnel<?php } ?></a>
              <a class="btn btn-danger mt-1 mb-1" href='<?php echo $url; ?>?delete=<?php echo $row->getId(); ?>'><i class="fa-solid fa-trash"></i>&nbsp;Supprimer</a>
            </div>
          <?php } ?>
      <?php
        }
      }
      ?>

    </div>

  </div>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>