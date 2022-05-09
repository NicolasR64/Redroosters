<?php

session_start();

require_once("../views/includes/head.php");

require_once("../controllers/eventListCont.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <?php require_once("../views/includes/head.php"); ?>

    <title>Evénements | Redroosters</title>

</head>

<body>

    <?php
    $active = "events";
    require_once("../views/includes/header.php"); ?>

    <div class="container align-items-center align-middle d-grid mx-auto w-100 vh-100 text-center">

        <h2>Liste des évènements à venir</h2>

        <?php
        if (!isset($upcomingEvents) || $upcomingEvents == "" || $upcomingEvents == array()) {
        ?>

            <span>
                Il n'y a pas d'évènements à afficher
            </span>

        <?php
        } else {
        ?>

            <div class="event-brick-grid">

                <?php
                foreach ($upcomingEvents as $elem) {
                ?>

                    <a href="/event/<?php echo $elem->getId(); ?>" class="event-brick-cell">
                        <h2><?php echo $elem->getName(); ?></h2>
                        <span class="date">Le <?php echo $elem->getDateBegin(); ?> à&nbsp;<?php echo $elem->getRdvHours(); ?></span>
                        <span class="address">
                            <?php echo $elem->getStreet(); ?>
                            <br /><?php echo $elem->getPostalCode(); ?> - <?php echo $elem->getCity(); ?>
                        </span>
                        <span class="time-left">
                            Dans <?php echo calculateDays($elem->getDateBegin()); ?>
                        </span>
                    </a>

                <?php
                }
                ?>

            </div>

        <?php
        }
        ?>

        <h2>Liste des évènements passés</h2>

        <?php
        if (!isset($pastEvents) || $pastEvents == "" || $pastEvents == array()) {
        ?>
            <span>
                Il n'y a pas d'évènements à afficher
            </span>

        <?php
        } else {
        ?>

            <div class="event-brick-grid">

                <?php
                foreach ($pastEvents as $elem) {
                ?>

                    <a href="/event/<?php echo $elem->getId(); ?>" class="event-brick-cell">
                        <h2><?php echo $elem->getName(); ?></h2>
                        <span class="date">Le <?php echo $elem->getDateBegin(); ?> à&nbsp;<?php echo $elem->getRdvHours(); ?></span>
                        <span class="address">
                            <?php echo $elem->getStreet(); ?>
                            <br /><?php echo $elem->getPostalCode(); ?> - <?php echo $elem->getCity(); ?>
                        </span>
                        <span class="time-left">
                            <?php echo "Il y a " . calculateDays($elem->getDateBegin()); ?>
                        </span>
                    </a>

                <?php
                }
                ?>

            </div>

        <?php
        }
        ?>
    </div>

    <?php 
    if($user->getIsAdmin() == 1){
        echo "<a href=\"event/post\" rel=\"nofollow\" class=\"btn-fixed\" title=\"Ajouter un évènement\"><i class=\"fa-solid fa-calendar-plus\"></i></a>";
    }
    require_once("../views/includes/footer.php"); 
    ?>

</body>
</html>