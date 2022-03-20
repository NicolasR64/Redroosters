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
        include('includes/header.html');
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
                            <option value="alphabétique" selected>Alphabétique</option>
                            <option value="nbMatchPlayed">Nb match joué</option>
                            <option value="nbPlayerOfTheGame">Nb homme du match</option>
                        </select>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="btn btn-danger">Gerer les joueurs</a>
                    </div>
                </div>
                <!-- Mettre Table -->
            </div>
        </section>
        <!-- main event -->
        <section class="container p-2">
            <h3 class="text-decoration-underline d-inline p-1 rounded" id="event">Event :</h3>
            <div class="row mt-1">
                <div class="col-md-6">
                    <select class="form-select w-25">
                        <option value="recentDate" selected>Date</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="btn btn-danger">Gerer les joueurs</a>
                </div>
            </div>
            <!-- Mettre Table -->
        </section>
        <!-- main league -->
        <section class="container p-2">
            <h3 class="text-decoration-underline d-inline p-1 rounded" id="event">League :</h3>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="btn btn-danger">Gerer la league</a>
                </div>
            </div>
            <!-- Mettre Table -->
        </section>
    </main> 
    <footer>

    </footer>
</body>
</html>