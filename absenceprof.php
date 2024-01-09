<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>
<form action="traiteinscription.php" method="POST">
        <h1>Inscription</h1>

        <label for="login">Login</label>
        <input type="text" id="login" name="login" required>



        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>


        <label for="mail">Email</label>
        <input type="email" id="mail" name="email" required>


        <fieldset required>
            <legend>Choisissez votre rôle</legend>

            <div>
                <input class="radio" type="radio" id="eleve" name="role" value="Étudiant.e"
                    onclick="activerChampPromotion()" />
                <label class="choix" for="eleve">Étudiant.e</label>
            </div>

            <div>
                <input class="radio" type="radio" id="prof" name="role" value="Enseignant.e" />
                <label class="choix" for="prof">Professeur.e</label>
            </div>

            <div>
                <input class="radio" type="radio" id="crous" name="role" value="Membre du CROUS" />
                <label class="choix" for="crous">Membre du CROUS</label>
            </div>
        </fieldset>




        <label for="password">Entrez un mot de passe</label>
        <input type="password" id="password" name="password" required>


        <label for="password2">Répétez le même mot de passe</label>
        <input type="password" id="password2" name="password2" required>

        <button type="submit" name='soumettre'>S'inscrire</button>
    </form>
</body>
</html>