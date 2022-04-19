<!DOCTYPE html>
<?php
require_once("../controllers/forgotPasswordCont.php");
?>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="/app/css/style.css" rel="stylesheet">
  <!-- font family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <script src="/app/js/checkInputForgotPwd.js" async></script>
  <script src="/app/js/checkInputForgotPwdStep3.js" async></script>

  <title>Mot de passe oublié</title>
</head>

<body class="text-center text-light">

  <?php switch ($step) {
    case 1: ?>
      <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
        <form class="form-signin" data-bitwarden-watching="1" method="post" name="forgot" id="forgot">
          <img src="/assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
          <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
          <label for="inputEmail">E-Mail</label>
          <input type="email" id="inputEmail" name="inputEmail" class="form-control" required="" autofocus="">
          <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" id="mailSend">Continuer</button>
          <a class="btn btn-lg btn-secondary btn-block mt-1 mb-2 w-100" href="/login">Se connecter</a>
          <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
        </form>
      </div>
    <?php break;
    case 2:
    ?>
      <div class="page-middle container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
        <div class="form-signin">
          <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
          <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
          <h2>Mail envoyé&nbsp;!</h2>
          <p>Pour continuer le processus, allez cliquer sur le lien qui vous a été envoyé&nbsp;!</p>
          <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/login">Connexion</a>
          <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
        </div>
      </div>
    <?php break;
    case 3:
    ?>
      <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
        <form class="form-signin" data-bitwarden-watching="1" method="post" name="newPwd" id="newPwd">
          <img src="/assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
          <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
          <label for="inputPwd">Mot de passe</label>
          <input type="password" id="inputPwd" name="inputPwd" class="form-control" required="" autofocus="">
          <label for="inputCPwd">Confirmation du mot de passe</label>
          <input type="password" id="inputCPwd" name="inputCPwd" class="form-control" required="" autofocus="">
          <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" id="change">Continuer</button>
          <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
        </form>
      </div>
    <?php break;
    case 4:
    ?>
      <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
        <div class="form-signin">
          <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
          <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
          <h2>Mot de passe changé avec succès&nbsp;!</h2>
          <p>Pourquoi ne pas allez vous connecter&nbsp;?</p>
          <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/login">Connexion</a>
          <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
        </div>
      </div>
  <?php
      break;
  } ?>

</body>

</html>