<?php
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

/* update function */
if (isset($_POST['update'])) {
	$storage = "../../data/jeune.json";
	$users = json_decode(file_get_contents($storage), true); /* loads users */
	$i = -1;
	foreach ($users as $user) { /* parses user array until it matches */
		$i++;

		if ($user["email"] == $_POST["email"]) { /* then updates the user info with what was filled, along with session info */

			$user["lastname"] = $_POST['lastname'];
			$_SESSION["lastname"] = $_POST['lastname'];

			$user["firstname"] = $_POST['firstname'];
			$_SESSION["firstname"] = $_POST['firstname'];

			$user["birthdate"] = $_POST['birthdate'];
			$_SESSION["birthdate"] = $_POST['birthdate'];

			$user["network"] = $_POST['network'];
			$_SESSION["network"] = $_POST['network'];

			$user["engagement"] = $_POST['engagement'];
			$_SESSION["engagement"] = $_POST['engagement'];

			$user["length"] = $_POST['length'];
			$_SESSION["length"] = $_POST['length'];

			if (isset($_POST['autonomie'])) {
				$user["autonomie"] = 1;
				$_SESSION['autonomie'] = 1;
			} else {
				$user["autonomie"] = 0;
				$_SESSION['autonomie'] = 0;
			}

			if (isset($_POST['analyse'])) {
				$_SESSION['analyse'] = 1;
				$user["analyse"] = 1;
			} else {
				$user["analyse"] = 0;
				$_SESSION["analyse"] = 0;
			}

			if (isset($_POST['ecoute'])) {
				$_SESSION['ecoute'] = 1;
				$user["ecoute"] = 1;
			} else {
				$user["ecoute"] = 0;
				$_SESSION["ecoute"] = 0;
			}

			if (isset($_POST['organise'])) {
				$_SESSION['organise'] = 1;
				$user["organise"] = 1;
			} else {
				$user["organise"] = 0;
				$_SESSION['organise'] = 0;
			}

			if (isset($_POST['passionne'])) {
				$_SESSION['passionne'] = 1;
				$user["passionne"] = 1;
			} else {
				$user["passionne"] = 0;
				$_SESSION['passionne'] = 0;
			}

			if (isset($_POST['fiable'])) {
				$_SESSION['fiable'] = 1;
				$user["fiable"] = 1;
			} else {
				$user["fiable"] = 0;
				$_SESSION['fiable'] = 0;
			}

			if (isset($_POST['patient'])) {
				$_SESSION['patient'] = 1;
				$user["patient"] = 1;
			} else {
				$user["patient"] = 0;
				$_SESSION['patient'] = 0;
			}

			if (isset($_POST['reflechi'])) {
				$_SESSION['reflechi'] = 1;
				$user["reflechi"] = 1;
			} else {
				$user["reflechi"] = 0;
				$_SESSION['reflechi'] = 0;
			}

			if (isset($_POST['responsable'])) {
				$_SESSION['responsable'] = 1;
				$user["responsable"] = 1;
			} else {
				$user["responsable"] = 0;
				$_SESSION['responsable'] = 0;
			}

			if (isset($_POST['sociable'])) {
				$_SESSION['sociable'] = 1;
				$user["sociable"] = 1;
			} else {
				$user["sociable"] = 0;
				$_SESSION['sociable'] = 0;
			}

			if (isset($_POST['optimiste'])) {
				$_SESSION['optimiste'] = 1;
				$user["optimiste"] = 1;
			} else {
				$user["optimiste"] = 0;
				$_SESSION['optimiste'] = 0;
			}

			$replacement = array($i => $user); /*creates an array with only the user in his position in the json file */
		}
	}

	$updated_users = array_replace($users, $replacement); /*replaces the array containing all users with the previous array */
	$encoded_data = json_encode($updated_users, JSON_PRETTY_PRINT); /* puts everything back into the json */
	if (file_put_contents($storage, $encoded_data)) {
		$status = "profil mis à jour";

	} else {
		$status = "Une erreur est survenue, veuillez rééssayer";
	}
}



/* referent function */
if (isset($_POST["referent"])) {
	echo $_POST["ref_mail"];
	echo "<br>";
	echo $_POST["ref_comment"];
	echo "<br>";

	$target = $_POST["ref_mail"];
	$subject = "demande de référencement de " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . " sur la plateforme Jeunes 6.4";
	$message = '<html><body>';
	$message .= 'Bonjour, \n\n';
	$message .= '<?php $_SESSION["firstname"] ?>' . ' ' . '$_SESSION["lastname"]' . ' vous a envoyé une demande de référencement sur la plateforme jeunes 6.4.\n';
	$message .= '<a href="http://localhost:8080/page/referent/referent.php">Cliquez ici pour y accéder</a>';
	$message .= '</body></html>';
	$headers['MIME-Version'] = 'MIME-Version: 1.0';
	$headers['Content-type'] = 'text/html; charset=iso-8859-1';
	mail($target, $subject, $message, $headers);
}


?>













