<?php
/* the whole purpose of this page is for the user to be to redirected here, and then to an appropriate place in case he gets somewhere he's not supposed to */
session_start();
if (!isset($_SESSION["userID"])) {
	header("Location:login.php");
}

switch ($_SESSION["usertype"]) { /* */
	case "J":
		header("Location:../jeune/jeune.php");
		$link = "../jeune/jeune.php";
		break;
	case "R":
		header("Location:../referent/referent.php");
		$link = "../referent/referent.php";
		break;
	case "C";
	header("Location:../consultant/consultant.php");
		$link = "../consultant/consultant.php";
		break;
}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../../../ressources/projet.css">
	<title>Connexion réussie</title>
	<a href="<?php echo $link; ?>" id="forgot_password">Retour sur la page</a>
</head>

<body>
	<br>
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
</body>

</html>