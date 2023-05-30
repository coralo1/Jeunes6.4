<?php
session_start();
if (!isset($_SESSION["userID"])) {
    header("Location:../login/login.php");
}
echo $_SESSION["userID"];
echo $_SESSION["email"];
echo $_SESSION["lastname"];
echo $_SESSION["firstname"];
echo $_SESSION["birthdate"];
if (isset($_POST['submit'])) { /* if the user submits a register form*/
    $user = new Register($_POST['email'], $_POST['password'], $_POST['birthdate'], $_POST['firstname'], $_POST['lastname']); /* create a new user with given credentials*/
}

?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
        var userID = '<?php echo $_SESSION["userID"] ?>';
    </script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../ressources/style_jeune.css">
    <title>Page jeune</title>
</head>

<body>

    <header>
        <img src="../../ressources/img/logo_jeunes6.4.jpg" alt="Logo Jeunes6.4">
        <h1>JEUNE</h1>
        <h2>Je donne de la valeur à mon engagement</h2>
    </header>

    <nav>
        <div class="nav_container">
            <h4><a href="../jeune/jeune.php">JEUNE</a></h4>
            <h4><a href="../referent/referent.php">RÉFÉRENT</a></h4>
            <h4><a href="../consultant/consultant.php">CONSULTANT</a></h4>
            <h4><a href="../partenaires/partenaires.php">PARTENAIRES</a></h4>
        </div>
    </nav>

    <section>
        <p>Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>
    </section>

    <section id="formu_jeune">
        <form action="page.php" method="post">
            <fieldset>
                <label for="fnom">Nom :</label>
                <input type="text" name="fnom" id="fnom" value="<?php echo $_SESSION["lastname"] ?>"> <br>

                <label for="fprenom">Prénom :</label>
                <input type="text" name="fprenom" id="fprenom" value="<?php echo $_SESSION["firstname"] ?>"> <br>

                <label for="fdate">Date de naissance :</label>
                <input type="date" name="fdate" id="fdate" value="<?php echo $_SESSION["birthdate"] ?>"> <br>

                <label for="fmail">Mail : </label>
                <input type="email" name="femail" id="femail" value="<?php echo $_SESSION["email"] ?>"> <br>

                <label for="freseau">Réseau social :</label>
                <input type="text" name="freseau" id="freseau" value="<?php echo $_SESSION["network"] ?>"> <br><br>

                <label for="fengagement">Mon engamement :</label>
                <textarea name="fengagement" id="fengagement" cols="30" rows="10"
                    value="<?php echo $_SESSION["engagement"] ?>"></textarea> <br>

                <label for="fduree">Durée :</label>
                <input type="text" name="fduree" id="fduree" value="<?php echo $_SESSION["length"] ?>">
            </fieldset>
        </form>
    </section>

    <section id="questions_etre">
        <table border="2">
            <legend>Mes savoirs-être</legend>
            <tr>
                <td>Je suis*</td>
            </tr>
            <tr>
                <td>
                    <form action="page.php" method="post">
                        <input type="checkbox" name="etre" value="autonome">Autonome <br>
                        <input type="checkbox" name="etre" value="capable">Capable d'analyse
                        et de synthèse <br>
                        <input type="checkbox" name="etre" value="ecoute">A l'écoute <br>
                        <input type="checkbox" name="etre" value="organise">Organisé <br>
                        <input type="checkbox" name="etre" value="passionne">Passionné <br>
                        <input type="checkbox" name="etre" value="fiable">Fiable <br>
                        <input type="checkbox" name="etre" value="patient">Patient <br>
                        <input type="checkbox" name="etre" value="reflechi">Réfléchi <br>
                        <input type="checkbox" name="etre" value="responsable">Responable <br>
                        <input type="checkbox" name="etre" value="sociable">Sociable <br>
                        <input type="checkbox" name="etre" value="optimiste">Optimiste <br>
                    </form>
                </td>
            </tr>
        </table>
        <p>*Faire 4 choix maximum</p>
    </section>
    <script type="text/javascript" src="jeune.js"></script>
</body>

</html>