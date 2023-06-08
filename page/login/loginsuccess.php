<?php
session_start();
if (!isset($_SESSION["userID"])) {
	header("Location:login.php");
}
echo $_SESSION["userID"];
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../../../ressources/projet.css">
	<title>Connexion réussie</title>
	<a href="../jeune/jeune.php" id="forgot_password">Retour sur la page</a>
</head>

<body>
	<br>
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
</body>

</html>