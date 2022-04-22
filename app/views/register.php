<!DOCTYPE html>
<?php
require_once("../controllers/registerCont.php");
?>
<html lang="fr">

<head>

    <!-- REMPLACER ICI -->
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
    <!-- JUSQU'ICI -->

    <script src="/app/js/checkInputRegister.js" async></script>

    <title>Inscription</title>

</head>

<body class="text-center text-light">

    <?php switch ($step) {
        case 1:
    ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-signin" data-bitwarden-watching="1" method="post">
                    <img src="../../assets/img/logos/logo_icon_text.png" height="100px" loading="lazy" />
                    <h1 class="h3 mb-3 font-weight-normal">Redroosters</h1>
                    <label for="inputCode" class="sr-only">Code</label>
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
                    <label for="inputFirstName" class="sr-only">Prénom*</label>
                    <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" required="" autofocus="">
                    <label for="inputLastName" class="sr-only">Nom*</label>
                    <input type="text" id="inputLastName" name="inputLastName" class="form-control" required="">
                    <label for="inputDateBirth" class="sr-only">Date de naissance*</label>
                    <input type="date" id="inputDateBirth" name="inputDateBirth" class="form-control" required="">
                    <label for="inputPhone" class="sr-only">Numéro de téléphone*</label>
                    <input type="tel" id="inputPhone" name="inputPhone" class="form-control" required="">
                    <label for="inputEmail" class="sr-only">E-Mail*</label>
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control">
                    <label for="inputPassword" class="sr-only">Mot de passe*</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" required="">
                    <label for="inputPasswordConfirm" class="sr-only">Confirmation*</label>
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