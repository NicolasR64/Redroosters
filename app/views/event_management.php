<?php
session_start();
require_once("../controllers/eventManagementCont.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="../../app/css/style.css" rel="stylesheet">
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Redroosters</title>
</head>
<body>

<div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
      <form method="POST" action="../controllers/eventManagementCont.php" class="form-event" data-bitwarden-watching="1">
      <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy"/>
      <h1 class="h3 mb-3 font-weight-normal">Ajouter/Modifier évènement</h1>

        <label for="inputName" class="sr-only">Nom</label>
        <input type="text" name="inputName" id="inputName" class="form-control" required="" autofocus="">

        <label for="inputBeginDate" class="sr-only">Date de début</label>
        <input type="date" name="inputBeginDate" id="inputBeginDate" class="form-control" required="">

        <label for="inputEndDate" class="sr-only">Date de fin</label>
        <input type="date" name="inputEndDate" id="inputEndDate" class="form-control" required="">

        <label for="inputRdvHours" class="sr-only">Heure du rendez-vous</label>
        <input type="time" name="inputRdvHours" id="inputRdvHours" class="form-control" required="">

        <label for="inputRdvDate" class="sr-only">Date du rendez-vous</label>
        <input type="date" name="inputRdvDate" id="inputRdvDate" class="form-control" required="">

        <label for="inputEndHour" class="sr-only">Heure de fin</label>
        <input type="time" name="inputEndHour" id="inputEndHour" class="form-control" required="">

        <label for="inputStreet" class="sr-only">Rue de l'évènement</label>
        <input type="text" name="inputStreet" id="inputStreet" class="form-control" required="">

        <label for="inputCity" class="sr-only">Ville de l'évènement</label>
        <input type="text" name="inputCity" id="inputCity" class="form-control" required="">

        <label for="inputPostalCode" class="sr-only">Code Postal</label>
        <input type="number" name="inputPostalCode" id="inputPostalCode" class="form-control" required="">

        <label for="inputRdvStreet" class="sr-only">Rue de rendez-vous</label>
        <input type="text" name="inputRdvStreet" id="inputRdvStreet" class="form-control" required="">

        <label for="inputRdvCity" class="sr-only">Ville de rendez-vous</label>
        <input type="text" name="inputRdvCity" id="inputRdvCity" class="form-control" required="">

        <label for="inputRdvPostalCode" class="sr-only">Code postal du rendez-vous</label>
        <input type="number" name="inputRdvPostalCode" id="inputRdvPostalCode" class="form-control" required="">

        <textarea for="inputDescription" name="inputDescription" class="sr-only">Description</textarea>
        <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" name="form-event">Ajouter évènement</button>
        <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
      </form>
    </div>
    <?php
      if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        session_destroy();
      }
    ?>
</body>
</html>