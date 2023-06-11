<?php require("login.class.php") ?>
<?php
session_start();
if (isset($_SESSION["userID"])) { /* if user is already logged in, leave the page */
	echo '<meta http-equiv="refresh" content="0;url=loginsuccess.php">';
}

if (isset($_POST['submit'])) { /* on button click */
	$user = new LoginRef($_POST['login']); /* call for login */
}
?>

<!-- this is the login page -->
<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" href="../../../ressources/projet_accueil1.css">
	<title>Connexion Jeunes 6.4</title>

</head>

<body>





	<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<table id="register_table">
			<td>
				<h3>Se connecter à Jeunes 6.4</h3>
				<h4>Référent</h4>
			</td>
			<tr>
				<td>
					<label>Identifiant de connexion :<br></label>
					<input type="password" name="login">
				</td>
			</tr>
			<tr>
				<td>
					<button id="register_button" type="submit" name="submit">Connexion</button>
				</td>
			</tr>
			<tr>
				<td>
					pas encore inscrit ? <br>
					<a id="forgot_password" href="../register/register.php">S'inscrire</a>
				</td>
			</tr>
			<tr>
				<td>
					<a id="forgot_password" href="forgotten_password.html">Mot de passe oublié</a>
				</td>
			</tr>
			<tr>
				<td>
					<a id="forgot_password" href="javascript:history.back()">Retour</a>
				</td>
			</tr>


		</table>



		<p class="error">
			<?php echo @$user->error ?>
		</p>
		<p class="success">
			<?php
			if (@$user->success[0] == 1) {
				/* if login was succesful, fill session data and leave the page*/
				$_SESSION = @$user->success[1];
				$_SESSION["userID"] = $_SESSION["mail"];
				echo '<meta http-equiv="refresh" content="0;url=loginsuccess.php">';
			}

			//var_dump($_SESSION)

			?>
		</p>
	</form>
</body>

</html>