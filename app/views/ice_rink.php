<?php

session_start();

require_once("../controllers/isConnect.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <?php require_once("../views/includes/head.php"); ?>

  <title>Patinoires | Redroosters</title>

</head>

<body class="text-center text-light">

  <?php

  //$active = "ice_rink"; //TODO ?(memberlist)
  require_once("../views/includes/header.php");

  ?>

  <h1>Patinoires</h1>

  <!--
    TODO 3 mai
    Modifier pour afficher chaque évènement 
  -->
  <button class="favorite styled" type="button">
    ajouter une patinoire 
</button>
  <table class="table table-bordered">
			<thead>
			<tr>
          <th>nom</th>
          <th>ville</th>
          <th>rue</th>
          <th>code postal</th>
          <th>
            modif
          </th>
				</tr>
			</thead>
			<tbody >		

		<tr>	<!--afficher les données-->
			<td><?php echo $data->name; ?> </td>	<!--name_user-->
			<td><?php echo $data->city; ?> </td>	<!--last_name_user-->
			<td><?php echo $data->street; ?> </td>	<!--email_user-->
			<td><?php echo $data->postalCode; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Modifier <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdate('<?php echo $data->id; ?>','<?php echo $data->name; ?>','<?php echo $data->city; ?>','<?php echo $data->street; ?>','<?php echo $data->postalCode; ?> ');">Actualiser</a></li>
			      <li><a href="#" onclick="delete_ice_rink('<?php echo $data->id; ?>');">Supprimer</a></li>	<!-- pas id_user-->
			    </ul>
			  </div>
			</td>
		</tr>
			</tbody>
		</table>

  <?php require_once("../views/includes/footer.php"); ?>

</body>

</html>