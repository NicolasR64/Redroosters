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
    <?php
        require_once("../controllers/profile.php");
        $contProfile = new Profile();
    ?>
</head>
<body  class="bg-dark text-light">
    <?php
        include('includes/header.php');
    ?>
    <main>
        <?php
        $user = $contProfile->getUserById();
        ?>
        <!-- Profile Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <img class="rounded-circle" src="../../assets/img/avatars/default.jpg" alt="avatars de l'utilisateur" loading="lazy" >
            <p class="mt-2 mb-1"><?php echo $user['lastName']; echo $user['firstName'];?></p>
            <?php
            if(isset($user['function'])){
                echo '
                    <p class="text-white-50">'.$user['function'].'</p>
                ';
            }else{
                echo '
                    <p class="text-white-50">'.$user['position'].'</p>
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
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control" readonly placeholder="Nom" value="<?php echo $user['lastName'] ?>"></div>
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control" readonly placeholder="Prenom" value="<?php echo $user['firstName'] ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control" readonly placeholder="Surnom" value="<?php echo $user['nickName'] ?>"></div>
                        </div>
                        <div class="row mt-3">
                        <?php
                        if(isset($user['function'])){
                            echo '
                            <div class="col-md-12 mt-1"><label class="labels mb-2">Position :</label><input type="text" class="form-control" readonly placeholder="Rôle" value="'.$user['function'].'"></div>
                            ';
                        }else{
                            echo '
                            <div class="col-md-12 mt-1"><label class="labels mb-2">Position :</label><input type="text" class="form-control" readonly placeholder="Rôle" value="'.$user['position'].'"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de maillot :</label><input type="text" class="form-control" readonly placeholder="Numéro de maillot" value="'.$user['jerseyNumber'].'"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Main dominante :</label><input type="text" class="form-control" readonly placeholder="Main dominante" value="'.$user['handedness'].'"></div>
                            ';
                        }
                        ?>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Numéro de license :</label><input type="text" class="form-control" readonly placeholder="Numéro de license" value="<?php echo $user['licenseNumber'] ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail :</label><input type="text" class="form-control" readonly placeholder="E-mail" value="<?php echo $user['mail'] ?>"></div>
                        <?php
                        if(isset($user['parentMail']))
                            echo'
                                <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">E-mail d\'un parent :</label><input type="text" class="form-control" readonly placeholder="E-mail parent" value="'.$user['parentMail'].'"></div>
                            ';
                        ?>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Télephone :</label><input type="text" class="form-control"  readonly placeholder="numéro de gsm" value="<?php echo $user['phone'] ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Date de naissance :</label><input type="text" class="form-control" readonly placeholder="Date de naissance" value="<?php echo $user['dateBirth'] ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Année d'arrivée :</label><input type="text" class="form-control " readonly placeholder="Année d'arrivée" value="<?php echo $user['seasonArrived'] ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Taille (cm) :</label><input type="text" class="form-control  " readonly placeholder="Taille en cm" value="<?php echo $user['size'] ?> cm"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-2">Poid (kg) :</label><input type="text" class="form-control " readonly placeholder="Poid en kg" value="<?php echo $user['weight'] ?> kg"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-end">
                            <?php
                                if($contProfile->isDataUser()){
                                    echo'<a class="btn btn-primary" href="profileManagement.php?id='.$player->getId().'">revenir en arrière</a>';
                                }
                            ?>
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