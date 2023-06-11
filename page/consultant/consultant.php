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
					<input type="text" name="fnom" id="fnom"> <br>

					<label for="fprenom">Prénom :</label>
					<input type="text" name="fprenom" id="fprenom"> <br>

					<label for="fdate">Date de naissance :</label>
					<input type="date" name="fdate" id="fdate"> <br>

					<label for="fmail">Mail : </label>
					<input type="email" name="femail" id="femail"> <br>

					<label for="freseau">Réseau social :</label>
					<input type="text" name="freseau" id="freseau"> <br>

					<label for="fengagement">Mon engamement :</label>
					<textarea name="fengagement" id="fengagement" cols="1" rows="2"></textarea> <br>

					<label for="fduree">Durée :</label>
					<input type="text" name="fduree" id="fduree">
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
									<input type="checkbox" name="etre" value="autonome">Autonome <br>
									<input type="checkbox" name="etre" value="capable">Capable d'analyse
									et de synthèse <br>
									<input type="checkbox" name="etre" value="ecoute">A l'écoute <br>
									<input type="checkbox" name="etre" value="organise">Organisé <br>
									<input type="checkbox" name="etre" value="passionne">Passionné <br>
									<input type="checkbox" name="etre" value="fiable">Fiable <br>
									<input type="checkbox" name="etre" value="patient">Patient <br>
									<input type="checkbox" name="etre" value="reflechi">Réfléchi <br>
									<input type="checkbox" name="etre" value="responsable">Responable <br>
									<input type="checkbox" name="etre" value="sociable">Sociable <br>
									<input type="checkbox" name="etre" value="optimiste">Optimiste <br>
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		<!-- </fieldset> -->
	</div>


	<br>

	<div id="section_referent-container">
		<!-- <fieldset> -->
			<section id="form_referent-container">
				<legend>RÉFÉRENT</legend>

				<form action="page.php" method="post">
					<label for="fnom">Nom :</label>
					<input type="text" name="fnom" id="fnom"> <br>

					<label for="fprenom">Prénom :</label>
					<input type="text" name="fprenom" id="fprenom"> <br>

					<label for="fdate">Date de naissance :</label>
					<input type="date" name="fdate" id="fdate"> <br>

					<label for="ftel">Portable :</label>
					<input type="tel" name="ftel" id="ftel"> <br>

					<label for="fmail">Mail : </label>
					<input type="email" name="femail" id="femail"> <br>

					<label for="freseau">Réseau social :</label>
					<input type="text" name="freseau" id="freseau"> <br>

					<label for="fpresentation">Présentation :</label>
					<textarea name="fpresentation" id="fpresentation" cols="1" rows="2"></textarea> <br>

					<label for="fduree">Durée :</label>
					<input type="text" name="fduree" id="fduree">
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
									<input type="checkbox" name="confirm" value="ponctualite">Ponctualité <br>
									<input type="checkbox" name="confirm" value="confiance">Confiance <br>
									<input type="checkbox" name="confirm" value="serieux">Sérieux <br>
									<input type="checkbox" name="confirm" value="honnetete">Honnêteté <br>
									<input type="checkbox" name="confirm" value="tolerance">Tolérance <br>
									<input type="checkbox" name="confirm" value="bienveillance">Bienveillance <br>
									<input type="checkbox" name="confirm" value="Respect">Respect <br>
									<input type="checkbox" name="confirm" value="juste">Juste <br>
									<input type="checkbox" name="confirm" value="impartial">Impartial <br>
									<input type="checkbox" name="confirm" value="travail">Travail <br>
								</form>
							</td>
						</tr>
					</tbody>

				</table>
			</section>

		<!-- </fieldset> -->
	</div>

</body>

</html>