<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../ressources/style_ref.css">
    <title>Page référent</title>
</head>

<body>
    <header>
        <img src="../../ressources/img/logo_jeunes6.4.jpg" alt="Logo Jeunes6.4">
        <h1>RÉFÉRENT</h1>
        <h2>Je confirme la valeur de ton engagement</h2>
    </header>

    <nav>
        <div class="nav_container">
            <h4><a href="../login/login.php">JEUNE</a></h4>
            <h4><a href="../referent/referent.php">RÉFÉRENT</a></h4>
            <h4><a href="../consultant/consultant.php">CONSULTANT</a></h4>
            <h4><a href="../partenaires/partenaires.php">PARTENAIRES</a></h4>
        </div>
    </nav>
    </header>

    <section>
        <p>Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</p>
    </section>

    <section id="formu_ref">
        <fieldset>
            <form action="page.php" method="post">
                <label for="fnom">Nom :</label>
                <input type="text" name="fnom" id="fnom"> <br>

                <label for="fprenom">Prénom :</label>
                <input type="text" name="fprenom" id="fprenom"> <br>

                <label for="fdate">Date de naissance :</label>
                <input type="date" name="fdate" id="fdate"> <br>

                <label for="ftel">Portable :</label>
                <input type="tel" name="ftel" id="ftel"> <br>

                <label for="fmail">Mail : </label>
                <input type="email" name="femail" id="femail"> <br>

                <label for="freseau">Réseau social :</label>
                <input type="text" name="freseau" id="freseau"> <br><br>

                <label for="fpresentation">Présentation :</label>
                <textarea name="fpresentation" id="fpresentation" cols="30" rows="10"></textarea> <br>

                <label for="fduree">Durée :</label>
                <input type="text" name="fduree" id="fduree">
            </form>
        </fieldset>
    </section>

    <footer>
        <section>
            <textarea name="fcomment" id="fcomment" cols="30" rows="10">COMMENTAIRES</textarea>
        </section>

        <section id="confirm_etre">
            <table border="2">
                <legend>Ses savoirs-être</legend>
                <tr>
                    <td>Je confirme sa (son)*</td>
                </tr>
                <tr>
                    <td>
                        <form action="page.php" method="post">
                            <input type="checkbox" name="confirm" value="ponctualite">Ponctualité <br>
                            <input type="checkbox" name="confirm" value="confiance">Confiance <br>
                            <input type="checkbox" name="confirm" value="serieux">Sérieux <br>
                            <input type="checkbox" name="confirm" value="honnetete">Honnêteté <br>
                            <input type="checkbox" name="confirm" value="tolerance">Tolérance <br>
                            <input type="checkbox" name="confirm" value="bienveillance">Bienveillance <br>
                            <input type="checkbox" name="confirm" value="Respect">Respect <br>
                            <input type="checkbox" name="confirm" value="juste">Juste <br>
                            <input type="checkbox" name="confirm" value="impartial">Impartial <br>
                            <input type="checkbox" name="confirm" value="travail">Travail <br>
                        </form>
                    </td>
                </tr>
            </table>
            <p>*Faire 4 choix maximum</p>
        </section>
    </footer>

</body>

</html>