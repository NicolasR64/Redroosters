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
                      <th>Outil</th>
                  </tr>
            </thead>
            <tbody>
              <?php
                 if(!empty($joueurs)) { 
                     foreach($joueurs as $row) {
              ?>
              <tr>
                  <td><a href="/profile/<?php echo $row->getId();?>"><?php echo $row->getFirstName() . " " . $row->getLastName(); ?></a></td>
                  <td><?php echo $row->getPlayer(); ?></td>
                  <td><?php echo $row->getStaff(); ?></td>
                  <td></td>
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