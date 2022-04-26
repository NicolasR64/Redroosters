<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once("../views/includes/head.php")?>
    <title>Redroosters</title>
</head>
<body>

<?php require_once("../views/includes/header.php");?>

<div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
      <form method="POST" action="../controllers/eventManagementCont.php" class="form-event" data-bitwarden-watching="1" id="formLeagueManagement">
      <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy"/>
      <h1 class="h3 mb-3 font-weight-normal">Ajouter/Modifier une league</h1>

        <label for="inputCategorie">Catégorie</label>
        <input type="text" name="inputCategorie" id="inputCategorie" class="form-control" required="" autofocus="">

        <label for="inputSeasonYear">Année de la saison</label>
        <input type="number" name="inputSeasonYear" id="inputSeasonYear" class ="form-control" required="" autofocus="">

        <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" id="submitButton" type="submit" name="form-event">Ajouter league</button>
        <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
      </form>
    </div>
    <?php
      if(isset($_SESSION["error"])){
        echo $_SESSION["error"];
        session_destroy();
      }
    ?>
<?php require_once("../views/includes/footer.php");?>
</body>
</html>