<?php
session_start();
//vérifie si l'utilisateur est connnecté
require_once("../controllers/isConnect.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Profil | Redroosters</title>
    <?php
    require_once("../views/includes/head.php");

    //récupération du controller
    require_once("../controllers/ProfileCont.php");
    $contProfile = new ProfileCont();

    //récupération du données de l'utilisateur
    $user = $contProfile->getUser();
    if ($user->getIsPlayer() == 1) {
        //c'est un joueur
        $player = $contProfile->getPlayerById($user->getId());
        $position = $player->getPosition($player->getIdPosition());
    } else {
        //c'est un staff
        $staff = $contProfile->getStaffById($user->getId());
        $function = $staff->getFunction($staff->getIdFunction());
    }

    ?>
</head>

<body>
    <?php
    $active = "profile";
    require_once("../views/includes/header.php");
    ?>
    <main>
        <!-- Verifier si joueur existe et si pas alors rediriger TO DO -->
        <!-- Hero profile -->
        <div class="mt-4 text-center container-fluid profile-header">
            <!-- image de profil -->
            <img class="rounded-circle" src="../../assets/img/avatars/default.jpg" alt="avatars de l'utilisateur" loading="lazy">
            <!-- Affichage nom et prénom -->
            <p class="mt-2 mb-1">
                <?php echo
                $user->getFirstname() . ' ' . $user->getLastName(); ?>
            </p>
            <?php
            // affichage poste
            if ($user->getIsStaff()) {
                echo '
                    <p class="text-white-50">' . $function->getName() . '</p>
                ';
            } else {
                echo '
                    <p class="text-white-50">' . $position->getName() . '</p>
                ';
            }
            ?>
        </div>
        <!-- Affichage données profile -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-5 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Informations générales</h4>
                        </div>
                        <div class="row mt-3">
                                <!-- bouton de modification de profil -->
                                <div class="d-flex col-md-6 mt-1 justify-content-start">
                                    <?php
                                    $sessionUser = unserialize($_SESSION['user']);
                                    if (($user->getId() == $sessionUser->getId())) {
                                        echo '<a class="btn btn-danger" href="profile/edit">Modifier son profil</a>';
                                    } else if ($sessionUser->getIsAdmin()) {
                                        echo '<a class="btn btn-danger" href="/profile/' . $_GET['id'] . '/edit">Modifier son profil</a>';
                                    }
                                    ?>
                                </div>
                                <div class="d-flex col-md-6 mt-1 justify-content-end">
                                    <a class="btn btn-primary" href="/logout">Se déconecter</a>
                                </div>

                            </div>
                        <div class="row mt-2">
                            <div class="col-md-6 mt-1">
                                <!-- lastName -->
                                <label class="labels mb-2 mt-sm-2">Nom :</label>
                                <input type="text" class="form-control" readonly placeholder="Nom" value="<?php echo $user->getLastName() ?>">
                            </div>
                            <div class="col-md-6 mt-1">
                                <!-- FirstName -->
                                <label class="labels mb-2 mt-sm-2">Prénom :</label>
                                <input type="text" class="form-control" readonly placeholder="Prenom" value="<?php echo $user->getFirstName() ?>">
                            </div>
                            <div class="col-md-12 mt-1">
                                <!-- NickName -->
                                <label class="labels mb-2 mt-sm-2">Surnom :</label>
                                <input type="text" class="form-control" readonly placeholder="Surnom" value="<?php echo $user->getNickname() ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <form action="" method="POST">
                                <div class="col-md-12 mt-1">
                                    <!-- Mail -->
                                    <label class="labels mb-2 mt-2">E-mail :</label>
                                    <input type="text" class="form-control" readonly placeholder="E-mail" value="<?php echo $user->getMail() ?>">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <!-- ParentMail -->
                                    <label class="labels mb-2 mt-2">E-mail d'un parent :</label>
                                    <input type="text" class="form-control" readonly placeholder="E-mail parent" value="<?php echo $user->getParentMail() ?>">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <!-- EmergencyMail -->
                                    <label class="labels mb-2 mt-2">E-mail d'urgence :</label>
                                    <input type="text" class="form-control" readonly placeholder="E-mail parent" value="<?php echo $user->getEmergencyMail() ?>">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <!-- Phone -->
                                    <label class="labels mb-2 mt-2">Télephone :</label>
                                    <input type="text" class="form-control" readonly placeholder="numéro de gsm" value="<?php echo $user->getPhone() ?>">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <!-- DateBirth -->
                                    <label class="labels mb-2 mt-2">Date de naissance :</label>
                                    <input type="text" class="form-control" readonly placeholder="Date de naissance" value="<?php echo $user->getDateBirth() ?>">
                                </div>

                                <?php
                                //vérification du rôle
                                if ($user->getIsStaff()) {
                                    /* C'est un staff */

                                    // Function
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2">Fonction :</label>
                                        <input type="text" class="form-control" readonly placeholder="Rôle" value="' . $function->getName() . '">
                                    </div>
                                    ';

                                    // seasonArrived
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                        <input type="text" class="form-control " readonly placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '">
                                    </div>
                                    ';
                                } else {
                                    /* c'est un player */

                                    // Position
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2">Position :</label>
                                        <input type="text" class="form-control" readonly placeholder="Rôle" value="' . $position->getName() . '">
                                    </div>
                                    ';

                                    // JerseyNumber
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Numéro de maillot :</label>
                                        <input type="text" class="form-control" readonly placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '">
                                    </div>
                                    ';

                                    // SeasonArrived
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                        <input type="text" class="form-control " readonly placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '">
                                    </div>
                                    ';

                                    // LicenseNumber
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Numéro de license :</label>
                                        <input type="text" class="form-control" readonly placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '">
                                    </div>
                                    ';

                                    // Handedness
                                    if ($player->getHandedness()) {
                                        echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Main dominante :</label>
                                        <input type="text" class="form-control" readonly placeholder="Main dominante" value="Droitié">
                                    </div>
                                    ';
                                    } else {
                                        echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Main dominante :</label>
                                        <input type="text" class="form-control" readonly placeholder="Main dominante" value="Gauché">
                                    </div>
                                    ';
                                    }

                                    // Size
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Taille (cm) :</label>
                                        <input type="text" class="form-control  " readonly placeholder="Taille en cm" value="' . $player->getSize() . ' cm">
                                    </div>
                                    ';

                                    // Weight
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Poid (kg) :</label>
                                        <input type="text" class="form-control " readonly placeholder="Poid en kg" value="' . $player->getWeight() . ' kg">
                                    </div>
                                    ';

                                    // isCarpooling
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Fait du covoiturage :</label>
                                    ';
                                    if ($player->getIsCarpooling()) {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Covoiturage" value="oui">
                                        ';
                                    } else {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Covoiturage" value="non">
                                        ';
                                    }
                                    echo '
                                        </div>
                                    ';

                                    // isSick
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Santé :</label>
                                    ';
                                    if ($player->getIsSick()) {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Santé" value="malade/blessé">
                                        ';
                                    } else {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Santé" value="en pleine forme">
                                        ';
                                    }
                                    echo '
                                    </div>
                                    ';

                                    // isBan
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Suspension :</label>
                                    ';
                                    if ($player->getIsBan()) {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Suspension" value="oui">
                                        ';
                                    } else {
                                        echo '
                                        <input type="text" class="form-control " readonly placeholder="Suspension" value="non">
                                        ';
                                    }
                                    echo '
                                    </div>
                                    ';
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>