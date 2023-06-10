<?php require("referent.class.php") ?>

<?php
session_start();
if (!isset($_SESSION["userID"])) { /* auto redirect if user not logged in */
	header("Location:../login/login.php");
}

/* update referent information */
if (isset($_POST["update"])) {
	$update_data = array("mail" => $_POST["mail"], "lastname" => $_POST["lastname"], "firstname" => $_POST["firstname"], "phone" => $_POST["phone"], "birthdate" => $_POST["birthdate"], "user" => $_SESSION["user"]);
	$baba = new updateRef($update_data);
}

if (isset($_POST["confirm"])) {
	$confirm_savoirs = array();

	if (isset($_POST['autonomie'])) {
		$confirm_savoirs["autonomie"] = 1;
	} else {
		$confirm_savoirs["autonomie"] = 0;
	}

	if (isset($_POST['analyse'])) {
		$confirm_savoirs["analyse"] = 1;
	} else {
		$confirm_savoirs["analyse"] = 0;
	}

	if (isset($_POST['ecoute'])) {
		$confirm_savoirs["ecoute"] = 1;
	} else {
		$confirm_savoirs["ecoute"] = 0;
	}

	if (isset($_POST['organise'])) {
		$confirm_savoirs["organise"] = 1;
	} else {
		$confirm_savoirs["organise"] = 0;
	}

	if (isset($_POST['passionne'])) {
		$confirm_savoirs["passionne"] = 1;
	} else {
		$confirm_savoirs["passionne"] = 0;
	}

	if (isset($_POST['fiable'])) {
		$confirm_savoirs["fiable"] = 1;
	} else {
		$confirm_savoirs["fiable"] = 0;
	}

	if (isset($_POST['patient'])) {
		$confirm_savoirs["patient"] = 1;
	} else {
		$confirm_savoirs["patient"] = 0;
	}

	if (isset($_POST['reflechi'])) {
		$confirm_savoirs["reflechi"] = 1;
	} else {
		$confirm_savoirs["reflechi"] = 0;
	}

	if (isset($_POST['responsable'])) {
		$confirm_savoirs["responsable"] = 1;
	} else {
		$confirm_savoirs["responsable"] = 0;
	}

	if (isset($_POST['sociable'])) {
		$confirm_savoirs["sociable"] = 1;
	} else {
		$confirm_savoirs["sociable"] = 0;
	}

	if (isset($_POST['optimiste'])) {
		$confirm_savoirs["optimiste"] = 1;
	} else {
		$confirm_savoirs["optimiste"] = 0;
	}


	$confirm_data = array("mail" => $_SESSION["mail"], "lastname" => $_SESSION["lastname"], "firstname" => $_SESSION["firstname"], "phone" => $_SESSION["phone"], "birthdate" => $_SESSION["birthdate"], "user" => $_SESSION["user"], "type" => $_SESSION["type"], "engagement" => $_SESSION["engagement"], "length" => $_SESSION["length"], "comment" => $_POST["comment"], "confirm_savoirs" => $confirm_savoirs);


	$baba = new confirmRef($confirm_data);
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../../ressources/style_ref.css">
	<title>Page référent</title>
</head>

<body>
	<header>
		<img src="../../ressources/img/LOGOS_JEUNES_6_4.svg" alt="Logo Jeunes6.4">
        <div id="haut_page-container">
            <span id="nom_page-container"><h1>RÉFÉRENT</h1></span>
            <span id="texte_haut-container"><p>Je confirme la valeur de ton engagement</p></span>
        </div>
    </header>

	<nav id="nav-container">
		<a href="../login/login.php" class="nav-element">JEUNE</a>
		<a href="../referent/referent.php" class="nav-element">RÉFÉRENT</a>
		<a href="../consultant/login.php" class="nav-element">CONSULTANT</a>
		<a href="../partenaires/partenaires.php" class="nav-element">PARTENAIRES</a>
	</nav>

	<p id="description-page">Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</p>


    <div id="texte_demande">
        Originaire de la demande :
        <?php 
            echo $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] . "<br>" . $_SESSION["user"]; 
        ?>
        <br><br> <!-- A modifier dans le CSS par line-height -->
    </div>


    <div id="elements-container">


        <section id="informations_jeune-container">

            <form action="" method="post">

                <section id="informations_jeune">
                <legend>INFORMATIONS DU JEUNE :</legend>

                <label for="lastname">Nom :</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"] ?>"> <br>

                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"] ?>"> <br>

                <label for="birthdate">Date de naissance :</label>
                <input type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"] ?>"> <br>

                <label for="phone">Portable :</label>
                <input type="tel" name="phone" id="phone" value="<?php echo $_SESSION["phone"] ?>"> <br>

                <label for="mail">Mail : </label>
                <input type="email" name="mail" id="mail" value="<?php echo $_SESSION["mail"] ?>" readonly> <br>

                <input type="submit" name="update" id="update" value="Mettre à jour les informations">
            
                </section>
            </form>

        </section>


        <section id="demande_ref-container">

            <legend>Détails de la demande de référence :</legend>

            <form>
                <label for="type">Type d'engagement :</label>
                <input type="text" name="type" id="type" value="<?php echo $_SESSION["type"] ?>" readonly> <br><br>

                <label for="engagement">Présentation de l'engagement :</label>
                <textarea name="engagement" id="engagement" cols="30" rows="10" readonly><?php echo $_SESSION["engagement"] ?></textarea> <br>

                <label for="length">Durée de l'engagement :</label>
                <input type="text" name="length" id="length" value="<?php echo $_SESSION["length"] ?>" readonly>
            </form>

        </section>



		<form action="" method="post">

            <section id="comment-container">
				<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Ajoutez des commentaires sur <?php echo $_SESSION["user_firstname"]; ?>"></textarea>
			</section>

			<section id="checkbox-container">

				<table id="table-checkbox">

					<legend>Ses savoirs-être</legend>

                    <thead>
                        <tr>
                            <td>Je confirme qu'il est</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="autonomie" value="1" <?php if ($_SESSION["autonomie"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Autonome <br>
                                <input type="checkbox" name="analyse" value="1" <?php if ($_SESSION["analyse"]) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                    echo "disabled";
                                                                                                                                }
                                                                                                                                ?>>Capable d'analyse et de synthèse <br>
                                <input type="checkbox" name="ecoute" value="1" readonly <?php if ($_SESSION["ecoute"]) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "disabled";
                                                                                                                                                }
                                                                                                                                                ?>>A l'écoute <br>
                                <input type="checkbox" name="organise" value="1" <?php if ($_SESSION["organise"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Organisé <br>
                                <input type="checkbox" name="passionne" value="1" <?php if ($_SESSION["passionne"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Passionné <br>
                                <input type="checkbox" name="fiable" value="1" <?php if ($_SESSION["fiable"]) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                    echo "disabled";
                                                                                                                                }
                                                                                                                                ?>>Fiable <br>
                                <input type="checkbox" name="patient" value="1" <?php if ($_SESSION["patient"]) {
                                                                                                                                    echo "checked";
                                                                                                                                } else {
                                                                                                                                    echo "disabled";
                                                                                                                                }
                                                                                                                                ?>>Patient <br>
                                <input type="checkbox" name="reflechi" value="1" <?php if ($_SESSION["reflechi"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Réfléchi <br>
                                <input type="checkbox" name="responsable" value="1" <?php if ($_SESSION["responsable"]) {
                                                                                                                                            echo "checked";
                                                                                                                                        } else {
                                                                                                                                            echo "disabled";
                                                                                                                                        }
                                                                                                                                        ?>>Responable <br>
                                <input type="checkbox" name="sociable" value="1" <?php if ($_SESSION["sociable"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Sociable <br>
                                <input type="checkbox" name="optimiste" value="1" <?php if ($_SESSION["optimiste"]) {
                                                                                                                                        echo "checked";
                                                                                                                                    } else {
                                                                                                                                        echo "disabled";
                                                                                                                                    }
                                                                                                                                    ?>>Optimiste <br>
                            </td>
                        </tr>
                    </tbody>

                </table>


                <!-- Bouton confirmation information -->
				<input type="submit" name="confirm" id="confirm" value="Confirmation des informations du jeune">

			</section>
			<br>
				<p class="error">
					<?php echo @$baba->error ?>
				</p>
				<p class="success">
					<?php echo @$baba->success;
				/* if reference was successful, leave the page and send a thanks message*/
				echo '<meta http-equiv="refresh" content="0;url=success.php">';
			?>
		</form>

        <!-- Logout button -->
        <a href="../logout.php" id="forgot_password">Déconnexion</a>


    </div>


</body>

</html>