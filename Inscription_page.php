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
<img src="img/favicon.png" width="30px">

    <img src="img/logo(2).png">

</div>



<div class="formulaire">
<form action="traiteformulaire.php" method="post">
<h1>Inscription</h1>

    <label for="login">Login</label>
    <input type="text" id="login" name="login" required>

  <legend>Choisissez votre rôle</legend>
  

  <div>
    <input class="radio" type="radio" id="eleve" name="drone" value="huey" checked />
    <label class="choix" for="eleve">Étudiant.e</label>
  </div>

  <div>
    <input class="radio" type="radio" id="prof" name="drone" value="dewey" />
    <label class="choix" for="prof">Professeur.e</label>
  </div>

  <div>
    <input class="radio" type="radio" id="crous" name="drone" value="louie" />
    <label class="choix" for="crous">Membre du CROUS</label>
  </div>

    <label for="password">Entrez un mot de passe</label>
    <input type="password" id="password" name="password" required>


    <label for="password2">Répétez le même mot de passe</label>
    <input type="password" id="password2" name="password2" required>

    <button type="submit" name='soumettre'>S'inscrire</button>
</form>
</div>
<div class="image2">
<img src="img/main_image.png" style="pointer-events: none; background-color: transparent;">
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
