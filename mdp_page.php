<?php
include('connexion.php');
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="stylesheet" href="css/style_navigation.css">



</head>

<body>
<?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
        header('Location: backofficeprof.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>

    <?php

    $requete = "SELECT id_utilisateurs FROM utilisateurs";
    $stmt = $db->prepare($requete);

    $result = $stmt->execute();

    if ($result) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $id = $row['id_utilisateurs'];
            echo '<p style="display:none;"> ID Utilisateur: ' . $id . '</p>';
        } else {
            echo 'User not found';
        }
    } else {
        echo 'Error executing the query';
    }
    ?>

    <div class="main-2">

        <div class="logo-1">
            <a href="index.php"><img src="img/logo.svg" alt="page d'accueil de l'ent"></a>
            <a href="index.php"><img src="img/logo-long.png" alt="page d'accueil de l'ent"></a>
        </div>



        <div class="formulaire">

            <form action="traiter_mdp_mail.php" method="post">

                <p>Vous avez oublié votre mot de passe? Renseignez votre mail</p>

                <label for="mail">Mail</label>
                <input class="bouton2" type="email" id="mail" name="mail" required>

                <div class="bouton1">
                    <button type="submit">Envoyer</button>
                </div>
            </form>


            <div class="image2">
                <img src="img/main_image.svg">
            </div>

        </div>
    </div>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>



</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
</html>