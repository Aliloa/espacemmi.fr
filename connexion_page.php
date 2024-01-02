<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esapce MMi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">

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
<form action="traiter_connexion.php" method="post">
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