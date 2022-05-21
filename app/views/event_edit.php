<?php
require_once("../controllers/eventEditCont.php");
require_once("../controllers/isConnect.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once("../views/includes/head.php") ?>
    <title>Redroosters</title>
</head>

<body>

    <?php require_once("../views/includes/header.php"); ?>

    <div class="container align-items-center align-middle text-center d-grid col-md-5 mx-auto">
        <form method="POST" class="formEdit" data-bitwarden-watching="1" id="formEventEdit">
            <h1 class="h3 mb-3 font-weight-normal">Modifier évènement</h1>
         
            <label for="inputName">Nom*</label>
            <input type="text" name="inputName" id="inputName" value="<?php echo $event->getName() ?>" class="form-control" autofocus="">

            <label for="inputBeginDate">Date de début*</label>
            <input type="date" name="inputBeginDate" id="inputBeginDate" value="<?php echo $event->getDateBegin() ?>" class="form-control">

            <label for="inputEndDate">Date de fin*</label>
            <input type="date" name="inputEndDate" id="inputEndDate" value="<?php echo $event->getDateEnd() ?>" class="form-control">

            <label for="inputRdvHours">Heure du rendez-vous*</label>
            <input type="time" name="inputRdvHours" id="inputRdvHours" value="<?php echo $event->getRdvHours() ?>" class="form-control">

            <label for="inputRdvDate">Date du rendez-vous*</label>
            <input type="date" name="inputRdvDate" id="inputRdvDate" value="<?php echo $event->getRdvDate() ?>" class="form-control">

            <label for="inputEndHour">Heure de fin*</label>
            <input type="time" name="inputEndHour" id="inputEndHour" value="<?php echo $endhours ?>" class="form-control">

            <label for="inputStreet">Rue de l'évènement*</label>
            <input type="text" name="inputStreet" id="inputStreet" value="<?php echo $event->getRdvStreet() ?>" class="form-control">

            <label for="inputCity">Ville de l'évènement*</label>
            <input type="text" name="inputCity" id="inputCity" value="<?php echo $event->getRdvCity() ?>" class="form-control">

            <label for="inputPostalCode">Code Postal*</label>
            <input type="number" name="inputPostalCode" value="<?php echo $event->getPostalCode() ?>" id="inputPostalCode" class="form-control">

            <label for="inputRdvStreet">Rue de rendez-vous*</label>
            <input type="text" name="inputRdvStreet" id="inputRdvStreet" value="<?php echo $event->getRdvStreet() ?>" class="form-control">

            <label for="inputRdvCity">Ville de rendez-vous*</label>
            <input type="text" name="inputRdvCity" id="inputRdvCity" value="<?php echo $event->getRdvCity() ?>" class="form-control">

            <label for="inputRdvPostalCode">Code postal du rendez-vous*</label>
            <input type="number" name="inputRdvPostalCode" id="inputRdvPostalCode" value="<?php echo $event->getRdvPostalCode() ?>" class="form-control">
            <?php
            
            if ($event->getIsMatch() == 1) {
                
                     echo "<label for=\"inputAdversaire\">Adversaire</label>
                    <select class=\"form-control\" name=\"inputAdversaire\" id=\"inputAdversaire\">";
 
                        foreach ($teamList as $elem) {
                            if($elem->getId() == $oppositeTeam->getId()){
                                echo "<option value=" . $elem->getId() . " selected=\"selected\">" . $elem->getName() . "</option>";
                            }else{
                                echo "<option value=" . $elem->getId() . " >" . $elem->getName() . "</option>";
                            }
                        }

                    echo "</select></br>";

                    echo '
                    <label for="inputLieu">Lieu de l\'affrontement</label>
                    <select class="form-control" name="inputLieu" id="inputLieu">
                    ';
                    foreach ($iceRinkList as $elem) {
                        if($elem->getId() == $iceRink->getId()){
                            echo "<option value=" . $elem->getId() . " selected=\"selected\">" . $elem->getName() . "</option>";
                        }else{
                            echo "<option value=" . $elem->getId() . ">" . $elem->getName() . "</option>";
                        }
                    }
                    echo "</select></br>";

                    echo '<label for="inputAmi">Rencontre amicale?</label>
                    <input type="checkbox" name="inputAmi" id="inputAmi" class="form-check" value="oui" checked="(($match->getIsAmical() == 0) ? \'\' :\'checked="checked"\'>
                    
                    <label for="inputVisitor">Sommes-nous les visiteurs?</label>
                    <input type="checkbox" name="inputVisitor" id="inputVisitor" class="form-check" value="oui" checked="(($match->getIsVisitor() == 0) ? \'\' :\'"checked"\')">
                    ';
            }
            ?>
            <textarea for="inputDescription" name="inputDescription" id="inputDescription"><?php echo $event->getDescription() ?></textarea>
            <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" name="form-event" id="submitButton" value="form-event">Appliquer changements</button>
        </form>
    </div>
    <?php if(!empty( $_SESSION['error']) || isset( $_SESSION['error'])){
        echo  $_SESSION['error'];
    }?>
    <?php require_once("../views/includes/footer.php"); ?>
</body>

</html>