<?php
session_start();
// à retirer quand test fini
$_SESSION['id'] = "1";
$_SESSION['admin'] = "0";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile - redroosters</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="app/css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    //récupération des variables de sessions :


    require_once("../controllers/ProfileCont.php");
    $contProfile = new ProfileCont();
    $user = $contProfile->getUser();
    if($user->getIsPlayer() == 1){
        //c'est un joueur
        $player = $contProfile->getPlayerById($user->getId());
        $position = $player->getPosition($player->getIdPosition());
    }else{
        //c'est un staff
        $staff = $contProfile->getStaffById($user->getId());
        $function = $staff->getFunction($staff->getIdFunction());        
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
            <p class="mt-2 mb-1"><?php echo $user->getFirstname(). ' '; 
                                    echo $user->getLastName(); ?></p>
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
                            <h4 class="text-right">Informations générales</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control" readonly placeholder="Nom" value="<?php echo $user->getLastName() ?>"></div>
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control" readonly placeholder="Prenom" value="<?php echo $user->getFirstName() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control" readonly placeholder="Surnom" value="<?php echo $user->getNickname() ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <form action="" method="POST">
                            <?php
                            if ($user->getIsStaff()) {
                            echo '
                                <div class="col-md-12 mt-1"><label class="labels mb-2">Fonction :</label><input type="text" class="form-control" readonly placeholder="Rôle" value="' . $function->getName() . '"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="text" class="form-control " readonly placeholder="Année d\'arrivée" value="' . $staff->getSeasonArrived() . '"></div>
                            ';
                            } else {
                                echo '
                                <div class="col-md-12 mt-1"><label class="labels mb-2">Position :</label><input type="text" class="form-control" readonly placeholder="Rôle" value="' . $position->getName() . '"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de maillot :</label><input type="text" class="form-control" readonly placeholder="Numéro de maillot" value="' . $player->getJerseyNumber() . '"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d\'arrivée :</label><input type="text" class="form-control " readonly placeholder="Année d\'arrivée" value="' . $player->getSeasonArrived() . '"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de license :</label><input type="text" class="form-control" readonly placeholder="Numéro de license" value="' . $player->getLicenseNumber() . '"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Taille (cm) :</label><input type="text" class="form-control  " readonly placeholder="Taille en cm" value="' . $player->getSize() . ' cm"></div>
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Poid (kg) :</label><input type="text" class="form-control " readonly placeholder="Poid en kg" value="' . $player->getWeight() . ' kg"></div>
                                ';
                                if($player->getHandedness()){
                                    echo '
                                    <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control" readonly placeholder="Main dominante" value="Droitié"></div>
                                    ';
                                }else{
                                    echo '
                                    <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control" readonly placeholder="Main dominante" value="Gauché"></div>
                                    ';
                                }
                            }
                            ?>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control" readonly placeholder="E-mail" value="<?php echo $user->getMail() ?>"></div>
                            <?php
                            echo '
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d\'un parent :</label><input type="text" class="form-control" readonly placeholder="E-mail parent" value="' . $user->getParentMail() . '"></div>
                            ';
                            ?>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Télephone :</label><input type="text" class="form-control" readonly placeholder="numéro de gsm" value="<?php echo $user->getPhone() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Date de naissance :</label><input type="text" class="form-control" readonly placeholder="Date de naissance" value="<?php echo $user->getDateBirth() ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-end">
                                <?php
                                /* 
                                    A mettre quand test terminés
                                    unserialize($_SESSION['user]->getIsAdmin()) || ( $user->getId() == unserialize($_SSESSION['user']->getId()) ) )
                                */
                                if (($user->getId() == $_SESSION['id']) || ($_SESSION['admin'])) {
                                    echo '<a class="btn btn-danger" href="profileManagement">Modifier son profil</a>';
                                }
                                ?>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <a class="btn btn-primary" href="homePage">revenir en arrière</a>
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