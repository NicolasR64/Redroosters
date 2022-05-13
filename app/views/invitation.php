<?php
    session_start();
    require_once("../controllers/invitationCont.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require_once("../views/includes/head.php")?>
        <script src="../js/checkAllInv.js" async></script>
        <title>Redroosters</title>
    </head>
    <body class="text-center text-light">
        <?php require_once("../views/includes/header.php");?>
        <?php
            if($done == 0){
        ?>
            <div class="container align-items-center align-middle text-center d-grid mx-auto w-100 vh-100">
                <form class="form-listPlayer" data-bitwarden-watching="1" method="post" name="inv" id="inv">
                    <div class="d-flex d-md-row listPlayerContainer">
                    <?php
                    if(!empty($joueurs)) { 
                        foreach($joueurs as $row) {
                    ?>
                        <div class="border-end border-bottom border-top border-2 rounded listPlayer">
                            <div class="border-start border-danger border-5 rounded">
                                <div>
                                    <?php echo $row->getFirstName() . " " . $row->getLastName(); ?>
                                </div>
                                <div>
                                    <?php 
                                        echo 'Position : '.$row->getPlayer();
                                        echo'<br>';
                                        echo 'Fonction : '.$row->getStaff(); 
                                    ?>
                                </div>
                                <input type="checkbox" name="invite[]" value=<?php echo $row->getId(); ?>>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                    </div>
                    <input type="checkbox" id="all">Inviter tous les joueurs
                    <br>
                    <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-50 w-md-25" type="submit" id="invButton"name="invit" value="inv">Inviter</button>
                </form>
            </div>
        <?php } 
            if ($done == 1){
        ?>
            <h2 class="w-25">Invitations envoyées&nbsp;!</h2>
                <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-25" href="/events">Liste évènement</a>
        <?php } ?>
        <?php require_once("../views/includes/footer.php"); ?>
    </body>
</html>