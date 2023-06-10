<section id="demande-formulaire">

			<!-- <fieldset> -->
			<form action="" method="post">

				<!-- ------------------------- Début du premier form ------------------------- -->

				<section id="demande_ref-container">

					<!-- <fieldset> -->
						<legend>DEMANDE DE RÉFÉRENCE :</legend> <br>

						<label for="type">Milieu de l'engagement :</label>
						<input type="text" name="type" id="type" placeholder="association, club de sport, etc."> <br>

						<label for="engagement">Mon engamement :</label>
						<textarea name="engagement" id="engagement" cols="1" rows="4" placeholder="Décrivez votre engagement"></textarea> <br>

						<label for="length">Durée de l'engagement :</label>
						<input type="text" name="length" id="length"> <br>

						<label for="ref_lastname">Nom du référent :</label>
						<input type="text" name="ref_lastname" id="ref_lastname"> <br>

						<label for="ref_firstname">Prénom du référent :</label>
						<input type="text" name="ref_firstname" id="ref_firstname"> <br>

						<label for="ref_mail">E-mail du référent :</label>
						<input type="email" name="ref_mail" id="ref_mail"> <br>

					<!--- </fieldset> --->

				</section>

				<!-- ------------------------- Fin du premier form ------------------------- -->


				<!-- ------------------------- Début du deuxième form ------------------------- -->

				<section id="checkbox-container">
					<table id="table-checkbox">
						<legend><strong>Mes savoirs-être</strong></legend>
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

				<!-- Bouton : "Envoyer une demande" -->
                <input type="submit" name="submit" id="send_form" value="Envoyer une demande"> <br>

			</form>
			<!-- </fieldset> -->

		</section>