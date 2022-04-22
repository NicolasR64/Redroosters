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
    if(($user->getId() != unserialize($_SESSION['user']->getId()) ) && (unserialize($_SESSION['user']->getIsAdmin()) == 0)){
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
                        <?php
                            if(isset($_GET['error']) && $_GET['error'] == true){
                                echo'<p class="text-danger">Erreur dans le formulaire!</p>';
                            }
                            ?>
                        <script async src="app/js/checkInputUpdateProfile.js"></script>
                        <form id="updtP">
                          <div class="row mt-2">
                              <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control"  placeholder="Nom" value="<?php echo $user->getLastName() ?>" id="inputLastName" name="inputLastName" ></div>
                              <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control"  placeholder="Prenom" value="<?php echo $user->getFirstName() ?>" id="inputFirstName" name="inputFirstName" ></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control"  placeholder="Surnom" value="<?php echo $user->getNickname() ?>" id="inputNickName" name="inputNickName" ></div>
                          </div>
                          <div class="row mt-3">
                              <form id="updateProfileForm">
                              <?php
                              if ($user->getIsStaff()) {
                                echo '
                                <div class="col-md-12 mt-1">
                                    <label class="labels mb-2">Fonction :</label>
                                    <select name="inputFunction" id="inputFunction" class="form-control">
                                ';
                                $resultat = $contProfile->getAllFunction();
                                foreach($resultat as $key){
                                    if($function->getName() == $key['name']){
                                        echo '
                                            <option  value="' . $key['name'] . '" selected>' . $key['name'] . '</option>
                                        ';
                                    }else{
                                        echo '
                                            <option  value="' . $key['name'] . '">' . $key['name'] . '</option>
                                        ';
                                    }
                                }
                                echo'
                                    </select>
                                </div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="date" class="form-control"  placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '" id="inputSeasonArrivedStaff" name="inputSeasonArrivedStaff"></div>
                                ';
                              } else {
                                  /* La classe form-control ne marche pas jsp pk */
                                echo'
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-1">Position :</label>
                                    <select  class="from-control" name="inputPosition" id="inputPosition">
                                ';
                                $resultat = $contProfile->getAllPositions();
                                foreach($resultat as $key){
                                    if($position->getName() == $key['name']){
                                        echo '
                                            <option  value="' . $key['name'] . '" selected>' . $key['name'] . '</option>
                                        ';
                                    }else{
                                        echo '
                                            <option  value="' . $key['name'] . '">' . $key['name'] . '</option>
                                        ';
                                    }
                                }
                                echo'
                                    </select>
                                </div>
                                ';
                                echo '
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de maillot :</label><input type="number" min="01" max="99" class="form-control"  placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '" id="inputJerseyNumber" name="inputJerseyNumber"></div>
                                ';
                                if($player->getHandedness()){
                                    echo '
                                    <div class="col-md-12 mt-1">
                                        <label class="labels mb-2 mt-2">Main dominante :</label>
                                        <select class="form-control" name="inputHandedness" id="inputHandedness">
                                        ';
                                    if($player->getHandedness()){
                                        echo '<option value="0">Gauché</option>';
                                        echo '<option value="1" selected>Droitié</option>';
                                    }else{
                                        echo '<option value="0" selected>Gauché</option>';
                                        echo '<option value="1">Droitié</option>';
                                    }
                                    echo'
                                        </select>
                                    </div>
                                    <input type="hidden" class="form-control" placeholder="Main dominante" value="Droitié" id="inputHandedness">
                                    ';
                                }
                                echo'
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="date" class="form-control "  placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '" id="inputSeasonArrivedPlayer" name="inputSeasonArrivedPlayer"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de license :</label><input type="text" class="form-control"  placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '" id="inputLicenseNumber" name="inputLicenseNumber"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Taille (cm) :</label><input type="number" min="100" max="250"  class="form-control  "  placeholder="Taille en cm" value="' . $player->getSize() .'" cm" id="inputSize" name="inputSize"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Poid (kg) :</label><input type="number" min="40" max="180" class="form-control "  placeholder="Poid en kg" value="' . $player->getWeight() . '" kg" id="inputWeight" name="inputWeight"></div>
                                ';
                              }
                              ?>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control"  placeholder="E-mail" value="<?php echo $user->getMail() ?>" id="inputMail" name="inputMail"></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d'urgence :</label><input type="text" class="form-control"  placeholder="E-mail d'urgence" value="<?php echo $user->getEmergencyMail() ?>" id="inputEmergencyMail" name="inputEmergencyMail"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d'un parent :</label><input type="text" class="form-control"  placeholder="E-mail parent" value="<?php echo $user->getParentMail() ?>" id="inputParentMail" name="inputParentMail"></div>

                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Télephone :</label><input type="text" class="form-control"  placeholder="numéro de gsm" value="<?php echo $user->getPhone() ?>" id="inputPhone" name="inputPhone"></div>
                              <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Date de naissance :</label><input type="date" class="form-control"  placeholder="Date de naissance" value="<?php echo $user->getDateBirth() ?>" id="inputDateBirth" name="inputDateBirth"></div>
                              <?php
                                if(isset($_GET['id'])){
                                    echo'<input type="hidden" name="id" value="'.$_GET['id'].'">';
                                }else{
                                    echo'<input type="hidden" name="id" value="'.$_SESSION['id'].'">';
                                }
                              ?>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12 mt-1 text-end"><button type="submit" class="btn btn-danger" id="submitUpdateProfile" formaction="app/controllers/ProfileUpdateCont.php?<?php isset($_GET['id']) ? print('id='.$_GET['id']) : print('id='.$_SESSION['id']); ?>" formmethod="POST" value="submit">Envoyer</button>
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
    <?php require_once("../views/includes/footer.php");?>
</body>

</html>