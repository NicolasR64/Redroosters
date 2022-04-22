<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once("../views/includes/head.php");
          require_once("../controllers/eventListCont.php");
    ?>
    <script src="/app/js/checkButtonStatus.js" async></script>
    <title>Redroosters</title>
</head>
<body>

<?php require_once("../views/includes/header.php");?>

<h1 class="h3 mb-3 font-weight-normal text-center">Liste des évènements à venir</h1>

<?php
if(!isset($upcomingEvents) || $upcomingEvents == "" || $upcomingEvents == Array()){
    echo "<div class='text-center'>Il n'y a pas d'évènements à afficher</div><br>";
}else{
foreach($upcomingEvents as $elem){
    echo "<div class ='event-block align-middle mx-auto'>";
    echo "<span class='title'>".$elem->getName()."<br></span>";
?>
    <div class ="text-flex-row">
        <div class="text-flex-column-first">
                <div class="informations">
                <?php
                echo "<div class='dateHeure'>".$elem->getDateBegin()."</div>";
                ?>
                <div class="heure">10H</div>
                <div class="minutes">08</div>
            </div>
        </div>   
        <div class="text-flex-column"> 
            <?php
            echo "<div class='adresse'>".$elem->getStreet().", ".$elem->getPostalCode()." ".$elem->getCity()."</div>";
            echo "<div class='timeLeft'>Dans ".calculateDays($elem->getDateBegin())."</div><br>";
            ?>
        </div>
    </div>
</div>
<?php
} 
}
?>
<br>
<h1 class="h3 mb-3 font-weight-normal text-center">Liste des évènements passés</h1>

<?php
if(!isset($pastEvents) || $pastEvents == "" || $pastEvents == Array()){
    echo "<div class='text-center'>Il n'y a pas d'évènements à afficher</div><br>";
}else{

foreach($pastEvents as $elem){
    echo "<div class ='event-block align-middle mx-auto'>";
    echo "<span class='title'>".$elem->getName()."<br></span>";
?>
    <div class ="text-flex-row">
        <div class="text-flex-column-first">
             <br>
                <div class="informations">
                <?php
                echo "<div class='dateHeure'>".$elem->getDateBegin()."</div>";
                ?>
                <div class="heure">10H</div>
                <div class="minutes">08</div>
            </div>
        </div>   
        <div class="text-flex-column"> 
            <?php
            echo "<div class='adresse'>".$elem->getStreet().", ".$elem->getPostalCode()." ".$elem->getCity()."</div>";
            ?>
        </div>
    </div>
</div>
<br>
<?php
} 
}
?>
</div>
<?php require_once("../views/includes/footer.php");?>
</body>
</html>