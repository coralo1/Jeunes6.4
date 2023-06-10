<?php require("jeune.class.php") ?>
<?php
session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

$data = array("user" => $_SESSION["userID"]);

$refs = new loadRefs($data);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/styles_jeune.css">
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

	<p id="description-page">Mes références</p>


	<div id="elements-container">
		Références en attente :
		<section id="informations-container">
			<?php
			foreach ($_SESSION["pending"] as $pending) {
				echo '<fieldset>
				<legend>1 : </legend> <br>
				<label for="lastname">Nom :</label>';
				echo '<input type="text" name="lastname" id="lastname" value="' . $_SESSION["pending"][0]["lastname"] . '" readonly> <br>';
				echo '<label for="firstname">Prénom :</label>
				<input type="text" name="firstname" id="firstname" value="' . $_SESSION["pending"][0]["firstname"] . '" readonly> <br>';
				echo '<label for="birthdate">Date de naissance :</label>
				<input type="date" name="birthdate" id="birthdate" value="' . $_SESSION["pending"][0]["birthdate"] . '" readonly> <br>';
				echo '<label for="mail">Mail : </label>
				<input type="email" name="mail" id="mail" value="' . $_SESSION["pending"][0]["mail"] . '" readonly> <br>';
				echo '<label for="type">' . "Type d'engagement : </label>" .
					'<input type="text" name="type" id="type" value="' . $_SESSION["pending"][0]["type"] . '" readonly> <br>';
				echo '<label for="engagement">' . "<Description de l'engagement : </label>" .
					'<textarea name="engagement" id="engagement" cols="30" rows="10" readonly>' . $_SESSION["pending"][0]["engagement"] . '</textarea> <br>';
				echo '<label for="length">' . "Durée de l'engagement : </label>" .
					'<input type="text" name="length" id="length" value="' . $_SESSION["pending"][0]["length"] . '" readonly> <br>';
				echo '<section id="checkbox-container">
				<table id="table-checkbox" border="1px black">
					<legend><strong>Savoirs-être</strong></legend>
					<thead>
						<tr>
							<td>Je suis...</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>';
				echo '<input type="checkbox" name="autonomie" value="1" disabled ';
				if ($_SESSION["pending"][0]["autonomie"]) {
					echo "checked";
				};
				echo '>Autonome <br>';
				echo '<input type="checkbox" name="analyse" value="1" disabled';
				if ($_SESSION["pending"][0]["analyse"]) {
					echo "checked";
				}
				echo ">Capable d'analyse et de synthèse <br>";
				echo '<input type="checkbox" name="ecoute" value="1" disabled';
				if ($_SESSION["pending"][0]["ecoute"]) {
					echo "checked";
				}
				echo ">A l'écoute <br>";
				echo '<input type="checkbox" name="organise" value="1" disabled ';
				if ($_SESSION["pending"][0]["organise"]) {
					echo "checked";
				}
				echo '>Organisé <br>';
				echo '<input type="checkbox" name="passionne" value="1" disabled ';
				if ($_SESSION["pending"][0]["passionne"]) {
					echo "checked";
				}
				echo '>Passionné <br>';
				echo '<input type="checkbox" name="fiable" value="1" disabled ';
				if ($_SESSION["pending"][0]["fiable"]) {
					echo "checked";
				}
				echo '>Fiable <br>';
				echo '<input type="checkbox" name="patient" value="1" disabled';
				if ($_SESSION["pending"][0]["patient"]) {
					echo "checked";
				}
				echo '>Patient <br>';
				echo '<input type="checkbox" name="reflechi" value="1" disabled';
				if ($_SESSION["pending"][0]["reflechi"]) {
					echo "checked";
				}
				echo '>Réfléchi <br>';
				echo '<input type="checkbox" name="responsable" value="1" disabled ';
				if ($_SESSION["pending"][0]["responsable"]) {
					echo "checked";
				}
				echo '>Responable<br>';
				echo '<input type="checkbox" name="sociable" value="1" disabled ';
				if ($_SESSION["pending"][0]["sociable"]) {
					echo "checked";
				}
				echo '>Sociable <br>';
				echo '<input type="checkbox" name="optimiste" value="1" disabled ';
				if ($_SESSION["pending"][0]["optimiste"]) {
					echo "checked";
				}
				echo '>Optimiste <br>';
				echo '
				</td>
				</tr>
				</tbody>
				</table>
			</section>
	
			</fieldset>';
			}






			?>

		</section>


		<section id="demande-formulaire">

			<!-- <fieldset> -->
			<form action="" method="post">

				<!-- ------------------------- Début du premier form ------------------------- -->

				<section id="demande_ref-container">
					Références validées :
					<?php
					$i = -1;
					foreach ($_SESSION["confirmed"] as $confirmed) {
						$i++;
						echo '<fieldset>
						<legend>'.($i+1).': </legend> <br>
						<label for="lastname">Nom :</label>';
						echo '<input type="text" name="lastname" id="lastname" value="' . $_SESSION["confirmed"][$i]["lastname"] . '" readonly> <br>';
						echo '<label for="firstname">Prénom :</label>
						<input type="text" name="firstname" id="firstname" value="' . $_SESSION["confirmed"][$i]["firstname"] . '" readonly> <br>';
						echo '<label for="birthdate">Date de naissance :</label>
						<input type="date" name="birthdate" id="birthdate" value="' . $_SESSION["confirmed"][$i]["birthdate"] . '" readonly> <br>';
						echo '<label for="mail">Mail : </label>
						<input type="email" name="mail" id="mail" value="' . $_SESSION["confirmed"][$i]["mail"] . '" readonly> <br>';
						echo '<label for="type">' . "Type d'engagement : </label>" .
							'<input type="text" name="type" id="type" value="' . $_SESSION["confirmed"][$i]["type"] . '" readonly> <br>';
						echo '<label for="engagement">' . "<Description de l'engagement : </label>" .
							'<textarea name="engagement" id="engagement" cols="30" rows="10" readonly>' . $_SESSION["confirmed"][$i]["engagement"] . '</textarea> <br>';
						echo '<label for="length">' . "Durée de l'engagement : </label>" .
							'<input type="text" name="length" id="length" value="' . $_SESSION["confirmed"][$i]["length"] . '" readonly> <br>';
						echo '<section id="checkbox-container">
						<table id="table-checkbox" border="1px black">
							<legend><strong>Savoirs-être</strong></legend>
							<thead>
								<tr>
									<td>Je suis...</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>';
						echo '<input type="checkbox" name="autonomie" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["autonomie"]) {
							echo "checked";
						};
						echo '>Autonome <br>';
						echo '<input type="checkbox" name="analyse" value="1" disabled';
						if ($_SESSION["confirmed"][$i]["analyse"]) {
							echo "checked";
						}
						echo ">Capable d'analyse et de synthèse <br>";
						echo '<input type="checkbox" name="ecoute" value="1" disabled';
						if ($_SESSION["confirmed"][$i]["ecoute"]) {
							echo "checked";
						}
						echo ">A l'écoute <br>";
						echo '<input type="checkbox" name="organise" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["organise"]) {
							echo "checked";
						}
						echo '>Organisé <br>';
						echo '<input type="checkbox" name="passionne" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["passionne"]) {
							echo "checked";
						}
						echo '>Passionné <br>';
						echo '<input type="checkbox" name="fiable" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["fiable"]) {
							echo "checked";
						}
						echo '>Fiable <br>';
						echo '<input type="checkbox" name="patient" value="1" disabled';
						if ($_SESSION["confirmed"][$i]["patient"]) {
							echo "checked";
						}
						echo '>Patient <br>';
						echo '<input type="checkbox" name="reflechi" value="1" disabled';
						if ($_SESSION["confirmed"][$i]["reflechi"]) {
							echo "checked";
						}
						echo '>Réfléchi <br>';
						echo '<input type="checkbox" name="responsable" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["responsable"]) {
							echo "checked";
						}
						echo '>Responable<br>';
						echo '<input type="checkbox" name="sociable" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["sociable"]) {
							echo "checked";
						}
						echo '>Sociable <br>';
						echo '<input type="checkbox" name="optimiste" value="1" disabled ';
						if ($_SESSION["confirmed"][$i]["optimiste"]) {
							echo "checked";
						}
						echo '>Optimiste <br>';
						echo '
						</td>
						</tr>
						</tbody>
						</table>
					</section>
			
					</fieldset>';
					}



					?>

				</section>

				

			</form>
			<!-- </fieldset> -->

		</section>

		<!-- Logout button -->
		<a href="../logout.php" id="forgot_password">Déconnexion</a>

	</div>

</body>

</html>