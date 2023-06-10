<?php
session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

?>

<!DOCTYPE html>
<html>

<body>
	Merci beaucoup!
	<br>
	<br>
	Votre référence à <?php echo $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] ?> à bien été prise en compte.
	<br>
	<br>
	<!-- Logout button -->
	<a href="../logout.php" id="forgot_password">Déconnexion</a>
</body>


</html>