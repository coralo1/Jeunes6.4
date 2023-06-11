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

</body>

</html>