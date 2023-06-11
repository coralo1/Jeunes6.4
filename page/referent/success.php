<?php
/*makes sure the user is Referent */
session_start();
if ($_SESSION["usertype"] != "R"){
	header("Location:../login/login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<script src="../../js/jquery-3.7.0.min.js"></script>
	<script src="../../js/jeune.js" async></script>
	<link rel="stylesheet" href="../../ressources/style_ref.css">
	<title>Page référent</title>
</head>
<body>
	Merci beaucoup!
	<br>
	<br>
	Votre référence à <?php echo $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] ?> à bien été prise en compte.
	<br>
	<br>
	<!-- Logout button -->
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
	<a href="../accueil/accueil2.php" id="forgot_password">Retour à l'accueil</a>
</body>


</html>