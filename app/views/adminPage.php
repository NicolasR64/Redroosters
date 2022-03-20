<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page d'administration de l'application redroosters">

    <title>AdminPage - redroosters</title>

    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">
    <header>
    <?php
        include('includes/header.php');
    ?>
    </header>
    <main class="container-fluid">
        <!-- main header -->
        <header class="container">
            <a class="btn btn-danger" href="#player">Player</a>
            <a class="btn btn-danger" href="#event">Event</a>
            <a class="btn btn-danger" href="#league">League</a>
        </header>
        <!-- main player -->
        <section class="container mt-4">
            <!-- title -->
            <div class="text-center container">
                <h3 class="text-decoration-underline d-inline p-1 rounded" id="player">Player :</h3>
            </div>
            <div class="container p-2">
                <label for="sortBy">Trier par :</label>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <select class="form-select w-25">
                            <option value="#" selected>Alphabétique</option>
                            <option value="#">Nb match joué</option>
                            <option value="#">Nb homme du match</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="btn btn-danger">Gerer les joueurs</a>
                    </div>
                </div>
                    <table class="table table-dark text-center w-100 table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nom complet</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Num maillot</th>
                                <th scope="col">Num license</th>
                                <th scope="col">Nb homme match</th>
                                <th scope="col">Nb match joué</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="#" class="text-danger">Ravaux Nicolas</a></th>
                                <td>Joueur</td>
                                <td>Gardien</td>
                                <td>64</td>
                                <td>15142845</td>
                                <td>5</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#" class="text-danger">Ravaux Nicolas</a></th>
                                <td>staff</td>
                                <td>coach</td>
                                <td>-</td>
                                <td>15142845</td>
                                <td>-</td>
                                <td>20</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </section>
        <!-- main event -->
        <section class="container mt-4">
            <!-- title -->
            <div class="text-center container">
                <h3 class="text-decoration-underline d-inline p-1 rounded" id="player">Evenement :</h3>
            </div>
            <div class="container p-2">
                <label for="sortBy">Trier par :</label>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <select class="form-select w-25">
                            <option value="#" selected>Date la plus récente</option>
                            <option value="#">Date la plus ancienne</option>
                            <option value="#">Nb homme du match</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="btn btn-danger">Gerer les évènements</a>
                    </div>
                </div>
                    <table class="table table-dark text-center w-100 table-striped mt-3" id="event">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Type</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="#" class="text-danger">15</a></th>
                                <td>25-05-22</td>
                                <td>22h30</td>
                                <td>Match</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#" class="text-danger">14</a></th>
                                <td>24-04-22</td>
                                <td>19h30</td>
                                <td>Autre</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </section>
        <!-- main league -->
        <section class="container mt-4">
            <!-- title -->
            <div class="text-center container">
                <h3 class="text-decoration-underline d-inline p-1 rounded" id="player">League :</h3>
            </div>
            <div class="container p-2">
                    <div class="col-12 text-md-end">
                        <a href="#" class="btn btn-danger">Gerer la league</a>
                    </div>
                </div>
                <table class="table table-dark text-center w-100 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Bulldogs</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Shark</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main> 
    <footer>

    </footer>
</body>
</html>