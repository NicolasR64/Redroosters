<!DOCTYPE html>
<html lang="fr">

<head>
      <?php require_once("../views/includes/head.php");
      require_once("../controllers/eventCont.php");
      ?>
      <script src="/app/js/checkButtonStatus.js" async></script>
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
            <button class="btn btn-danger btn-lg btn-block" id="btn">Absent</button><br>
      </div>
      <?php require_once("../views/includes/footer.php"); ?>
</body>

</html>