<?php require("jeune.class.php") ?>
<?php
/*
require('../../PHPMailer/src/Exception.php');
require('../../PHPMailer/src/PHPMailer.php');
require('../../PHPMailer/src/SMTP.php');
*/
?>

<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '8a516fbf671d31';
$phpmailer->Password = '3a2618cd283dce';
*/
session_start();
/*makes sure the user is Jeune */
if ($_SESSION["usertype"] != "J") {
	header("Location:../login/login.php");
}

/*update your data */
if (isset($_POST['update'])) {
	$storage = "../../data/jeune.json";
	$users = json_decode(file_get_contents($storage), true); /* loads users */
	var_dump($_POST);
	echo "<br><br>";
	$i = -1;
	foreach ($users as $user) { /* parses user array until it matches */
		$i++;

		if ($user["mail"] == $_SESSION["mail"]) { /* then updates the user info with what was filled, along with session info */

			$user["lastname"] = $_POST['lastname'];
			$_SESSION["lastname"] = $_POST['lastname'];

			$user["firstname"] = $_POST['firstname'];
			$_SESSION["firstname"] = $_POST['firstname'];

			$user["birthdate"] = $_POST['birthdate'];
			$_SESSION["birthdate"] = $_POST['birthdate'];

			$user["type"] = $_POST['type'];
			$_SESSION["type"] = $_POST['type'];

			$user["engagement"] = $_POST['engagement'];
			$_SESSION["engagement"] = $_POST['engagement'];

			$user["length"] = $_POST['length'];
			$_SESSION["length"] = $_POST['length'];

			$savoirs = array();

			if (isset($_POST['autonomie'])) {
				$savoirs["autonomie"] = 1;
			} else {
				$savoirs["autonomie"] = 0;
			}

			if (isset($_POST['analyse'])) {
				$savoirs["analyse"] = 1;
			} else {
				$savoirs["analyse"] = 0;
			}

			if (isset($_POST['ecoute'])) {
				$savoirs["ecoute"] = 1;
			} else {
				$savoirs["ecoute"] = 0;
			}

			if (isset($_POST['organise'])) {
				$savoirs["organise"] = 1;
			} else {
				$savoirs["organise"] = 0;
			}

			if (isset($_POST['passionne'])) {
				$savoirs["passionne"] = 1;
			} else {
				$savoirs["passionne"] = 0;
			}

			if (isset($_POST['fiable'])) {
				$savoirs["fiable"] = 1;
			} else {
				$savoirs["fiable"] = 0;
			}

			if (isset($_POST['patient'])) {
				$savoirs["patient"] = 1;
			} else {
				$savoirs["patient"] = 0;
			}

			if (isset($_POST['reflechi'])) {
				$savoirs["reflechi"] = 1;
			} else {
				$savoirs["reflechi"] = 0;
			}

			if (isset($_POST['responsable'])) {
				$savoirs["responsable"] = 1;
			} else {
				$savoirs["responsable"] = 0;
			}

			if (isset($_POST['sociable'])) {
				$savoirs["sociable"] = 1;
			} else {
				$savoirs["sociable"] = 0;
			}

			if (isset($_POST['optimiste'])) {
				$savoirs["optimiste"] = 1;
			} else {
				$savoirs["optimiste"] = 0;
			}
			$user["savoirs"];

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
if (isset($_POST["submit"])) {
	//$user = new updateRef($_POST['email'], $_POST['password']); /* call for login */



	$data = array("user" => $_SESSION["userID"], "type" => $_POST["type"], "engagement" => $_POST["engagement"], "length" => $_POST["length"], "user_firstname" => $_SESSION["firstname"], "user_lastname" => $_SESSION["lastname"], "firstname" => $_POST["ref_firstname"], "lastname" => $_POST["ref_lastname"], "mail" => $_POST["ref_mail"], "savoirs" => $savoirs);

	$update = new createRef($data);








	/* this should send a mail but smtp server is too hard to setup */
	//$target = $_POST["ref_mail"];
	/*
										$mail->addAddress($_POST["ref_mail"], 'test');
										$phpmailer->Subject = "demande de référencement de " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . " sur la plateforme Jeunes 6.4";
										$phpmailer->isHTML(true);

										$message = '<html><body>';
										$message .= 'Bonjour, \n\n';
										$message .= '<?php $_SESSION["firstname"] ?>' . ' ' . '$_SESSION["lastname"]' . ' vous a envoyé une demande de référencement sur la plateforme jeunes 6.4.\n';
										$message .= '<a href="http://localhost:8080/page/referent/referent.php">Cliquez ici pour y accéder</a>';
										$message .= '</body></html>';
										$phpmailer->Body = $message;

										mail($target, $subject, $message, $headers);
										*/
}

?>













<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/style_jeune.css">
	<script src="../../js/jquery-3.7.0.min.js"></script>
	<script src="../../js/jeune.js" async></script>
	<title>Page jeune</title>
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
			<section id="informations-container">

				<section id="vos_informations">

					<legend>VOS INFORMATIONS : </legend>

					<label for="lastname">Nom :</label>
					<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>"> <br>

					<label for="firstname">Prénom :</label>
					<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>"> <br>

					<label for="birthdate">Date de naissance :</label>
					<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>">
					<br>

					<label for="mail">Mail : </label>
					<input type="email" name="mail" id="mail" value="<?php echo $_SESSION["mail"] ?>" readonly> <br>

				</section>

			</section>


			<section id="demande_formulaire">

				<form action="" method="post">


					<section id="demande_ref-container">

						<section id="demande_ref">

							<legend>DEMANDE DE RÉFÉRENCE :</legend>

							<label for="type">Milieu de l'engagement :</label>
							<input type="text" name="type" id="type" value="<?php echo $_SESSION["type"] ?>"> <br>

							<label for="engagement">Mon engamement :</label>
							<textarea name="engagement" id="engagement" cols="1" rows="3"><?php echo $_SESSION["engagement"] ?></textarea> <br>

							<label for="length">Durée de l'engagement :</label>
							<input type="text" name="length" id="length" value="<?php echo $_SESSION["length"] ?>"> <br>

							<label for="ref_lastname">Nom du référent :</label>
							<input type="text" name="ref_lastname" id="ref_lastname"> <br>

							<label for="ref_firstname">Prénom du référent :</label>
							<input type="text" name="ref_firstname" id="ref_firstname"> <br>

							<label for="ref_mail">E-mail du référent :</label>
							<input type="email" name="ref_mail" id="ref_mail"> <br>

						</section>

					</section>


					<section id="checkbox-container">
						<table id="table-checkbox">

							<legend>Mes savoirs-être</legend>

							<thead>
								<tr>
									<td>Je suis*</td>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>
										<input type="checkbox" name="autonomie" value="1">Autonome <br>
										<input type="checkbox" name="analyse" value="1">Capable d'analyse et de synthèse <br>
										<input type="checkbox" name="ecoute" value="1">A l'écoute <br>
										<input type="checkbox" name="organise" value="1">Organisé <br>
										<input type="checkbox" name="passionne" value="1">Passionné <br>
										<input type="checkbox" name="fiable" value="1">Fiable <br>
										<input type="checkbox" name="patient" value="1">Patient <br>
										<input type="checkbox" name="reflechi" value="1">Réfléchi <br>
										<input type="checkbox" name="responsable" value="1">Responable<br>
										<input type="checkbox" name="sociable" value="1">Sociable <br>
										<input type="checkbox" name="optimiste" value="1">Optimiste <br>
									</td>
								</tr>
							</tbody>

						</table>

						<p id="description-checkbox">*Faire 4 choix maximum</p>

					</section>


					<!-- Messages -->
					<p class="error">
						<?php echo @$status; ?>
					</p>

					<p class="success">
						<?php echo @$status; ?>
					</p>
					<!-- Fin messages  -->

					<!-- Bouton "envoyer une demande" -->
					<input type="submit" name="update" id="send_form" value="Mettre à jour mes informations"> <br>
					<input type="submit" name="submit" id="send_form" value="Envoyer une demande"> <br>

				</form>
				<!-- </fieldset> -->

			</section>
		</form>
		<!-- Logout button -->
		<a href="../logout.php" id="forgot_password">Déconnexion</a>

	</div>

</body>

</html>