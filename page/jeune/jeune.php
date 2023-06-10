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
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

/* update function  // turns out this is useless
if (isset($_POST['update'])) {
	$storage = "../../data/jeune.json";
	$users = json_decode(file_get_contents($storage), true); /* loads users *//*
	$i = -1;
	foreach ($users as $user) { /* parses user array until it matches *//*
		$i++;

		if ($user["email"] == $_POST["email"]) { /* then updates the user info with what was filled, along with session info *//*

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

			$replacement = array($i => $user); /*creates an array with only the user in his position in the json file *//*
		}
	}

	$updated_users = array_replace($users, $replacement); /*replaces the array containing all users with the previous array *//*
	$encoded_data = json_encode($updated_users, JSON_PRETTY_PRINT); /* puts everything back into the json *//*
	if (file_put_contents($storage, $encoded_data)) {
		$status = "profil mis à jour";
	} else {
		$status = "Une erreur est survenue, veuillez rééssayer";
	}
}
*/


/* referent function */
if (isset($_POST["submit"])) {
	//$user = new updateRef($_POST['email'], $_POST['password']); /* call for login */

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

	<p id="description-page">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>


	<div id="elements-container">

		<section id="informations-container">
			<fieldset>
				<legend>Vos informations : </legend> <br>
				<label for="lastname">Nom :</label>
				<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>" readonly> <br>

				<label for="firstname">Prénom :</label>
				<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>" readonly> <br>

				<label for="birthdate">Date de naissance :</label>
				<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>" readonly>
				<br>

				<label for="mail">Mail : </label>
				<input type="email" name="mail" id="mail" value="<?php echo $_SESSION["mail"] ?>" readonly> <br>
			</fieldset>
		</section>


		<section id="demande-formulaire">

			<!-- <fieldset> -->
			<form action="" method="post">

				<!-- ------------------------- Début du premier form ------------------------- -->

				<section id="demande_ref-container">

					<fieldset>
						<legend>Demande de référence :</legend> <br>

						<label for="type">Milieu de l'engagement :</label>
						<input type="text" name="type" id="type" placeholder="association, club de sport, etc."> <br>

						<label for="engagement">Mon engamement :</label>
						<textarea name="engagement" id="engagement" cols="30" rows="10" placeholder="Décrivez votre engagement"></textarea> <br>

						<label for="length">Durée de l'engagement :</label>
						<input type="text" name="length" id="length"> <br>

						<label for="ref_lastname">Nom du référent :</label>
						<input type="text" name="ref_lastname" id="ref_lastname"> <br>

						<label for="ref_firstname">Prénom du référent :</label>
						<input type="text" name="ref_firstname" id="ref_firstname"> <br>

						<label for="ref_mail">E-mail du référent :</label>
						<input type="email" name="ref_mail" id="ref_mail"> <br>

					</fieldset>

				</section>

				<!-- ------------------------- Fin du premier form ------------------------- -->


				<!-- ------------------------- Début du deuxième form ------------------------- -->

				<section id="checkbox-container">
					<table id="table-checkbox">
						<legend><strong>Mes savoirs-être</strong></legend>
						<thead>
							<tr>
								<td>Je suis... (4 choix maximum)</td>
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
					<p id="description-checkbox"><strong>*Faire 4 choix maximum</strong></p>
				</section>

				<!-- ------------------------- Fin du deuxième form ------------------------- -->

				<!-- Messages -->
				<p class="error">
					<?php echo @$error; ?>
				</p>

				<p class="success">
					<?php echo @$success; ?>
				</p>
				<!-- Fin messages  -->

				<!-- Bouton "envoyer une demande" -->
				<input type="submit" name="submit" value="Envoyer une demande"> <br>

			</form>
			<!-- </fieldset> -->

		</section>

		<!-- Logout button -->
		<a href="../logout.php" id="forgot_password">Déconnexion</a>

	</div>

</body>

</html>