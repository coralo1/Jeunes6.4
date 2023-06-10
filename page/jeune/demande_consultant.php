<?php

session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");

		if(isset($_POST["submit"])){

			$data = array("user" => $_SESSION["userID"]);
			$request = new requestCons($data);
		}

}

?>

<!DOCTYPE html>
<html>
	<body>
		
		<form action="" method="post">
		1 : Je sélectionne mes références
		<br>
		<?php
					$i = -1;
					foreach ($_SESSION["confirmed"] as $confirmed) {
						$i++;
						echo '<fieldset>
						<legend>'.($i+1).' : </legend> <br>
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

		</form>
		
		
		










	</body>
</html>