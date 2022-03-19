<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile - redroosters</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body  class="bg-dark text-light">
    <header>

    </header>
    <main>
        <!-- Profile Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <img class="rounded-circle" src="../../assets/img/avatars/default.jpg" alt="avatars de l'utilisateur" loading="lazy" >
            <p class="mt-2 mb-1"><?php echo $player->getLastname(); echo $player->getFirstname()?></p>
            <p class="text-white-50"><?php echo $player->getPosition() ?></p>
        </div>
        <!-- Profile Main -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-5 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Informations générales</h4>
                        </div>      
                        <div class="row mt-2">
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control" readonly placeholder="Nom" value="<?php echo $player->getLastname() ?>"></div>
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control" readonly placeholder="Prenom" value="<?php echo $player->getFirstname() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control" readonly placeholder="Surnom" value="<?php echo $player->getNickname() ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mt-1"><label class="labels mb-2">Rôle :</label><input type="text" class="form-control" readonly placeholder="Rôle" value="<?php echo $player->getPosition() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de license :</label><input type="text" class="form-control" readonly placeholder="Numéro de license" value="<?php echo $player->getLicenseNumber() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de maillot :</label><input type="text" class="form-control" readonly placeholder="Numéro de maillot" value="<?php echo $player->getJerseyNumber() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control" readonly placeholder="Main dominante" value="<?php echo $player->getHandedness() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control" readonly placeholder="E-mail" value="<?php echo $player->getMail() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d'un parent :</label><input type="text" class="form-control" readonly placeholder="E-mail parent" value="<?php echo $player->getParentMail() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Télephone :</label><input type="text" class="form-control"  readonly placeholder="numéro de gsm" value="<?php echo $player->getPhoneNumber() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Date de naissance :</label><input type="text" class="form-control" readonly placeholder="Date de naissance" value="<?php echo $player->getDateBirth() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d'arrivée :</label><input type="text" class="form-control " readonly placeholder="Année d'arrivée" value="<?php echo $player->getSeasonArrived() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Taille (cm) :</label><input type="text" class="form-control  " readonly placeholder="Taille en cm" value="<?php echo $player->getSize() ?> cm"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Poid (kg) :</label><input type="text" class="form-control " readonly placeholder="Poid en kg" value="<?php echo $player->getWeight() ?> kg"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" href="homePage.php">revenir en arrière</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>