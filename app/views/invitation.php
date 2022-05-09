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
                <form class="form-signin" data-bitwarden-watching="1" method="post" name="inv" id="inv">
                    <table>
                        <thead>
                            <tr>
                                <th>Joueur</th>
                                <th>Position</th>
                                <th>Fonction</th>
                                <th>Invité?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($joueurs)) { 
                                    foreach($joueurs as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row->getFirstName() . " " . $row->getLastName(); ?></td>
                                    <td><?php echo $row->getPlayer(); ?></td>
                                    <td><?php echo $row->getStaff(); ?></td>
                                    <td><input type="checkbox" name="invite[]" value=<?php echo $row->getId(); ?>></td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"><input type="checkbox" id="all">Inviter tous les joueurs</td>
                            </tr>    
                        </tfoot>
                    </table>
                    <button class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" type="submit" id="invButton"name="invit" value="inv">Inviter</button>
                </form>
            </div>
        <?php } 
            if ($done == 1){
        ?>
            <h2>Invitations envoyées&nbsp;!</h2>
                <a class="btn btn-lg btn-primary btn-block mt-1 mb-2 w-100" href="/home">Accueil</a>
        <?php } ?>
    </body>
</html>