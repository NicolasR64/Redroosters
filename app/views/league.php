<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>league - redroosters</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body  class="bg-dark text-light">
    <header class="sticky-top">
    <?php
        include('includes/header.php');
    ?>
    </header>
    <main>
        <!-- League Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <h3 class="mt-2 mb-1">U19<!-- <?php //echo $leagued->getCategory();?> --></h3>
        </div>
        <!-- League Main -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Prochain match :</h4>
                        </div>  
                        <table class="table table-dark text-center w-100 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Lieu</th>
                                    <th scope="col">Visiteur</th>
                                    <th scope="col">Résident</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">25-03-22</th>
                                    <td>19h30</td>
                                    <td>Charleroi</td>
                                    <td>Shark</td>
                                    <td>Redroosters</td>
                                </tr>
                                <tr>
                                    <th scope="row">31-03-22</th>
                                    <td>22h30</td>
                                    <td>Malinne</td>
                                    <td>Redroosters</td>
                                    <td>Shark</td>
                                </tr>
                                <tr>
                                    <th scope="row">14-04-22</th>
                                    <td>19h30</td>
                                    <td>Charleroi</td>
                                    <td>Bulldogs</td>
                                    <td>Redroosters</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Ancien match :</h4>
                        </div>  
                        <table class="table table-dark text-center w-100 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Lieu</th>
                                    <th scope="col">Visiteur</th>
                                    <th scope="col">Résident</th>
                                    <th scope="col">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">05-03-22</th>
                                    <td>19h30</td>
                                    <td>Charleroi</td>
                                    <td class="text-success">Shark</td>
                                    <td class="text-danger">Redroosters</td>
                                    <td><span class="text-success">4</span> - <span class="text-danger">3</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">24-02-22</th>
                                    <td>22h30</td>
                                    <td>Malinne</td>
                                    <td class="text-success">Redroosters</td>
                                    <td class="text-danger">Shark</td>
                                    <td><span class="text-success">7</span> - <span class="text-danger">2</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">15-02-22</th>
                                    <td>19h30</td>
                                    <td>Charleroi</td>
                                    <td class="text-danger">Bulldogs</td>
                                    <td class="text-success">Redroosters</td>
                                    <td><span class="text-danger">0</span> - <span class="text-success">9</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           <!--  <div class="row">
                <div class="col-md-5 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Classement</h4>
                        </div>      
                        <div class="row mt-2">
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Nom :</label><input type="text" class="form-control" readonly placeholder="Nom" value="<?php echo $player->getLastname() ?>"></div>
                            <div class="col-md-6 mt-1"><label class="labels mb-2 mt-sm-2">Prénom :</label><input type="text" class="form-control" readonly placeholder="Prenom" value="<?php echo $player->getFirstname() ?>"></div>
                            <div class="col-md-12 mt-1"><label class="labels mb-2 mt-sm-2">Surnom :</label><input type="text" class="form-control" readonly placeholder="Surnom" value="<?php echo $player->getNickname() ?>"></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>