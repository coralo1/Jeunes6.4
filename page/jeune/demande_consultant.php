<?php require("jeune.class.php") ?>
<?php

session_start();
if ($_SESSION["usertype"] != "J") {
	header("Location:../login/login.php");
}

/* load references */
$data = array("user" => $_SESSION["userID"]);
$refs = new loadRefs($data);


if (isset($_POST["submit"]) && !isset($_POST["ref_select"])) {
	$errorcons = "Veuillez sélectionner au moins une référence";
} elseif (isset($_POST["submit"]) && isset($_POST["ref_select"])) {

	$data = array("user" => $_SESSION["userID"], "mail_cons" => $_POST["mail_cons"], "ref_array" => $_POST["ref_select"], "refs" => $_SESSION["confirmed"], "firstname" => $_SESSION["firstname"], "lastname" => $_SESSION["lastname"]);
	$request = new requestCons($data);
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/style_jeune.css">
	<!-- <script src="../../js/jquery-3.7.0.min.js"></script>
	<script src="../../js/jeune.js" async></script> -->
	<title>Page jeune</title>
</head>

<body>

	<header>
		<img src="../../ressources/img/LOGOS_JEUNES_6_4.svg" alt="Logo Jeunes6.4">
		<h1>JEUNE</h1>
		<p>Je donne de la valeur à mon engagement</p>
	</header>

	<nav id="nav-container">
		<a href="../jeune/jeune.php" class="nav-element">JEUNE</a>
		<a href="../login/login.php" class="nav-element">RÉFÉRENT</a>
		<a href="../login/login.php" class="nav-element">CONSULTANT</a>
		<a href="../partenaires/partenaires.html" class="nav-element">PARTENAIRES</a>
	</nav>
	<nav id="nav-container">
		<a href="jeune.php" class="nav-element">Demande de référence</a>
		<a href="consultation_ref.php" class="nav-element">Mes références</a>
		<a href="demande_consultant.php" class="nav-element">Demande de consultation</a>
	</nav>

	<p id="description-page">Je crée une demande de consultation</p>

	<form action="" method="post">
		1 : Je sélectionne mes références
		<br>
		<?php
		$i = -1;
		foreach ($_SESSION["confirmed"] as $confirmed) {
			$i++;
		?>

			<fieldset>
			<legend><input type="checkbox" id="ref<?php echo ($i + 1) ?>" name="ref_select[]" value="<?php echo ($i - 1) ?>"><?php echo ($i + 1) ?>: </legend> <br>
							<label for="lastname">Nom :</label>
							<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["confirmed"][$i]["lastname"] ?>" readonly> <br>
							<label for="firstname">Prénom :</label>
							<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["confirmed"][$i]["firstname"] ?>" readonly> <br>
							<label for="birthdate">Date de naissance :</label>
							<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["confirmed"][$i]["birthdate"] ?>" readonly> <br>
							<label for="mail">Mail : </label>
							<input type="email" name="mail" id="mail" value="<?php echo $_SESSION["confirmed"][$i]["mail"] ?>" readonly> <br>
							<label for="comment">Présentation : </label>
							<textarea name="comment" id="comment" cols="30" rows="10" readonly><?php echo  $_SESSION["confirmed"][$i]["presentation"] ?></textarea> <br>
							<label for="comment">Commentaires du référent : </label>
							<textarea name="comment" id="comment" cols="30" rows="10" readonly><?php echo  $_SESSION["confirmed"][$i]["comment"] ?></textarea> <br>
							<label for="length">Durée :</label>
							<input type="text" name="length" id="length" value="<?php echo $_SESSION["confirmed"][$i]["length"] ?>" readonly> <br>
							<section id="checkbox-container">
								<table id="table-checkbox" border="1px black">
									<legend><strong>Savoirs-être</strong></legend>
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
			</fieldset>
		<?php
		}
		?>

		<br>
		<br>
		2 : Je les envoie
		<br>
		<br>
		<label for="mail_cons">E-mail du consultant : </label>
		<input type="email" name="mail_cons" id="mail_cons"> <br> <br>

		<input type="submit" name="submit" value="Envoyer une demande au consultant"> <br> <br>
	</form>
	<p class="error">
		<?php echo @$errorcons; ?>
	</p>

	<p class="success">
		<?php echo @$successcons; ?>
	</p>



	<a href="../logout.php" id="forgot_password">Déconnexion</a>




</body>

</html>