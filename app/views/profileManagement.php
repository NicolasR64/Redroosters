<?php
session_start();
//check if user is connected
require_once("../controllers/isConnect.php");


//fetch controller
require_once("../controllers/ProfileCont.php");
$contProfile = new ProfileCont();
//check if profil exist
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $exist = $contProfile->isProfilExist($_GET['id']);
} else {
    $exist = $contProfile->isProfilExist(unserialize($_SESSION['user'])->getId());
}

printf($exist);
if (!$exist) {
    header("location: /profile");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Gestion profil | Redroosters</title>
    <?php

    require_once("../views/includes/head.php");

    $contProfile = new ProfileCont();

    //fetch user data
    $user = $contProfile->getUser();
    $sessionUser =  unserialize($_SESSION['user']);
    if (($user->getId() != $sessionUser->getId()) && ($sessionUser->getIsAdmin() == 0)) {
        header('location: /profile');
    }

    if ($user->getIsPlayer() == 1 && $user->getIsStaff() == 0) {
        //player
        $player = $contProfile->getPlayerById($user->getId());
        $position = $player->getPosition($player->getIdPosition());
    } else if ($user->getIsPlayer() == 0 && $user->getIsStaff() == 1) {
        //staff
        $staff = $contProfile->getStaffById($user->getId());
        $function = $staff->getFunction($staff->getIdFunction());
    } else {
        //player and staff
        $player = $contProfile->getPlayerById($user->getId());
        $position = $player->getPosition($player->getIdPosition());
        $staff = $contProfile->getStaffById($user->getId());
        $function = $staff->getFunction($staff->getIdFunction());
    }
    ?>
</head>

<body>
    <?php require_once("../views/includes/header.php");

    $sessionUser = unserialize($_SESSION['user']);

    ?>
    <main>
        <!-- Hero profile -->
        <div class="mt-4 text-center container-fluid profile-header">
            <!-- profile picture -->
            <img class="rounded-circle" src="../../assets/img/avatars/default.jpg" alt="avatars de l'utilisateur" loading="lazy">
            <!--show lastname and firstname -->
            <p class="mt-2 mb-1">
                <?php echo
                $user->getFirstname() . ' ' . $user->getLastName(); ?>
            </p>
            <?php
            // show post
            if ($user->getIsStaff() && !$user->getIsPlayer()) {
                echo '
                    <p class="text-white-50">' . $function->getName() . '</p>
                ';
            } else if (!$user->getIsStaff() && $user->getIsPlayer()){
                echo '
                    <p class="text-white-50">' . $position->getName() . '</p>
                ';
            } else{
                echo '
                    <p class="text-white-50">' . $function->getName().' / '.$position->getName(). '</p>
                ';
            }
            ?>
        </div>
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-5 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Mise à jours de votre profil</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex col-md-12">
                                    <a class="btn btn-danger" href="/change-password">Changer le mot de passe</a>
                            </div>
                        </div>
                        <!-- Form of data -->
                        <form id="submitUpdateProfile">
                            <div class="row mt-2">
                                <!-- LastName -->
                                <div class="col-md-6 mt-1">
                                    <label class="labels mb-2 mt-sm-2">Nom :</label>
                                    <input type="text" class="form-control" placeholder="Nom" value="<?php echo $user->getLastName() ?>" id="inputLastName" name="inputLastName">
                                    <p id="LastNameError" class="text-danger"></p>
                                </div>

                                <!-- FirstName -->
                                <div class="col-md-6 mt-1">
                                    <label class="labels mb-2 mt-sm-2">Prénom :</label>
                                    <input type="text" class="form-control" placeholder="Prenom" value="<?php echo $user->getFirstName() ?>" id="inputFirstName" name="inputFirstName">
                                    <p id="FirstNameError" class="text-danger"></p>
                                </div>

                                <!-- NickName -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-sm-2">Surnom :</label>
                                    <input type="text" class="form-control" placeholder="Surnom" value="<?php echo $user->getNickname() ?>" id="inputNickName" name="inputNickName">
                                    <p id="NickNameError" class="text-danger"></p>
                                </div>

                                <!-- Mail -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-2">E-mail :</label>
                                    <input type="text" class="form-control" placeholder="E-mail" value="<?php echo $user->getMail() ?>" id="inputMail" name="inputMail">
                                    <p id="MailError" class="text-danger"></p>
                                </div>

                                <!-- EmergencyMail -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-2">E-mail d'urgence :</label>
                                    <input type="text" class="form-control" placeholder="E-mail d'urgence" value="<?php echo $user->getEmergencyMail() ?>" id="inputEmergencyMail" name="inputEmergencyMail">
                                    <p id="EmergencyMailError" class="text-danger"></p>
                                </div>

                                <!-- ParentMail -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-2">E-mail d'un parent :</label>
                                    <input type="text" class="form-control" placeholder="E-mail parent" value="<?php echo $user->getParentMail() ?>" id="inputParentMail" name="inputParentMail">
                                    <p id="ParentMailError" class="text-danger"></p>
                                </div>

                                <!-- Datebirth -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-2">Date de naissance :</label>
                                    <input type="date" class="form-control" placeholder="Date de naissance" value="<?php echo $user->getDateBirth() ?>" id="inputDateBirth" name="inputDateBirth">
                                    <p id="DateBirthError" class="text-danger"></p>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2 mt-2">Téléphone :</label>
                                    <input type="text" class="form-control" placeholder="numéro de gsm" value="<?php echo $user->getPhone() ?>" id="inputPhone" name="inputPhone">
                                    <p id="PhoneError" class="text-danger"></p>
                                </div>
                                <?php
                                // id
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
                                } else {
                                    echo '<input type="hidden" name="id" value="' . $sessionUser->getId() . '">';
                                }
                                // isStaff, use for js
                                echo '<input type="hidden" name="isStaff" value="' . $sessionUser->getIsStaff() . '">';
                                echo '<input type="hidden" name="isPlayer" value="' . $sessionUser->getIsPlayer() . '">';

                                ?>
                            </div>
                            <div class="row mt-3">
                                <?php
                                /* check if staff or player */
                                if ($user->getIsStaff() && !$user->getIsPlayer()) {
                                    //staff

                                    // Function
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2">Fonction :</label>
                                        <select name="inputFunction" id="inputFunction" class="form-control">
                                    ';
                                    $resultat = $contProfile->getAllFunction();
                                    foreach ($resultat as $key) {
                                        if ($function->getName() == $key['name']) {
                                            echo '
                                                <option  value="' . $key['id'] . '" selected>' . $key['name'] . '</option>
                                                ';
                                        } else {
                                            echo '
                                                <option  value="' . $key['id'] . '">' . $key['name'] . '</option>
                                                ';
                                        }
                                    }
                                    echo '
                                            </select>
                                            <p id="FunctionStaffError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //Season arrived
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                            <input type="date" class="form-control"  placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '" id="inputSeasonArrivedStaff" name="inputSeasonArrivedStaff">
                                            <p id="SeasonArrivedError" class="text-danger"></p>
                                        </div>
                                        ';
                                } else if ($user->getIsPlayer() && !$user->getIsStaff()) {
                                    //player

                                    //Position
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2">Position :</label>
                                            <select name="inputPosition" id="inputPosition" class="form-control">
                                        ';
                                    $resultat = $contProfile->getAllPositions();
                                    foreach ($resultat as $key) {
                                        if ($position->getName() == $key['name']) {
                                            echo '
                                                    <option  value="' . $key['id'] . '" selected>' . $key['name'] . '</option>
                                                ';
                                        } else {
                                            echo '
                                                    <option  value="' . $key['id'] . '">' . $key['name'] . '</option>
                                                ';
                                        }
                                    }
                                    echo '
                                            </select>
                                            <p id="PositionError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //jersey number
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Numéro de maillot :</label>
                                            <input type="number" min="01" max="99" class="form-control"  placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '" id="inputJerseyNumber" name="inputJerseyNumber">
                                            <p id="JerseyNumberError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //season arrived player
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                            <input type="date" class="form-control "  placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '" id="inputSeasonArrivedPlayer" name="inputSeasonArrivedPlayer">
                                            <p id="SeasonArrivedPlayerError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //handedness
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Main dominante :</label>
                                            <select class="form-control" name="inputHandedness" id="inputHandedness">
                                        ';
                                    if ($player->getHandedness()) {
                                        echo '<option value="0">Gauché</option>';
                                        echo '<option value="1" selected>Droitié</option>';
                                    } else {
                                        echo '<option value="0" selected>Gauché</option>';
                                        echo '<option value="1">Droitié</option>';
                                    }
                                    echo '
                                            </select>
                                            <p id="handednessError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //license number
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Numéro de license :</label>
                                            <input type="text" class="form-control"  placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '" id="inputLicenseNumber" name="inputLicenseNumber">
                                            <p id="licenseNumberError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //size
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Taille (cm) :</label>
                                            <input type="number" min="100" max="250"  class="form-control  "  placeholder="Taille en cm" value="' . $player->getSize() . '" cm" id="inputSize" name="inputSize">
                                            <p id="sizeError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //weight
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Poid (kg) :</label>
                                            <input type="number" min="40" max="180" class="form-control "  placeholder="Poid en kg" value="' . $player->getWeight() . '" kg" id="inputWeight" name="inputWeight">
                                            <p id="weightError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //isSick
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Santé :</label>
                                            <select class="form-control" name="inputIsSick" id="inputIsSick">
                                        ';
                                    if ($player->getIsSick()) {
                                        echo '<option value="0">En forme</option>';
                                        echo '<option value="1" selected>Malade</option>';
                                    } else {
                                        echo '<option value="0" selected>En forme</option>';
                                        echo '<option value="1">Malade</option>';
                                    }
                                    echo '
                                            </select>
                                            <p id="isSickError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //isBan
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Bannissement :</label>
                                            <select class="form-control" name="inputIsBan" id="inputIsBan">
                                        ';
                                    if ($player->getIsBan()) {
                                        echo '<option value="0">En règle</option>';
                                        echo '<option value="1" selected>Exclu</option>';
                                    } else {
                                        echo '<option value="0" selected>En règle</option>';
                                        echo '<option value="1">Exclu</option>';
                                    }
                                    echo '
                                            </select>
                                            <p id="isBanError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //isCarpooling
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Coivaturage :</label>
                                            <select class="form-control" name="inputIsCarpooling" id="inputIsCarpooling">
                                        ';
                                    if ($player->getIsCarpooling()) {
                                        echo '<option value="0">Ne fait pas de covoiturage</option>';
                                        echo '<option value="1" selected>Fait du covoiturage</option>';
                                    } else {
                                        echo '<option value="0" selected>Ne fait pas de covoiturage</option>';
                                        echo '<option value="1">Fait du covoiturage</option>';
                                    }
                                    echo '
                                            </select>
                                            <p id="isCarpoolingError" class="text-danger"></p>
                                        </div>
                                        ';
                                } else {
                                    //Position
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2">Position :</label>
                                                                               <select name="inputPosition" id="inputPosition" class="form-control">
                                                                           ';
                                    $resultat = $contProfile->getAllPositions();
                                    foreach ($resultat as $key) {
                                        if ($position->getName() == $key['name']) {
                                            echo '
                                                                                       <option  value="' . $key['id'] . '" selected>' . $key['name'] . '</option>
                                                                                   ';
                                        } else {
                                            echo '
                                                                                       <option  value="' . $key['id'] . '">' . $key['name'] . '</option>
                                                                                   ';
                                        }
                                    }
                                    echo '
                                                                               </select>
                                                                               <p id="PositionError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //jersey number
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Numéro de maillot :</label>
                                                                               <input type="number" min="01" max="99" class="form-control"  placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '" id="inputJerseyNumber" name="inputJerseyNumber">
                                                                               <p id="JerseyNumberError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //season arrived player
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                                                               <input type="date" class="form-control "  placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '" id="inputSeasonArrivedPlayer" name="inputSeasonArrivedPlayer">
                                                                               <p id="SeasonArrivedError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //handedness
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Main dominante :</label>
                                                                               <select class="form-control" name="inputHandedness" id="inputHandedness">
                                                                           ';
                                    if ($player->getHandedness()) {
                                        echo '<option value="0">Gauché</option>';
                                        echo '<option value="1" selected>Droitié</option>';
                                    } else {
                                        echo '<option value="0" selected>Gauché</option>';
                                        echo '<option value="1">Droitié</option>';
                                    }
                                    echo '
                                                                               </select>
                                                                               <p id="handednessError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //license number
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Numéro de license :</label>
                                                                               <input type="text" class="form-control"  placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '" id="inputLicenseNumber" name="inputLicenseNumber">
                                                                               <p id="licenseNumberError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //size
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Taille (cm) :</label>
                                                                               <input type="number" min="100" max="250"  class="form-control  "  placeholder="Taille en cm" value="' . $player->getSize() . '" cm" id="inputSize" name="inputSize">
                                                                               <p id="sizeError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //weight
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Poid (kg) :</label>
                                                                               <input type="number" min="40" max="180" class="form-control "  placeholder="Poid en kg" value="' . $player->getWeight() . '" kg" id="inputWeight" name="inputWeight">
                                                                               <p id="weightError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //isSick
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Santé :</label>
                                                                               <select class="form-control" name="inputIsSick" id="inputIsSick">
                                                                           ';
                                    if ($player->getIsSick()) {
                                        echo '<option value="0">En forme</option>';
                                        echo '<option value="1" selected>Malade</option>';
                                    } else {
                                        echo '<option value="0" selected>En forme</option>';
                                        echo '<option value="1">Malade</option>';
                                    }
                                    echo '
                                                                               </select>
                                                                               <p id="isSickError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //isBan
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Bannissement :</label>
                                                                               <select class="form-control" name="inputIsBan" id="inputIsBan">
                                                                           ';
                                    if ($player->getIsBan()) {
                                        echo '<option value="0">En règle</option>';
                                        echo '<option value="1" selected>Exclu</option>';
                                    } else {
                                        echo '<option value="0" selected>En règle</option>';
                                        echo '<option value="1">Exclu</option>';
                                    }
                                    echo '
                                                                               </select>
                                                                               <p id="isBanError" class="text-danger"></p>
                                                                           </div>
                                                                           ';

                                    //isCarpooling
                                    echo '
                                                                           <div class="col-md-12 mt-1">
                                                                               <label class="labels mb-2 mt-2">Coivaturage :</label>
                                                                               <select class="form-control" name="inputIsCarpooling" id="inputIsCarpooling">
                                                                           ';
                                    if ($player->getIsCarpooling()) {
                                        echo '<option value="0">Ne fait pas de covoiturage</option>';
                                        echo '<option value="1" selected>Fait du covoiturage</option>';
                                    } else {
                                        echo '<option value="0" selected>Ne fait pas de covoiturage</option>';
                                        echo '<option value="1">Fait du covoiturage</option>';
                                    }
                                    echo '
                                       </select>
                                        <p id="isCarpoolingError" class="text-danger"></p>
                                       </div>
                                    ';
                                    //staff

                                    // Function
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2">Fonction :</label>
                                        <select name="inputFunction" id="inputFunction" class="form-control">
                                    ';
                                    $resultat = $contProfile->getAllFunction();
                                    foreach ($resultat as $key) {
                                        if ($function->getName() == $key['name']) {
                                            echo '
                                                <option  value="' . $key['id'] . '" selected>' . $key['name'] . '</option>
                                                ';
                                        } else {
                                            echo '
                                                <option  value="' . $key['id'] . '">' . $key['name'] . '</option>
                                                ';
                                        }
                                    }
                                    echo '
                                            </select>
                                            <p id="FunctionStaffError" class="text-danger"></p>
                                        </div>
                                        ';

                                    //Season arrived
                                    echo '
                                        <div class="col-md-12 mt-1">
                                            <label class="labels mb-2 mt-2">Année d\'arrivée :</label>
                                            <input type="date" class="form-control"  placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '" id="inputSeasonArrivedStaff" name="inputSeasonArrivedStaff">
                                            <p id="SeasonArrivedError" class="text-danger"></p>
                                        </div>
                                        ';
                                }
                                ?>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mt-1 text-end">
                                    <button type="submit" class="btn btn-success" id="submitUpdateProfile" formaction="/app/controllers/ProfileUpdateCont.php?<?php isset($_GET['id']) ? print('id=' . $_GET['id']) : print('id=' . $sessionUser->getId()); ?>" formmethod="POST" value="submit">Envoyer</button>
                                </div>
                            </div>
                        </form>
                        <!-- Script to check form -->
                        <script async src="/app/js/checkInputUpdateProfile.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>