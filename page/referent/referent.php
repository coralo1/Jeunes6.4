<?php require("referent.class.php") ?>

<?php
session_start();
/*makes sure the user is Referent */
if ($_SESSION["usertype"] != "R") {
	header("Location:../login/login.php");
}
/* update referent information */
if (isset($_POST["update"])) {
	$update_data = array("mail" => $_POST["mail"], "lastname" => $_POST["lastname"], "firstname" => $_POST["firstname"], "phone" => $_POST["phone"], "birthdate" => $_POST["birthdate"], "user" => $_SESSION["user"]);
	$baba = new updateRef($update_data);
}

if (isset($_POST["confirm"])) {
	$confirm_savoirs = array();

	if (isset($_POST['ponctuel'])) {
		$confirm_savoirs["ponctuel"] = 1;
	} else {
		$confirm_savoirs["ponctuel"] = 0;
	}

	if (isset($_POST['confiant'])) {
		$confirm_savoirs["confiant"] = 1;
	} else {
		$confirm_savoirs["confiant"] = 0;
	}

	if (isset($_POST['serieux'])) {
		$confirm_savoirs["serieux"] = 1;
	} else {
		$confirm_savoirs["serieux"] = 0;
	}

	if (isset($_POST['honnete'])) {
		$confirm_savoirs["honnete"] = 1;
	} else {
		$confirm_savoirs["honnete"] = 0;
	}

	if (isset($_POST['tolerant'])) {
		$confirm_savoirs["tolerant"] = 1;
	} else {
		$confirm_savoirs["tolerant"] = 0;
	}

	if (isset($_POST['bienveillant'])) {
		$confirm_savoirs["bienveillant"] = 1;
	} else {
		$confirm_savoirs["bienveillant"] = 0;
	}

	if (isset($_POST['respect'])) {
		$confirm_savoirs["respect"] = 1;
	} else {
		$confirm_savoirs["respect"] = 0;
	}

	if (isset($_POST['juste'])) {
		$confirm_savoirs["juste"] = 1;
	} else {
		$confirm_savoirs["juste"] = 0;
	}

	if (isset($_POST['impartial'])) {
		$confirm_savoirs["impartial"] = 1;
	} else {
		$confirm_savoirs["impartial"] = 0;
	}

	if (isset($_POST['travail'])) {
		$confirm_savoirs["travail"] = 1;
	} else {
		$confirm_savoirs["travail"] = 0;
	}


	$confirm_data = array("mail" => $_SESSION["mail"], "lastname" => $_SESSION["lastname"], "firstname" => $_SESSION["firstname"], "phone" => $_SESSION["phone"], "birthdate" => $_SESSION["birthdate"], "user" => $_SESSION["user"], "comment" => $_POST["comment"], "confirm_savoirs" => $confirm_savoirs, "length" => $_POST["length"], "presentation" => $_POST["presentation"]);


	$baba = new confirmRef($confirm_data);
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<script src="../../js/jquery-3.7.0.min.js"></script>
	<script src="../../js/jeune.js" async></script>
	<link rel="stylesheet" href="../../ressources/style_ref.css">
	<title>Page référent</title>
</head>

<body>
	<header>
		<img src="../../ressources/img/LOGOS_JEUNES_6_4.svg" alt="Logo Jeunes6.4">
		<div id="haut_page-container">
			<span id="nom_page-container">
				<h1>RÉFÉRENT</h1>
			</span>
			<span id="texte_haut-container">
				<p>Je confirme la valeur de ton engagement</p>
			</span>
		</div>
	</header>

	<nav id="nav-container">
		<a href="../login/login.php" class="nav-element">JEUNE</a>
		<a href="../referent/referent.php" class="nav-element">RÉFÉRENT</a>
		<a href="../consultant/consultant.php" class="nav-element">CONSULTANT</a>
		<a href="../partenaires/partenaires.html" class="nav-element">PARTENAIRES</a>
	</nav>

	<p id="description-page">Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</p>


	<div id="texte_demande">

		<?php
		echo "Originaire de la demande :<br>" . $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] . "<br>" . $_SESSION["user"];
		?>
		<br><br>

	</div>


	<div id="elements-container">


		<section id="informations_jeune-container">

			<form action="" method="post">

				<section id="informations_jeune">

					<legend>INFORMATIONS DU RÉFÉRENT :</legend>

					<label for="lastname">Nom :</label>
					<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>"> <br>

					<label for="firstname">Prénom :</label>
					<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>"> <br>

					<label for="birthdate">Date de naissance :</label>
					<input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>"> <br>

					<label for="phone">Portable :</label>
					<input type="tel" name="phone" id="phone" value="<?php echo $_SESSION["phone"] ?>"> <br>

					<label for="mail">Mail : </label>
					<input type="email" name="mail" id="mail" value="<?php echo $_SESSION["mail"] ?>" readonly> <br>

					<input type="submit" name="update" id="update" value="Mettre à jour les informations">

				</section>
			</form>

		</section>


		<section id="demande_ref-container">

			<form action="" method="post">

				<section id="demande_ref">

					<legend>DÉTAILS PAR RAPPORT AU JEUNE :</legend>

					<label for="presentation">Présentation :</label>
					<textarea name="presentation" id="presentation" cols="1" rows="1"></textarea> <br><br>

					<label for="length">Durée de contact :</label>
					<input type="text" name="length" id="length">

				</section>



		</section>




		<section id="elements_bas-container">


			<section id="comment-container">
				<textarea name="comment" id="comment" cols="30" rows="15" placeholder="Ajoutez des commentaires sur <?php echo $_SESSION["user_firstname"]; ?>"></textarea>
			</section>

			<section id="checkbox-container">

				<table id="table-checkbox">

					<legend>Ses savoirs-être</legend>

					<thead>
						<tr>
							<td>Je confirme sa (son)*</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>
								<!-- avant, on pouvait voir quels savoirs le jeune avait cochés et on pouvait les déocher si on les trouvait faux; mais on ne pouvait pas en cocher d'autres. le commentaire juste en dessous montre comment ça fonctionnait mais ne sert techniquement plus à rien -->
								<!-- <input type="checkbox" name="autonomie" value="1" <?php /*if ($_SESSION["autonomie"]) {
																																			echo "checked";
																																		} else {
																																			echo "disabled";
																																		}*/
																																				?>>Autonome <br> -->
								<input type="checkbox" name="ponctuel" value="1">Ponctualité <br>
								<input type="checkbox" name="confiant" value="1">Confiance <br>
								<input type="checkbox" name="serieux" value="1">Sérieux <br>
								<input type="checkbox" name="honnete" value="1">Honnêteté <br>
								<input type="checkbox" name="tolerant" value="1">Tolérance <br>
								<input type="checkbox" name="bienveillant" value="1">Bienveillance <br>
								<input type="checkbox" name="respect" value="1">Respect <br>
								<input type="checkbox" name="juste" value="1">Juste <br>
								<input type="checkbox" name="impartial" value="1">Impartial <br>
								<input type="checkbox" name="travail" value="1">Travail <br>
							</td>
						</tr>
					</tbody>

				</table>

				<p id="description-checkbox">*Faire 4 choix maximum</p>

			</section>


		</section>

		<!-- Bouton confirmation information (mis là pour faciliter CSS) -->
		<input type="submit" name="confirm" id="confirm" value="Confirmation des informations du jeune">


		<p class="error">
			<?php if(isset($baba->error)){
				echo @$baba->error;
				echo '<a href="success.php" id="forgot_password">Remerciements</a>';
			}?>
		</p>
		<p class="success">
			<?php if (isset($baba->success)) {
				/* if reference was successful, leave the page and send a thanks message*/
				echo '<meta http-equiv="refresh" content="0;url=success.php">';
			}
			?>
		</p>


		</form>

		<!-- Logout button -->
		<a href="../logout.php" id="forgot_password">Déconnexion</a>


	</div>


</body>

</html>