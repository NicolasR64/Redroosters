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
    <table>
      <thead>
        <tr>
          <th>Joueur</th>
          <th>Position</th>
          <th>Fonction</th>
          <?php if (unserialize($_SESSION["user"])->getIsAdmin() == 1) { ?>
            <th>Outil</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($joueurs)) {
          foreach ($joueurs as $row) {
        ?>
            <tr>
              <?php if ($row->getId() == unserialize($_SESSION["user"])->getId()) { ?>
                <td><a href="/profile"><?php echo $row->getFirstName() . " " . $row->getLastName(); ?></a></td>
              <?php } else { ?>
                <td><a href="/profile/<?php echo $row->getId(); ?>"><?php echo $row->getFirstName() . " " . $row->getLastName(); ?></a></td>
              <?php } ?>
              <td><?php echo $row->getPlayer(); ?></td>
              <td><?php echo $row->getStaff(); ?></td>
              <?php if (unserialize($_SESSION["user"])->getIsAdmin() == 1) { ?>
                <td>
                  <a href='<?php echo $url; ?>?changePlayerState=<?php echo $row->getId(); ?>'><?php if($row->getIsPlayer() == 0){ ?>Désigner joueur<?php } else { ?>Destituer Joueur<?php }?></a>
                  <a href='<?php echo $url; ?>?changeAdminState=<?php echo $row->getId(); ?>'><?php if($row->getIsAdmin() == 0){ ?>Désigner administrateur<?php } else { ?>Destituer administrateur<?php }?></a>
                  <a href='<?php echo $url; ?>?delete=<?php echo $row->getId(); ?>'>Supprimer</a>
                  <a href='<?php echo $url; ?>?delete=<?php echo $row->getId(); ?>'>Supprimer</a>
                </td>
              <?php } ?>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>