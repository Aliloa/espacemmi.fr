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
    <img src="img/logo(2).png">
</div>

<div class="image1">
    <img src="img/main_image.png">
</div>

    <div class="formulaire">
    <form action="traiter_mdp_mail.php" method="post">
    <p>Vous avez oublié votre mot de passe? Renseignez votre mail</p>
    <label for="mail">Mail</label>
    <input type="email" id="mail" name="mail" required>


    <button type="submit">Envoyer</button>
</form>
    </div>
</div>


</body>
</html>
