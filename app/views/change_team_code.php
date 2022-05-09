<!DOCTYPE html>
<?php

session_start();

require_once("../controllers/isConnect.php");

require_once("../controllers/changeTeamCodeCont.php");

?>
<html lang="fr">

<head>

    <title>Changement code d'inscription | Redroosters</title>
    <?php require_once("../views/includes/head.php"); ?>

</head>

<body class="text-center text-light">

    <?php
        require_once("../views/includes/header.php"); 
        switch ($step) {
        case 1:
    ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-signin" data-bitwarden-watching="1" method="post" name="newCode" id="newCode">
                    <img src="/assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <p>Si vous souhaitez générer un code aléatoire, veuillez laisser le champs vide.</p>
                    <p>Sinon, veuillez rentrer un code à 8 caractères minimum et maximum 15.</p>
                    <label for="inputCode">Nouveau code</label>
                    <input type="password" id="inputCode" name="inputCode" class="form-control" autofocus="">
                    <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" id="change">Continuer</button>
                    <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
                </form>
            </div>
        <?php
            break;
        case 2:
        ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-signin" data-bitwarden-watching="1" method="post">
                    <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <h2>Code changé&nbsp;!</h2>
                    <p>Nouveau code: <?php echo $code; ?></p>
                    <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/home">Retour à l'accueil</a>
                    <p class="mt-5 mb-3 text-muted">© Projet HELHa</p>
                </form>
            </div>
    <?php
            break;
    } ?>
</body>

</html>