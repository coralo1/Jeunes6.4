<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../ressources/style_consultant.css">
    <title>Page consultant</title>
</head>

<body>
    <header>
        <img src="../../ressources/img/logo_jeunes6.4.jpg" alt="Logo Jeunes6.4">
        <h1>CONSULTANT</h1>
        <h2>Je donne de la valeur à ton engagement</h2>
    </header>

    <nav>
        <div>
            <h4><a href="../login/login.php">JEUNE</a></h4>
            <h4><a href="../referent/referent.php">RÉFÉRENT</a></h4>
            <h4><a href="../consultant/consultant.php">CONSULTANT</a></h4>
            <h4><a href="../partenaires/partenaires.php">PARTENAIRES</a></h4>
        </div>
    </nav>
    </header>

    <section>
        <p>Validez cet engagement en prenant en compte sa valeur.</p>
    </section>

    <section id="section_jeune">
        <fieldset>
            <table>
                <tr>
                    <td>
                        <p>JEUNE</p>
                        <form action="page.php" method="post">
                            <label for="fnom">Nom :</label>
                            <input type="text" name="fnom" id="fnom"> <br>

                            <label for="fprenom">Prénom :</label>
                            <input type="text" name="fprenom" id="fprenom"> <br>

                            <label for="fdate">Date de naissance :</label>
                            <input type="date" name="fdate" id="fdate"> <br>

                            <label for="fmail">Mail : </label>
                            <input type="email" name="femail" id="femail"> <br>

                            <label for="freseau">Réseau social :</label>
                            <input type="text" name="freseau" id="freseau"> <br><br>

                            <label for="fengagement">Mon engamement :</label>
                            <textarea name="fengagement" id="fengagement" cols="30" rows="10"></textarea> <br>

                            <label for="fduree">Durée :</label>
                            <input type="text" name="fduree" id="fduree">
                        </form>
                    </td>
                    <td>
                        <legend>Je suis</legend>
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
        </fieldset>
    </section>
    <br>

    <section id="section_ref">
        <fieldset>
            <table>
                <tr>
                    <td>
                        <p>RÉFÉRENT</p>
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
                    </td>
                    <td>
                        <legend>Je confirme</legend>
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
        </fieldset>
    </section>

</body>

</html>