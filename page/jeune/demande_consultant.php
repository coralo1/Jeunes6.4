<?php

session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

?>

<!DOCTYPE html>
<html>
	<body>
		créer une demande à un consultant
		<br>
		
	</body>
</html>