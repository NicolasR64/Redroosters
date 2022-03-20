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
    <header>

    </header>
    <main>
        <!-- League Header -->
        <div class="mt-4 text-center container-fluid profile-header">
            <h3 class="mt-2 mb-1">U19<!-- <?php echo $leagued->getCategory();?> --></h3>
        </div>
        <!-- League Main -->
        <div class="container rounded mt-2 mb-5">
            <div class="row">
                <div class="col-md-8 border-right mx-auto">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Calendrier</h4>
                        </div>  
                        <table class="table-dark w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
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