<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../ressources/style_jeune.css">
	<script src="../../js/jquery-3.7.0.min.js" async></script>
	<script src="../../js/jeune.js" async></script>
	<title>Page jeune</title>
</head>

<body>

	<header>
		<img src="../../ressources/img/logo_jeunes6.4.jpg" alt="Logo Jeunes6.4">
		<h1>JEUNE</h1>
		<h2>Je donne de la valeur à mon engagement</h2>
	</header>

	<nav>
		<div class="nav_container">
			<h4><a href="../jeune/jeune.php">JEUNE</a></h4>
			<h4><a href="../referent/referent.php">RÉFÉRENT</a></h4>
			<h4><a href="../consultant/consultant.php">CONSULTANT</a></h4>
			<h4><a href="../partenaires/partenaires.php">PARTENAIRES</a></h4>
		</div>
	</nav>

	<section>
		<p>Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>
	</section>

	<section>
		<form action="" method="post">
			<section id="formu_jeune">
				<fieldset>
					<label for="lastname">Nom :</label>
					<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>" readonly> <br>

					<label for="firstname">Prénom :</label>
					<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>" readonly> <br>

					<label for="birthdate">Date de naissance :</label>
					<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>">
					<br>

					<label for="email">Mail : </label>
					<input type="email" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" readonly> <br>

					<label for="network">Réseau social :</label>
					<input type="text" name="network" id="network" value="<?php echo $_SESSION["network"] ?>"> <br><br>

					<label for="engagement">Mon engamement :</label>
					<textarea name="engagement" id="engagement" cols="30"
						rows="10"><?php echo $_SESSION["engagement"] ?></textarea> <br>

					<label for="length">Durée :</label>
					<input type="text" name="length" id="length" value="<?php echo $_SESSION["length"] ?>">
				</fieldset>
			</section>

			<section id="questions_etre">
				<table border="2">
					<legend>Mes savoirs-être</legend>
					<tr>
						<td>Je suis*</td>
					</tr>
					<tr>
						<td>
							<table>
								<td>
									<tr>
										<input type="checkbox" name="autonomie" value="1" <?php if ($_SESSION["autonomie"] == 1) {
											echo 'checked';
										} ?>>Autonome <br>
									</tr>
									<tr>
										<input type="checkbox" name="analyse" value="1" <?php if ($_SESSION["analyse"] == 1) {
											echo 'checked';
										} ?>>Capable d'analyse et de synthèse <br>
									</tr>
									<tr>
										<input type="checkbox" name="ecoute" value="1" <?php if ($_SESSION["ecoute"] == 1) {
											echo 'checked';
										} ?>>A l'écoute <br>
									</tr>
									<tr>
										<input type="checkbox" name="organise" value="1" <?php if ($_SESSION["organise"] == 1) {
											echo 'checked';
										} ?>>Organisé <br>
									</tr>
									<tr>
										<input type="checkbox" name="passionne" value="1" <?php if ($_SESSION["passionne"] == 1) {
											echo 'checked';
										} ?>>Passionné <br>
									</tr>
									<tr>
										<input type="checkbox" name="fiable" value="1" <?php if ($_SESSION["fiable"] == 1) {
											echo 'checked';
										} ?>>Fiable <br>
									</tr>
									<tr>
										<input type="checkbox" name="patient" value="1" <?php if ($_SESSION["patient"] == 1) {
											echo 'checked';
										} ?>>Patient <br>
									</tr>
									<tr>
										<input type="checkbox" name="reflechi" value="1" <?php if ($_SESSION["reflechi"] == 1) {
											echo 'checked';
										} ?>>Réfléchi <br>
									</tr>
									<tr>
										<input type="checkbox" name="responsable" value="1" <?php if ($_SESSION["responsable"] == 1) {
											echo 'checked';
										} ?>>Responable<br>
									</tr>
									<tr>
										<input type="checkbox" name="sociable" value="1" <?php if ($_SESSION["sociable"] == 1) {
											echo 'checked';
										} ?>>Sociable <br>
									</tr>
									<tr>
										<input type="checkbox" name="optimiste" value="1" <?php if ($_SESSION["optimiste"] == 1) {
											echo 'checked';
										} ?>>Optimiste <br>
									</tr>
							</table>
						</td>
					</tr>
				</table>
				<p>*Faire 4 choix maximum</p>
				<p class="error">
					<?php echo @$error; ?>
				</p>
				<p class="success">
					<?php echo @$success; ?>
				</p>
			</section>
			<input type="submit" name="update" value="mettre a jour les données">
		</form>
		<?php if (isset($status)) {
			echo $status;
		}
		?>

	</section>
	<br>
	<br>
	<br>

	<!-- referent section -->
	<section>
		<form action="" method="post">
			<label for="ref_mail">email du référent :</label>
			<input type="email" name="ref_mail" id="ref_mail" placeholder="email du référent"><br>

			<label for="ref_comment"></label>
			<textarea name="ref_comment" id="ref_comment" cols="30" rows="2"></textarea> <br>

			<input type="submit" name="referent" value="Envoyer une demande">
		</form>
	</section>

	<!-- logout button -->
	<br>
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
</body>

</html>