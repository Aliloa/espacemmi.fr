<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esapce MMi</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="style.css">


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
