<?php require("register.class.php") ?>
<?php
session_start();
if (isset($_SESSION["userID"])) { /* if user is already logged in, leave the page */
	echo '<meta http-equiv="refresh" content="0;url=loginsuccess.php">';
}

if (isset($_POST['submit'])) { /* if the user submits a register form*/
	$user = new Register($_POST['email'], $_POST['password'], $_POST['birthdate'], $_POST['firstname'], $_POST['lastname']); /* create a new user with given credentials*/
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
	<link rel="stylesheet" href="../../../ressources/projet.css">
	<title>Jeunes 6.4 - Inscription</title>
	<!-- this is the register page -->
</head>

<body>
	<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<table id="register_table">
			<tr>
				<td id="register_title">Créer un compte Jeunes 6.4</td>
			</tr>
			<tr>
				<td>
					<label>Email<br></label>
					<input type="email" name="email">
				</td>
			</tr>
			<tr>
				<td>
					<label>Mot de Passe<br></label>
					<input type="password" name="password">

				</td>
			</tr>
			<tr>
				<td>
					<label>Date de naissance<br></label>
					<input type="date" name="birthdate">

				</td>
			</tr>
			<tr>
				<td>
					<label>Prénom<br></label>
					<input type="text" name="firstname">

				</td>
			</tr>
			<tr>
				<td>
					<label>Nom<br></label>
					<input type="text" name="lastname">

				</td>
			</tr>
			<tr>
				<td>
					<button id="register_button" type="submit" name="submit">Créer un compte</button>
				</td>
			</tr>

			<tr>
				<td>
					Déjà inscrit ?<br>
					<a id="forgot_password" href="../login/login.php">Se connecter</a>
				</td>
			</tr>


		</table>

		<p class="error">
			<?php echo @$user->error ?>
		</p>
		<p class="success">
			<?php
			if (@$user->success[0] == 1) {
				$_SESSION["userID"] = @$user->success[1]; /* after registering, logs in the user and leaves the page */
				$_SESSION["email"] = @$user->success[1];
				$_SESSION["type"] = @$user->success[2];
				$_SESSION["birthdate"] = @$user->success[3];
				$_SESSION["firstname"] = @$user->success[4];
				$_SESSION["lastname"] = @$user->success[5];
				$_SESSION["network"] = @$user->success[6];
				$_SESSION["engagement"] = @$user->success[7];
				$_SESSION["length"] = @$user->success[8];
				$_SESSION["autonomie"] = @$user->success[9];
				$_SESSION["analyse"] = @$user->success[10];
				$_SESSION["ecoute"] = @$user->success[11];
				$_SESSION["organise"] = @$user->success[12];
				$_SESSION["passionne"] = @$user->success[13];
				$_SESSION["fiable"] = @$user->success[14];
				$_SESSION["patient"] = @$user->success[15];
				$_SESSION["reflechi"] = @$user->success[16];
				$_SESSION["responsable"] = @$user->success[17];
				$_SESSION["sociable"] = @$user->success[18];
				$_SESSION["optimiste"] = @$user->success[19];
				echo '<meta http-equiv="refresh" content="0;url=../login/loginsuccess.php">';
			}
			?>
		</p>
	</form>
</body>

</html>