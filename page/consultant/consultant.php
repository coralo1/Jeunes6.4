<?php require("consultant.class.php") ?>
<?php
/*makes sure the user is Consultant */
session_start();
if ($_SESSION["usertype"] != "C") {
	header("Location:../login/login.php");
}

//echo var_dump($_SESSION);
$refs = $_SESSION["refs"];
$data = array("user" => $_SESSION["user"], "refs" => $refs);
new loadCons($data);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/style_consultant.css">
	<title>Page consultant</title>
</head>

<body>

	<header>
		<img src="../../ressources/img/LOGOS_JEUNES_6_4.svg" alt="Logo Jeunes6.4">
		<div id="haut_page-container">
			<span id="nom_page-container">
				<h1>CONSULTANT</h1>
			</span>
			<span id="texte_haut-container">
				<p>Je donne de la valeur à ton engagement</p>
			</span>
		</div>
	</header>

	<nav id="nav-container">
		<a href="../login/login.php" class="nav-element">JEUNE</a>
		<a href="../referent/referent.php" class="nav-element">RÉFÉRENT</a>
		<a href="../consultant/consultant.php" class="nav-element">CONSULTANT</a>
		<a href="../partenaires/partenaires.html" class="nav-element">PARTENAIRES</a>
	</nav>

	<p id="description-page">Validez cet engagement en prenant en compte sa valeur.</p>

	<div id="section_jeune-container">
		<!-- <fieldset> -->
		<section id="form_jeune-container">
			<legend>JEUNE</legend>

			<form action="page.php" method="post">
				<label for="fnom">Nom :</label>
				<input type="text" name="fnom" id="fnom" readonly value="<?php echo $_SESSION["Jeune"]["lastname"] ?>"> <br>

				<label for="fprenom">Prénom :</label>
				<input type="text" name="fprenom" id="fprenom" readonly value="<?php echo $_SESSION["Jeune"]["firstname"] ?>"> <br>

				<label for="fdate">Date de naissance :</label>
				<input type="date" name="fdate" id="fdate" readonly value="<?php echo $_SESSION["Jeune"]["birthdate"] ?>"> <br>

				<label for="fmail">Mail : </label>
				<input type="email" name="femail" id="femail" readonly value="<?php echo $_SESSION["Jeune"]["mail"] ?>"> <br>

				<label for="freseau">Type d'engagemenet :</label>
				<input type="text" name="freseau" id="freseau" readonly value="<?php echo $_SESSION["Jeune"]["type"] ?>"> <br>

				<label for="fengagement">Mon engamement :</label>
				<textarea name="fengagement" id="fengagement" cols="1" rows="2" readonly><?php echo $_SESSION["Jeune"]["engagement"] ?></textarea> <br>

				<label for="fduree">Durée :</label>
				<input type="text" name="fduree" id="fduree" readonly value="<?php echo $_SESSION["Jeune"]["length"] ?>">
			</form>

		</section>

		<section id="checkbox_jeune-container">
			<table id="checkbox_jeune">
				<thead>
					<tr>
						<td>Je suis</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<form action="page.php" method="post">
								<input type="checkbox" name="etre" value="autonome" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Autonome <br>
								<input type="checkbox" name="etre" value="capable" disabled <?php
																																						if ($_SESSION["Jeune"]["analyse"]) {
																																							echo "checked";
																																						}; ?>>Capable d'analyse
								et de synthèse <br>
								<input type="checkbox" name="etre" value="ecoute" disabled <?php
																																						if ($_SESSION["Jeune"]["autonomie"]) {
																																							echo "checked";
																																						}; ?>>A l'écoute <br>
								<input type="checkbox" name="etre" value="organise" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Organisé <br>
								<input type="checkbox" name="etre" value="passionne" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Passionné <br>
								<input type="checkbox" name="etre" value="fiable" disabled <?php
																																						if ($_SESSION["Jeune"]["autonomie"]) {
																																							echo "checked";
																																						}; ?>>Fiable <br>
								<input type="checkbox" name="etre" value="patient" disabled <?php
																																						if ($_SESSION["Jeune"]["autonomie"]) {
																																							echo "checked";
																																						}; ?>>Patient <br>
								<input type="checkbox" name="etre" value="reflechi" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Réfléchi <br>
								<input type="checkbox" name="etre" value="responsable" disabled <?php
																																								if ($_SESSION["Jeune"]["autonomie"]) {
																																									echo "checked";
																																								}; ?>>Responable <br>
								<input type="checkbox" name="etre" value="sociable" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Sociable <br>
								<input type="checkbox" name="etre" value="optimiste" disabled <?php
																																							if ($_SESSION["Jeune"]["autonomie"]) {
																																								echo "checked";
																																							}; ?>>Optimiste <br>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
		<!-- </fieldset> -->
	</div>


	<br>
	<?php
	$i = -1;
	foreach ($_SESSION["refs"] as $refs) {
		$i++; ?>

		<div id="section_referent-container">
			<!-- <fieldset> -->
			<section id="form_referent-container">
				<legend>RÉFÉRENT</legend>

				<form action="page.php" method="post">
					<label for="fnom">Nom :</label>
					<input type="text" name="fnom" id="fnom" readonly value="<?php echo $_SESSION["refs"]["$i"]["lastname"] ?>"> <br>

					<label for="fprenom">Prénom :</label>
					<input type="text" name="fprenom" id="fprenom" readonly value="<?php echo $_SESSION["refs"]["$i"]["firstname"] ?>"> <br>

					<label for="fdate">Date de naissance :</label>
					<input type="date" name="fdate" id="fdate" readonly value="<?php echo $_SESSION["refs"]["$i"]["birthdate"] ?>"> <br>

					<label for="ftel">Portable :</label>
					<input type="tel" name="ftel" id="ftel" readonly value="<?php echo $_SESSION["refs"]["$i"]["phone"] ?>"> <br>

					<label for="fmail">Mail : </label>
					<input type="email" name="femail" id="femail" readonly value="<?php echo $_SESSION["refs"]["$i"]["mail"] ?>"> <br>

					<label for="freseau">Réseau social :</label>
					<input type="text" name="freseau" id="freseau" readonly value="<?php echo $_SESSION["refs"]["$i"]["type"] ?>"> <br>

					<label for="fpresentation">Présentation :</label>
					<textarea name="fpresentation" id="fpresentation" cols="1" rows="2"><?php echo $_SESSION["refs"]["$i"]["comment"] ?></textarea> <br>

					<label for="fduree">Durée :</label>
					<input type="text" name="fduree" id="fduree" readonly value="<?php echo $_SESSION["refs"]["$i"]["length"] ?>">
				</form>

			</section>

			<section id="checkbox_referent-container">
				<table id="checkbox_referent">
					<thead>
						<tr>
							<td>Je confirme</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<form action="page.php" method="post">
									<input type="checkbox" name="confirm" value="ponctualite" disabled <?php
																																											if ($_SESSION["refs"]["$i"]["autonomie"]) {
																																												echo "checked";
																																											}; ?>>Ponctualité <br>
									<input type="checkbox" name="confirm" value="confiance" disabled <?php
																																										if ($_SESSION["refs"][$i]["analyse"]) {
																																											echo "checked";
																																										}; ?>>Confiance <br>
									<input type="checkbox" name="confirm" value="serieux" disabled <?php
																																									if ($_SESSION["refs"][$i]["ecoute"]) {
																																										echo "checked";
																																									}; ?>>Sérieux <br>
									<input type="checkbox" name="confirm" value="honnetete" disabled <?php
																																										if ($_SESSION["refs"][$i]["organise"]) {
																																											echo "checked";
																																										}; ?>>Honnêteté <br>
									<input type="checkbox" name="confirm" value="tolerance" disabled <?php
																																										if ($_SESSION["refs"][$i]["passionne"]) {
																																											echo "checked";
																																										}; ?>>Tolérance <br>
									<input type="checkbox" name="confirm" value="bienveillance" disabled <?php
																																												if ($_SESSION["refs"][$i]["fiable"]) {
																																													echo "checked";
																																												}; ?>>Bienveillance <br>
									<input type="checkbox" name="confirm" value="Respect" disabled <?php
																																									if ($_SESSION["refs"][$i]["patient"]) {
																																										echo "checked";
																																									}; ?>>Respect <br>
									<input type="checkbox" name="confirm" value="juste" disabled <?php
																																								if ($_SESSION["refs"][$i]["reflechi"]) {
																																									echo "checked";
																																								}; ?>>Juste <br>
									<input type="checkbox" name="confirm" value="impartial" disabled <?php
																																										if ($_SESSION["refs"][$i]["responsable"]) {
																																											echo "checked";
																																										}; ?>>Impartial <br>
									<input type="checkbox" name="confirm" value="travail" disabled <?php
																																									if ($_SESSION["refs"][$i]["sociable"]) {
																																										echo "checked";
																																									}; ?>>Travail <br>
								</form>
							</td>
						</tr>
					</tbody>

				</table>
			</section>


			<!-- </fieldset> -->
		</div>
	<?php } ?>
</body>

</html>