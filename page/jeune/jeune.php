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

	$data = array("user" => $_SESSION["userID"], "type" => $_POST["type"], "engagement" => $_POST["engagement"], "length" => $_POST["length"], "firstname" => $_POST["ref_firstname"], "lastname" => $_POST["ref_lastname"], "mail" => $_POST["ref_mail"], "savoirs" => $savoirs);

	$update = new updateRef($data);








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
	<link rel="stylesheet" href="../../ressources/style_jeune.css">
	<script src="../../js/jquery-3.7.0.min.js"></script>
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
		<section id="infos jeunes">
			<fieldset>
				<legend>Vos informations</legend>
				<label for="lastname">Nom :</label>
				<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>" readonly> <br>

				<label for="firstname">Prénom :</label>
				<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>" readonly> <br>

				<label for="birthdate">Date de naissance :</label>
				<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>" readonly>
				<br>

				<label for="email">Mail : </label>
				<input type="email" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" readonly> <br>
			</fieldset>
		</section>


		<form action="" method="post">
			<section id="formu_jeune">
				<fieldset>
					<legend>Demande de référence :</legend>
					<label for="type">Milieu de l'engagement :</label>
					<input type="text" name="type" id="type" placeholder="association, club de sport, etc."> <br>

					<label for="engagement">Mon engamement :</label>
					<textarea name="engagement" id="engagement" cols="30" rows="10" placeholder="Décrivez votre engagement"></textarea> <br>

					<label for="length">Durée de l'engagement :</label>
					<input type="text" name="length" id="length"><br>

					<label for="ref_lastname">Nom du référent :</label>
					<input type="text" name="ref_lastname" id="ref_lastname"><br>

					<label for="ref_firstname">Prénom du référent :</label>
					<input type="text" name="ref_firstname" id="ref_firstname"><br>

					<label for="ref_mail">email du référent :</label>
					<input type="email" name="ref_mail" id="ref_mail"><br> <br>


					<section id="questions_etre">
						<table border="2">
							<legend>Mes savoirs-être :</legend>
							<tr>
								<td>Je suis... (4 choix maximum)</td>
							</tr>
							<tr>
								<td>
									<table>
										<td>
											<tr>
												<input type="checkbox" name="autonomie" value="1">Autonome <br>
											</tr>
											<tr>
												<input type="checkbox" name="analyse" value="1">Capable d'analyse et de synthèse <br>
											</tr>
											<tr>
												<input type="checkbox" name="ecoute" value="1">A l'écoute <br>
											</tr>
											<tr>
												<input type="checkbox" name="organise" value="1">Organisé <br>
											</tr>
											<tr>
												<input type="checkbox" name="passionne" value="1">Passionné <br>
											</tr>
											<tr>
												<input type="checkbox" name="fiable" value="1">Fiable <br>
											</tr>
											<tr>
												<input type="checkbox" name="patient" value="1">Patient <br>
											</tr>
											<tr>
												<input type="checkbox" name="reflechi" value="1">Réfléchi <br>
											</tr>
											<tr>
												<input type="checkbox" name="responsable" value="1">Responable<br>
											</tr>
											<tr>
												<input type="checkbox" name="sociable" value="1">Sociable <br>
											</tr>
											<tr>
												<input type="checkbox" name="optimiste" value="1">Optimiste <br>
											</tr>
									</table>
								</td>
							</tr>
						</table>
						<p class="error">
							<?php echo @$error; ?>
						</p>
						<p class="success">
							<?php echo @$success; ?>
						</p>
					</section>
					<br>
					<br>
					<input type="submit" name="submit" value="Envoyer une demande"><br>
				</fieldset>
			</section>
		</form>
	</section>
	<br>
	<br>
	<!-- logout button -->
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
</body>

</html>