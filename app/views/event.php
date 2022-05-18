<!DOCTYPE html>
<html lang="fr">

<head>
      <?php require_once("../views/includes/head.php");
      require_once("../controllers/eventCont.php");
      require_once("../controllers/isConnect.php");
      require_once("../models/User.php");
      ?>
      <script src="/app/js/checkButtonStatus.js" async></script>
      <script src="/app/js/checkConfirmationButton.js" async></script>
      <title>Redroosters</title>
</head>

<body>
      <?php require_once("../views/includes/header.php"); ?>

      <div class="text-center">
            <h1 class="h3 mb-3 font-weight-normal"><?php echo $event->getName(); ?></h1>
      </div>

      <div class="d-flex flex-row justify-content-center mt-5">
            <div class="d-flex flex-column">

                  <div class="flex-container d-flex justify-content-center">
                        <i class="pointer fa-solid fa-location-dot"></i>
                        <div class="information"><?php echo $event->getStreet() . "<br>";
                                                      echo $event->getPostalCode() . ", " . $event->getCity(); ?>
                        </div>
                  </div>


                  <div class="flex-container d-flex justify-content-center">
                        <i class="fa-solid fa-calendar"></i>
                        <div class="information"><?php echo $event->getDateBegin() . " - " . $event->getDateEnd(); ?>
                        </div>
                  </div>

                  <div class="flex-container d-flex justify-content-center">
                        <i class="fa-solid fa-clock"></i>
                        <div class="information"><?php echo $totalHours; ?>
                        </div>
                  </div><br>
            </div>

            <div class="text-center">
                  <div class="descriptionCont rounded-3">
                        <h2 class="h4 mb-3 font-weight-normal">Détails de l'évènement</h2>
                        <?php echo $event->getDescription(); ?><br>
                  </div>
            </div>
      </div>
      </div>

      <div class="rdvField text-center mt-5 rounded-3">
            <h2 class="h4 mb-3 font-weight-normal">Lieu de rendez-vous</h2>
            <?php echo $event->getRdvStreet() . ", " . $event->getRdvPostalCode() . " " . $event->getRdvCity() . "<br>";
            echo $event->getRdvHours() . "<br><br>"; ?>

      </div>
      <div class="text-center mt-5 ">
            <?php $sessionUser = unserialize($_SESSION['user']);
            if ($sessionUser->getIsAdmin() == 1) { ?>
                  <form action="/app/controllers/deleteEventCont.php" method="POST" id="formDelete">
                        <input type="hidden" name="inputIdEvent2" value="<?php echo $_GET['id'] ?>">
                        <button form="formDelete" class="btn btn-lg btn-block bg-danger" type="submit" id="confirm-box">Supprimer</button><br>
                  </form><br>
            <?php } ?>
            <form id="formPrensence">
                  <input type="hidden" name="inputIdEvent" value="<?php echo $_GET['id'] ?>">
                  <?php
                  //on teste si l'utilisateur est invité à cet évènement
                  $sessionUser = unserialize($_SESSION['user']);
                  $data = getEntryByUserIdAndEventId($sessionUser->getId(), $_GET['id']);

                  if ($data != null) {
                        $datas = $data[0];
                  ?>
                        <button form="formPrensence" formmethod="POST" formaction="/app/controllers/PresenceCont.php" class="btn <?php $datas['isDispo'] ? print('bg-success') : print('bg-danger') ?> btn-lg btn-block" id="btn"><?php $datas['isDispo'] ? print('Présent') : print('Absent') ?></button><br>
            </form>
      <?php
                  } else {
                        echo '<p>Tu n\'est pas convié à cet évènement </p>';
                  }
      ?>
      </div>
      <!-- Liste des joueurs invité -->
      <div class="container mt-2 mb-5">
            <div class="row">
                  <div class="col-md-9 border-right mx-auto rounded">
                        <div class="p-3 py-5">
                              <div class="text-center align-items-center mb-3 ">
                                    <h4>Présence(s) </h4>
                              </div>
                              <div class="row-cols-md-12 text-center rounded overflow-hidden fs-5">
                                    <?php
                                    /*  Récupération des joueurs invité */
                                    $data = getListPlayerByEvent($_GET['id']);
                                    if ($data == null) {
                                          echo 'aucun joueur n\'est invité à cet evènement';
                                    }
                                    /* Affichage joueur */
                                    foreach ($data as $key) {
                                          /* recherche du joueur */
                                          $user = getUserById($key['idUser']);
                                         /*  $player = getPlayerByid($user->getPlayer());
                                          $position = $player->getPosition(); */

                                          if ($key['isAnswer']) {
                                                if ($key['isDispo'] == 1) {
                                                      if ($key['isSelected']) {
                                                            echo '
                                                <div class="row bg-secondary border-bottom border-dark ">
                                                      <div class="col-md-3 ">
                                                            <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() .'</p>
                                                      </div>
                                                      <div class="col-md-3 bg-success">
                                                            <p class="labels mb-2 mt-sm-2">Présent</p>
                                                      </div>
                                                      <div class="col-md-3 bg-warning">
                                                            <p class="labels mb-2 mt-sm-2">Sélectionné</p>
                                                      </div>
                                                      <div class="col-md-3">
                                                      <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Déselectionné</a>
                                                      </div>
                                                </div>  
                                                ';
                                                      } else {
                                                            echo '
                                                <div class="row bg-secondary border-bottom border-dark ">
                                                      <div class="col-md-3 ">
                                                            <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() . '</p>
                                                      </div>
                                                      <div class="col-md-3 bg-success">
                                                            <p class="labels mb-2 mt-sm-2">Présent</p>
                                                      </div>
                                                      <div class="col-md-3 bg-danger">
                                                            <p class="labels mb-2 mt-sm-2">Non sélectionné</p>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Selectionné</a>
                                                      </div>
                                                </div>  
                                                ';
                                                      }
                                                } else {
                                                      if ($key['isSelected']) {
                                                            echo '
                                                      <div class="row bg-secondary border-bottom border-dark ">
                                                            <div class="col-md-3 ">
                                                                  <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() . '</p>
                                                            </div>
                                                            <div class="col-md-3 bg-danger">
                                                                  <p class="labels mb-2 mt-sm-2">Absent</p>
                                                            </div>
                                                            <div class="col-md-3 bg-warning">
                                                                  <p class="labels mb-2 mt-sm-2">Sélectionné</p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                  <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Déselectionné</a>
                                                            </div>
                                                      </div>  
                                                ';
                                                      } else {
                                                            echo '
                                                <div class="row bg-secondary border-bottom border-dark ">
                                                      <div class="col-md-3 ">
                                                            <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() . '</p>
                                                      </div>
                                                      <div class="col-md-3 bg-danger">
                                                            <p class="labels mb-2 mt-sm-2">Absent</p>
                                                      </div>
                                                      <div class="col-md-3 bg-danger">
                                                            <p class="labels mb-2 mt-sm-2">Non sélectionné</p>
                                                      </div>
                                                      <div class="col-md-3">
                                                            <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Selectionné</a>
                                                      </div>
                                                </div>  
                                          ';
                                                      }
                                                }
                                          } else {
                                                if ($key['isSelected']) {
                                                      echo '
                                          <div class="row bg-secondary border-bottom border-dark ">
                                                <div class="col-md-3 ">
                                                      <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() . '</p>
                                                </div>
                                                <div class="col-md-3">
                                                      <p class="labels mb-2 mt-sm-2">En attente de réponse</p>
                                                </div>
                                                <div class="col-md-3 bg-warning">
                                                      <p class="labels mb-2 mt-sm-2">Sélectionné</p>
                                                </div>
                                                <div class="col-md-3">
                                                      <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Déselectionné</a>
                                                </div>
                                          </div>  
                                    ';
                                                } else {
                                                      echo '
                                          <div class="row bg-secondary border-bottom border-dark ">
                                                <div class="col-md-3 ">
                                                      <p class="labels mb-2 mt-sm-2">' . $user->getFirstName() . '</p>
                                                </div>
                                                <div class="col-md-3">
                                                      <p class="labels mb-2 mt-sm-2">En attente de réponse</p>
                                                </div>
                                                <div class="col-md-3 bg-danger">
                                                      <p class="labels mb-2 mt-sm-2">Non sélectionné</p>
                                                </div>
                                                <div class="col-md-3">
                                                      <a class="btn btn-primary mt-1 mb-1" href="/app/controllers/PresenceCont.php?idPlayer=' . $user->getId() . '&idEvent=' . $_GET['id'] . '">Selectionné</a>
                                                </div>
                                          </div>  
                                    ';
                                                }
                                          }
                                    }
                                    ?>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <?php
      if ($sessionUser->getIsAdmin() == 1) {
            echo "<a href=\"/event/edit/" . $event->getId() . "\" rel=\"nofollow\" class=\"btn-fixed\" title=\"Editer l'évènement\"><i class=\"fa-solid fa-pen-to-square\"></i></a>";
      }
      require_once("../views/includes/footer.php"); ?>
</body>

</html>