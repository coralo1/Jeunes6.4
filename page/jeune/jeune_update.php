<?php 

function test($session, $post){
	$storage = "../../data/jeune.json";
	$users = json_decode(file_get_contents($storage), true); /* loads users */
	var_dump($post);
	echo "<br><br>";
	$i = -1;
	foreach ($users as $user) { /* parses user array until it matches */
		$i++;

		if ($user["mail"] == $_SESSION["mail"]) { /* then updates the user info with what was filled, along with session info */

			$user["lastname"] = $post['lastname'];
			$_SESSION["lastname"] = $post['lastname'];

			$user["firstname"] = $post['firstname'];
			$_SESSION["firstname"] = $post['firstname'];

			$user["birthdate"] = $post['birthdate'];
			$_SESSION["birthdate"] = $post['birthdate'];

			$user["type"] = $post['type'];
			$_SESSION["type"] = $post['type'];

			$user["engagement"] = $post['engagement'];
			$_SESSION["engagement"] = $post['engagement'];

			$user["length"] = $post['length'];
			$_SESSION["length"] = $post['length'];

			if (isset($post['autonomie'])) {
				$user["autonomie"] = 1;
				$_SESSION['autonomie'] = 1;
			} else {
				$user["autonomie"] = 0;
				$_SESSION['autonomie'] = 0;
			}

			if (isset($post['analyse'])) {
				$_SESSION['analyse'] = 1;
				$user["analyse"] = 1;
			} else {
				$user["analyse"] = 0;
				$_SESSION["analyse"] = 0;
			}

			if (isset($post['ecoute'])) {
				$_SESSION['ecoute'] = 1;
				$user["ecoute"] = 1;
			} else {
				$user["ecoute"] = 0;
				$_SESSION["ecoute"] = 0;
			}

			if (isset($post['organise'])) {
				$_SESSION['organise'] = 1;
				$user["organise"] = 1;
			} else {
				$user["organise"] = 0;
				$_SESSION['organise'] = 0;
			}

			if (isset($post['passionne'])) {
				$_SESSION['passionne'] = 1;
				$user["passionne"] = 1;
			} else {
				$user["passionne"] = 0;
				$_SESSION['passionne'] = 0;
			}

			if (isset($post['fiable'])) {
				$_SESSION['fiable'] = 1;
				$user["fiable"] = 1;
			} else {
				$user["fiable"] = 0;
				$_SESSION['fiable'] = 0;
			}

			if (isset($post['patient'])) {
				$_SESSION['patient'] = 1;
				$user["patient"] = 1;
			} else {
				$user["patient"] = 0;
				$_SESSION['patient'] = 0;
			}

			if (isset($post['reflechi'])) {
				$_SESSION['reflechi'] = 1;
				$user["reflechi"] = 1;
			} else {
				$user["reflechi"] = 0;
				$_SESSION['reflechi'] = 0;
			}

			if (isset($post['responsable'])) {
				$_SESSION['responsable'] = 1;
				$user["responsable"] = 1;
			} else {
				$user["responsable"] = 0;
				$_SESSION['responsable'] = 0;
			}

			if (isset($post['sociable'])) {
				$_SESSION['sociable'] = 1;
				$user["sociable"] = 1;
			} else {
				$user["sociable"] = 0;
				$_SESSION['sociable'] = 0;
			}

			if (isset($post['optimiste'])) {
				$_SESSION['optimiste'] = 1;
				$user["optimiste"] = 1;
			} else {
				$user["optimiste"] = 0;
				$_SESSION['optimiste'] = 0;
			}

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

	return $status;
}