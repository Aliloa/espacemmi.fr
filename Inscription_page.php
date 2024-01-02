<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Inscription</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">



</head>
<body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const passwordInput = document.getElementById('password');
        const password2Input = document.getElementById('password2');
        const messageContainer = document.createElement('div');

        form.appendChild(messageContainer);

        form.addEventListener('submit', function(event) {
            if (passwordInput.value !== password2Input.value) {
                event.preventDefault(); 
                messageContainer.textContent = "Le mot de passe ne correspond pas";
                messageContainer.style.color = "red";
            }
        });
    });
</script>

<div class="main">
<div class="logo">
    <img src="img/logo(2).png">
</div>

<div class="image1">
    <img src="img/main_image.png">
</div>

<div class="formulaire">
<form action="traiter_inscription.php" method="post">
<h1>Inscription</h1>
<br>
<br>
    <label for="login">Login</label>
    <input type="text" id="login" name="login" required>

    <label for="password">Entrez un mot de passe</label>
    <input type="password" id="password" name="password" required>

    <label for="password2">Répétez le même mot de passe</label>
    <input type="password" id="password2" name="password2" required>

    <button type="submit">S'inscrire</button>
</form>
</div>
</div>



</body>
</html>
