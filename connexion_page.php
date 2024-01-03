<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="icon" href="img/favicon.png">

</head>
<body>
    <div class="main">
    <div class="logo">
    <img src="img/favicon.png" width="30px">
    <img src="img/logo(2).png">
</div>


<div class="formulaire">
<form action="traiter_connexion.php" method="post">
<h1>Connexion</h1>

    <label for="login">Login</label>
    <input type="text" id="login" name="login" required>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>
    <div class="bouton1">
    <a href="traiter_connexion.php">Se connecter</a>
    </div>
    <span>Vous avez oublié votre mot de passe ? Alors retrouvez le <a href="mdp_page.php">ici !</a></span>


</form>

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