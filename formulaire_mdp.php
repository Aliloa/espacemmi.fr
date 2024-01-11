<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="icon" href="img/favicon.png">

    <style>
        .message-erreur {
            color: red;
            margin:0;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="logo">
            <a href="index.php"><img src="img/logo(2).png"></a>
        </div>

        <div class="formulaire">
            <form action="formulaire_mdp_traite.php" method="POST" onsubmit="return validateForm()">

                <h1>Mot de passe </h1>
                 <label for="login">Login:</label>
                <input type="text" id="login" name="login_user" required>
                <label for="mdp1">Entrez votre nouveau mot de passe:</label>
                <input type="password" id="mdp1" name="mdp1" required>
                <label for="mdp2">Répétez le mot de passe: </label>
                <input type="password" id="mdp2" name="mdp2" required>

                <div class="message-erreur" id="messageErreur"></div>

                <div class="bouton1">
                    <input type='submit' value='Réinitialiser'>
                </div>
            </form>

            <script>
                function validateForm() {
                    var mdp1 = document.getElementById("mdp1").value;
                    var mdp2 = document.getElementById("mdp2").value;
                    var messageErreur = document.getElementById("messageErreur");

                    if (mdp1 !== mdp2) {
                        messageErreur.innerHTML = "Les mots de passe ne correspondent pas.";
                        return false;
                    } else {
                        messageErreur.innerHTML = "";
                        return true;
                    }
                }
            </script>
        </div>
        <div class="image2">
            <img src="img/main_image.png">
        </div>
    </div>
    <footer>
        <div class="mentions-legales" onclick="openModal()">Mentions Légales</div>
    </footer>

    <!-- Modal -->
    <div id="myModal" class="modal" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation();">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Mentions Légales</h2>
            <p>Ajoutez ici le contenu de vos mentions légales.</p>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>
</body>

</html>
