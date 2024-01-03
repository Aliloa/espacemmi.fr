<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">



</head>
<body>

<div class="main">
<div class="logo">
<img src="img/favicon.png" width="30px">
    <img src="img/logo(2).png">

</div>



    <div class="mail_message">
    <h1>Envoie du mail</h1>
    <p>Merci, vous avez reçu un email permettant de changer votre mot de passe !</p>


    <div class="bouton1">
    <a href="index.php">Revenir à l'accueil</a>
    </div>
</form>
    </div>
    <div class="image3">
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
