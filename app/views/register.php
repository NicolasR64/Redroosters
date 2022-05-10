<?php

session_start();

require_once("../controllers/isDisconnect.php");

require_once("../controllers/registerCont.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <?php require_once("../views/includes/head.php"); ?>

    <script src="/app/js/checkInputRegister.js" async></script>

    <title>Inscription | Redroosters</title>

</head>

<body class="text-center text-light">

    <?php switch ($step) {
        case 1:
    ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-signin" data-bitwarden-watching="1" method="post">
                    <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <label for="inputCode">Code</label>
                    <input type="password" name="inputCode" id="inputCode" class="form-control" required="" autofocus="">
                    <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" value="envoyer">Continuer</button>
                    <a class="btn btn-lg btn-secondary btn-block mt-1 mb-2 w-100" href="/login">Connexion</a>
                    <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
                </form>
            </div>
        <?php
            break;
        case 2:
        ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form name="insc" class="form-signin" data-bitwarden-watching="1" method="post" id="insc">
                    <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <label for="inputFirstName">Prénom*</label>
                    <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" required="" autofocus="">
                    <label for="inputLastName">Nom*</label>
                    <input type="text" id="inputLastName" name="inputLastName" class="form-control" required="">
                    <label for="inputDateBirth">Date de naissance*</label>
                    <input type="date" id="inputDateBirth" name="inputDateBirth" class="form-control" required="">
                    <label for="inputPhone">Numéro de téléphone*</label>
                    <input type="tel" id="inputPhone" name="inputPhone" class="form-control" required="">
                    <label for="inputEmail">E-Mail*</label>
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control">
                    <label for="inputPassword">Mot de passe*</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" required="">
                    <label for="inputPasswordConfirm">Confirmation*</label>
                    <input type="password" id="inputPasswordConfirm" name="inputPasswordConfirm" class="form-control" required="">
                    <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" name="confStep2" id="confStep2" value="envoyer">Inscription</button>
                    <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
                </form>
            </div>
        <?php
            break;
        case 3:
        ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-signin" data-bitwarden-watching="1" method="post">
                    <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <h2>Inscription réussie&nbsp;!</h2>
                    <p>N'oubliez pas d'aller compléter votre profil sur votre page personnelle&nbsp;!</p>
                    <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/login">Connexion</a>
                    <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
                </form>
            </div>
    <?php
            break;
    } ?>
</body>

</html>