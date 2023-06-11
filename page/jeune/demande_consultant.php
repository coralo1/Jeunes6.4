<?php require("jeune.class.php") ?>
<?php

session_start();
if ($_SESSION["usertype"] != "J") {
	header("Location:../login/login.php");
}

/* load references */
$data = array("user" => $_SESSION["userID"]);
$refs = new loadRefs($data);


if (isset($_POST["submit"]) && !isset($_POST["ref_select"])) { /* if you  submit without selecting a single reference */
	$errorcons = "Veuillez sélectionner au moins une référence";
} elseif (isset($_POST["submit"]) && isset($_POST["ref_select"])) { /*submit with atleast one reference */
	$data = array("user" => $_SESSION["userID"], "mail_cons" => $_POST["mail_cons"], "ref_array" => $_POST["ref_select"], "refs" => $_SESSION["confirmed"], "firstname" => $_SESSION["firstname"], "lastname" => $_SESSION["lastname"]); /* data array for the class function */
	$request = new requestCons($data);
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/style_jeune3.css">
	<!-- <script src="../../js/jquery-3.7.0.min.js"></script>
	<script src="../../js/jeune.js" async></script> -->
	<title>Demande de consultation</title>
</head>

<body>

	<header>
		<img src="../../ressources/img/LOGOS_JEUNES_6_4.svg" alt="Logo Jeunes6.4">
		<div id="haut_page-container">
			<span id="nom_page-container">
		<h1>JEUNE</h1>
			</span>
			<span id="texte_haut-container">
		<p>Je donne de la valeur à mon engagement</p>
			</span>
		</div>
	</header>

	<!-- Nav barre principale -->
	<nav id="nav_p-container">
		<a href="../jeune/jeune.php" class="nav_p-element">JEUNE</a>
		<a href="../login/login.php" class="nav_p-element">RÉFÉRENT</a>
		<a href="../login/login.php" class="nav_p-element">CONSULTANT</a>
		<a href="../partenaires/partenaires.html" class="nav_p-element">PARTENAIRES</a>
		<a href="../accueil/accueil2.php" class="nav_p-element">ACCUEIL</a>
	</nav>


	<!-- Nav barre du jeune -->
	<nav id="nav_s-container">
		<a href="jeune.php" class="nav_s-element">Demande de référence</a>
		<a href="consultation_ref.php" class="nav_s-element">Mes références</a>
		<a href="demande_consultant.php" class="nav_s-element">Demande de consultation</a>
	</nav>

	<p id="description-page">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>



	<div id="elements-container">

	<form action="" method="post">


			<p id="selection_ref-texte">1 : Je sélectionne mes références</p>
			<?php
		$i = -1;
		foreach ($_SESSION["confirmed"] as $confirmed) { /* displays multiple time for each reference */
			$i++;
		?>
			<section id="form_checkbox-container">
			
				
				<section id="selection_ref">

		

					
					<legend><input type="checkbox" id="ref<?php echo ($i + 1) ?>" name="ref_select[]" value="<?php echo ($i - 1) ?>"><?php echo ($i + 1) ?>: </legend>

							<label for="lastname">Nom :</label>
							<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["confirmed"][$i]["lastname"] ?>" readonly> <br>
					
							<label for="firstname">Prénom :</label>
							<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["confirmed"][$i]["firstname"] ?>" readonly> <br>
					
							<label for="birthdate">Date de naissance :</label>
							<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["confirmed"][$i]["birthdate"] ?>" readonly> <br>
					
							<label for="mail">Mail : </label>
							<input type="email" name="mail" id="mail" value="<?php echo $_SESSION["confirmed"][$i]["mail"] ?>" readonly> <br>
					
							<label for="comment">Présentation : </label>
					<textarea name="comment" id="comment" cols="1" rows="3" readonly><?php echo  $_SESSION["confirmed"][$i]["presentation"] ?></textarea> <br>
					
							<label for="comment">Commentaires du référent : </label>
					<textarea name="comment" id="comment" cols="1" rows="3" readonly><?php echo  $_SESSION["confirmed"][$i]["comment"] ?></textarea> <br>
					
							<label for="length">Durée :</label>
							<input type="text" name="length" id="length" value="<?php echo $_SESSION["confirmed"][$i]["length"] ?>" readonly> <br>

				</section>
								

							<section id="checkbox-container">

					<table id="table-checkbox">

						<legend>Ses savoirs-être</legend>

									<thead>
										<tr>
											<td>Je confirme sa/son...</td>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>
												<input type="checkbox" name="ponctuel" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["ponctuel"]) {
																																										echo "checked";
																																									}; ?>>
												Ponctualité <br>
												<input type="checkbox" name="confiant" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["confiant"]) {
																																										echo "checked";
																																									} ?>>
												Confiance <br>
												<input type="checkbox" name="serieux" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["serieux"]) {
																																										echo "checked";
																																									} ?>>
												Sérieux<br>
												<input type="checkbox" name="honnete" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["honnete"]) {
																																										echo "checked";
																																									} ?>>
												Honnêteté <br>
												<input type="checkbox" name="tolerant" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["tolerant"]) {
																																										echo "checked";
																																									} ?>>
												Tolérance <br>
												<input type="checkbox" name="bienveillant" value="1" disabled <?php
																																											if ($_SESSION["confirmed"][$i]["savoirs"]["bienveillant"]) {
																																												echo "checked";
																																											} ?>>
												Bienveillance <br>
												<input type="checkbox" name="respect" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["respect"]) {
																																										echo "checked";
																																									} ?>>
												Respect <br>
												<input type="checkbox" name="juste" value="1" disabled <?php
																																								if ($_SESSION["confirmed"][$i]["savoirs"]["juste"]) {
																																									echo "checked";
																																								} ?>>
												Juste <br>
												<input type="checkbox" name="impartial" value="1" disabled <?php
																																										if ($_SESSION["confirmed"][$i]["savoirs"]["impartial"]) {
																																											echo "checked";
																																										} ?>>
												Impartial<br>
												<input type="checkbox" name="travail" value="1" disabled <?php
																																									if ($_SESSION["confirmed"][$i]["savoirs"]["travail"]) {
																																										echo "checked";
																																									} ?>>
												Travail <br>
											</td>
										</tr>
									</tbody>

								</table>

							</section>

			</section>

		<?php
		}
		?>

			<section id="mail_consultant-container">
				<p id="send-texte">2 : Je les envoie</p>

				<section id="selection_ref">

		<label for="mail_cons">E-mail du consultant : </label>
					<input type="email" name="mail_cons" id="mail_cons">

				</section>

			</section>

			<!-- Bouton envoie demande consultant -->
			<input type="submit" name="submit" id="send_form" value="Envoyer une demande au consultant">

	</form>
		 <!-- prints error or success messages -->
	<p class="error">
		<?php echo @$errorcons; ?>
	</p>

	<p class="success">
		<?php echo @$successcons; ?>
	</p>



		<!-- Logout bouton -->
	<a href="../logout.php" id="forgot_password">Déconnexion</a>


	</div>


</body>

</html>