<?php
session_start();
include('connexion.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="stylesheet" href="css/style_navigation.css">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="icon" href="img/favicon.png">

    <style>
        .message-erreur {
            color: red;
            margin: 0;
        }
    </style>
</head>

<body>
    <main class="main-2">

        <div class="logo-1">
            <a href="index.php"><img src="img/logo.svg" alt="page d'accueil de l'ent"></a>
            <a href="index.php"><img src="img/logo-long.png" alt="page d'accueil de l'ent"></a>
        </div>

        <div class="formulaire">
            <form action="formulaire_mdp_traite.php" method="POST" onsubmit="return validateForm()">

                <h1>Mot de passe</h1>

                <label for="login">Login:</label><br>
                <input class="bouton2" type="text" id="login" name="login_user" required><br>

                <label for="mdp1">Entrez votre nouveau mot de passe:</label><br>
                <input class="bouton2" type="password" id="mdp1" name="mdp1" required>

                <label for="mdp2">Répétez le mot de passe: </label><br>
                <input class="bouton2" type="password" id="mdp2" name="mdp2" required>

                <div class="message-erreur" id="messageErreur"></div>

                <div class="bouton1">
                    <input type='submit' value='Réinitialiser'>
                </div>

            </form>

            <div class="image2">
                <img src="img/main_image.svg">
            </div>
        </div>
    </main>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>

    <script>
        function validateForm() {
            var mdp1 = document.getElementById("mdp1").value;
            var mdp2 = document.getElementById("mdp2").value;
            var messageErreur = document.getElementById("messageErreur");

            if (mdp1 !== mdp2) {
                messageErreur.innerHTML = "Le deuxième mot de passe ne correspond pas au premier.";
                return false;
            } else {
                messageErreur.innerHTML = "";
                return true;
            }
        }
    </script>
</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
</html>
