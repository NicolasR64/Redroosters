<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>league - redroosters</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="app/css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body  class="bg-dark text-light">
    <header class="sticky-top">
    <?php
        include('includes/header.php');
    ?>
    </header>
    <?php
        require_once("../controllers/leagueCont.php");
        $leaguecont = new LeagueCont();
        $league = $leaguecont->getCurrentSeason();
    ?>
    <main>
        <!-- League Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <h3 class="mt-2 mb-1">Catégorie <?php echo $league->getCategory();?></h3>
            <p>Saison <?php echo ($league->getSeasonYear()-1) .' - '. $league->getSeasonYear()?></p>
        </div>
        <!-- League Main -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Classement :</h4>
                            <a href="#" class="btn btn-danger">Gerer la league</a>
                        </div>
                        <!-- S'affiche quand breakpoint md -->
                        <div class="table-responsive-sm d-none d-md-block">
                            <table class="table table-hover table-striped w-100 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">GP</th>
                                        <th scope="col">w</th>
                                        <th scope="col">WO</th>
                                        <th scope="col">LO</th>
                                        <th scope="col">L</th>
                                        <th scope="col">Pts</th>
                                        <th scope="col">GF-GA</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td class="text-start">Redroosters</td>
                                        <td>14</td>
                                        <td>12</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>38</td>
                                        <td>87-28</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td class="text-start">Chiefs</td>
                                        <td>12</td>
                                        <td>10</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>32</td>
                                        <td>54-25</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td class="text-start">sharks</td>
                                        <td>12</td>
                                        <td>7</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>24</td>
                                        <td>41-05</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Prochain match :</h4>
                        </div>
                        <!-- Disparait quand breakpoint md -->
                        <div class="d-block d-md-none">
                            <div class="row text-center bg-secondary">
                                <div class="col-12 bg-danger">
                                    <div>MATCH 24</div>
                                </div>
                                <div class="col-12">
                                    <div>Lieu : Charleroi</div>
                                </div>
                                <div class="col-5">
                                    <div>Redroosters</div>
                                </div>
                                <div class="col-2">
                                    <div>-</div>
                                </div>
                                <div class="col-5">
                                    <div>Sharks</div>
                                </div>
                                <div class="col-12">
                                    <div class="list-match-date">25-03-2022 19h30</div>
                                </div>
                            </div>
                        </div>
                        <!-- S'affiche quand breakpoint md -->
                        <div class="table-responsive-sm d-none d-md-block">
                            <table class="table table-hover table-striped test w-100 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                        <th scope="col">Lieu</th>
                                        <th scope="col">Visiteur</th>
                                        <th scope="col">Résident</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark">
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
                </div>
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Ancien match :</h4>
                        </div>
                        <!-- Disparait quand breakpoint md -->

                        <!-- S'affiche quand breakpoint md -->
                        <div class="table-responsive-sm  d-none d-md-block">
                            <table class="table table-hover table-striped test w-100 text-center">
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
                                <tbody class="table-dark">
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
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>