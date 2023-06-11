<?php require("login.class.php") ?>
<?php
session_start();
if (isset($_SESSION["userID"])) { /* if user is already logged in, leave the page */
	echo '<meta http-equiv="refresh" content="0;url=loginsuccess.php">';
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
		<tr>
			<td>
				<h3>Se connecter à Jeunes 6.4</h3>
				<h4>Je suis :</h4>
				<table id="register_table">
			</td>

			</td>
		</tr>
		<tr>
			<td>
				<a href="login_jeunes.php" id="forgot_password">Un jeune</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="login_referent.php" id="forgot_password">Un référent</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="login_consultant.php" id="forgot_password">Un consultant</a>
			</td>
		</tr>
		<tr>
			<td>
				Pas encore inscrit ? <br>
				<a id="forgot_password" href="../register/register.php">S'inscrire</a>
			</td>
		</tr>
		<tr>
			<td>
				<a id="forgot_password" href="../accueil/accueil2.php">Retour</a>
			</td>
		</tr>
		</table>
	</form>
</body>

</html>