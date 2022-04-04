<?php
session_start();
$_SESSION['id'] = '1';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile gestion - redroosters</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="app/css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    require_once("../controllers/ProfileCont.php");
    $contProfile = new ProfileCont();
    $user = $contProfile->getUser();
    // ($user->getId() != unserialize($_SESSION['user']->getId()) ) && (unserialize($_SESSION['user']->getIsAdmin()) == 0)
    if(($user->getId() != $_SESSION['id']) && ($_SESSION['admin'] == 0)){
      /* si on arrive ici, la personne n'as pas l'autorisation */
      header('profile.php');
    }
    if ($user->getIsStaff()) {
        $staff = $contProfile->getStaffById($user->getId());
        $function = $contProfile->getFunctionStaff($staff->getIdFunction());
    } else if ($user->getIsPlayer()) {
        $player =  $contProfile->getPlayerById($user->getId());
        $position = $contProfile->getPositionPlayer($player->getIdPosition());
    }
    ?>
</head>
<body>
    <?php
    include('includes/header.php');
    ?>
    <main>
        <!-- Profile Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <img class="rounded-circle" src="../../assets/img/avatars/default.jpg" alt="avatars de l'utilisateur" loading="lazy">
            <p class="mt-2 mb-1"><?php echo $user->getFirstname();
                                    echo ' ' . $user->getLastName(); ?></p>
            <?php
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
        <!-- Profile Main -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-5 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Mise à jours de votre profil</h4>
                        </div>
                        <form id="updtP">
                          <div class="row mt-2">
                              <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control"  placeholder="Nom" value="<?php echo $user->getLastName() ?>" id="inputLastName"></div>
                              <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control"  placeholder="Prenom" value="<?php echo $user->getFirstName() ?>" id="inputFirstName"></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control"  placeholder="Surnom" value="<?php echo $user->getNickname() ?>" id="inputNickName"></div>
                          </div>
                          <div class="row mt-3">
                              <form id="updateProfileForm">
                              <?php
                              if ($user->getIsStaff()) {
                                  echo '
                              <div class="col-md-12 mt-1"><label class="labels mb-2">Fonction :</label><input type="text" class="form-control"  placeholder="Rôle" value="' . $function->getName() . '" id="inputFunction"></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="text" class="form-control "  placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '" id="inputSeasonArrivedStaff"></div>
                              ';
                              } else {
                                echo '
                                <div class="col-md-12 mt-1"><label class="labels mb-2">Position :</label><input type="text" class="form-control"  placeholder="Rôle" value="' . $position->getName() . '" id="inputPosition"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de maillot :</label><input type="number" min="01" max="99" class="form-control"  placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '" id="inputJerseyNumber"></div>
                                ';
                                if($player->getHandedness()){
                                    echo '
                                    <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control"  placeholder="Main dominante" value="Droitié"></div>
                                    <input type="hidden" class="form-control"  placeholder="Main dominante" value="Droitié" id="inputHandedness">
                                    ';
                                }else{
                                    echo '
                                    <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control"  placeholder="Main dominante" value="Gauché" id="inputHandedness">Gauché</div>
                                    ';
                                }
                                echo'
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="text" class="form-control "  placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '" id="inputSeasonArrivedPlayer"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de license :</label><input type="text" class="form-control"  placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '" id="inputLicenseNumber"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Taille (cm) :</label><input type="text" class="form-control  "  placeholder="Taille en cm" value="' . $player->getSize() . ' cm" id="inputSize"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Poid (kg) :</label><input type="text" class="form-control "  placeholder="Poid en kg" value="' . $player->getWeight() . ' kg" id="inputWeight"></div>
                                ';
                              }
                              ?>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control"  placeholder="E-mail" value="<?php echo $user->getMail() ?>" id="inputMail"></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control"  placeholder="E-mail d'urgence" value="<?php echo $user->getEmergencyMail() ?>" id="inputEmergencyMail"></div>
                              
                              <?php
                              echo '
                                  <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d\'un parent :</label><input type="text" class="form-control"  placeholder="E-mail parent" value="' . $user->getParentMail() . '" id="inputParentMail"></div>
                              ';
                              ?>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Télephone :</label><input type="text" class="form-control"  placeholder="numéro de gsm" value="<?php echo $user->getPhone() ?>" id="inputPhone></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Date de naissance :</label><input type="date" class="form-control"  placeholder="Date de naissance" value="<?php echo $user->getDateBirth() ?>" id="inputDateBirth"></div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12 mt-1 text-end"><button type="submit" class="btn btn-danger" formaction="<?php isset($_GET['id']) ? print('#?id='.$_GET['id']) : print('#?id='.$_SESSION['id']); ?>" formmethod="POST" value="submit">Envoyer</button>
                          </div>
                        </form>
                        <div class=" d-flex justify-content-end mt-3">
                            <a class="btn btn-primary" href="homePage.php">revenir en arrière</a>
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