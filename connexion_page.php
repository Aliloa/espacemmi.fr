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
    <a href="index.php"><img src="img/logo(2).png"></a>
</div>

<div class="image1">
    <img src="img/main_image.png">
</div>
<div class="formulaire">
<form action="traiter_connexion.php" method="POST">
<h1>Connexion</h1>
<br>
<br>
    <label for="login">Login</label>
    <input type="text" id="login" name="login" required>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>
    <span><a href="mdp_page.php">Mot de passe oublié?</a></span>
    <button type="submit">Se connecter</button>

</form>
</div>
    </div>

</body>
</html>