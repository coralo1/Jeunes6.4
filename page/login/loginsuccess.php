<?php
session_start();
echo $_SESSION["userID"];

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../../ressources/projet.css">
    <title>Connexion réussie</title>
    <a href="../accueil/accueil2.html" id="forgot_password">Retour sur la page</a>
</head>

<body>
    <br>
    <a href="logout.php" id="forgot_password">Déconnexion</a>
</body>

</html>