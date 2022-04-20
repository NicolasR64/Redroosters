<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once("../views/includes/head.php")?>
    <script src="/app/js/checkButtonStatus.js" async></script>
    <title>Redroosters</title>
</head>
<body>

<?php require_once("../views/includes/header.php");?>

<h1 class="h3 mb-3 font-weight-normal text-center">Liste des évènements à venir</h1>

<div class ="event-block align-middle mx-auto">
    <span class="title">Match de hockey<br></span>
    <div class ="text-flex-row">
        <div class="text-flex-column-first">
             <br>
                <div class="informations">
                 <div class="dateHeure">13/08</div>
                <div class="heure">10H</div>
                <div class="minutes">08</div>
            </div>
        </div>   
        <div class="text-flex-column"> 
            <div class="adresse">Rue de Linux, 6666 TuxCity</div>
             <div class="timeLeft">Dans 7 jours</div><br>
             <button class="btn btn-danger" id="btn">Absent</button><br>
        </div>
    </div>
</div>
<br><br>
<h1 class="h3 mb-3 font-weight-normal text-center">Liste des évènements passés</h1>
</div>
<?php require_once("../views/includes/footer.php");?>
</body>
</html>